<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Worker Added</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed: " . mysqli_connect_error());
            if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['token'])) {
                $name = $_POST['name'];
                $location = $_POST['location'];
                $token = $_POST['token'];

                $sanitized_name = trim(escapeshellarg($name), '"');

                $privateKeyCommand = "ssh-keygen -t rsa -b 2048 -N '' -f $sanitized_name" . "key 2>&1";
                shell_exec($privateKeyCommand);

                $certificateCommand = "ssh-keygen -s myCAkey -I $sanitized_name -n $sanitized_name $sanitized_name" . "key.pub 2>&1";
                shell_exec($certificateCommand);

                $private = file_get_contents($sanitized_name . 'key');
                $public = file_get_contents($sanitized_name . 'key.pub');
                $certificate = file_get_contents($sanitized_name . 'key-cert.pub');

                $sql = "INSERT INTO `workers` (`token`, `name`, `location`, `public`, `certificate`) VALUES ('$token', '$sanitized_name', '$location', '$public', '$certificate')";
                $query = mysqli_query($conn, $sql);

                $zipCommand = "zip $sanitized_name $sanitized_name" . "key.pub $sanitized_name" . "key";
                shell_exec($zipCommand);

                if ($query) {
                    echo '<div class="alert alert-success mt-3" role="alert">';
                    echo '<h2>Worker added successfully!</h2>';
                    echo '<p>Public Key: <a href="' . $public . '" download="key.pub">Download Public Key</a></p>';
                    echo '<p>Private Key: <a href="' . $private . '" download="key">Download Private Key</a></p>';
                    echo '<p>Certificate: <a href="' . $certificate . '" download="key-cert.pub">Download SSH Certificate</a></p>';
                    echo '</div>';

                    $deleteCommand = "rm $sanitized_name" . "key";
                    shell_exec($deleteCommand);
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Error Occurred!</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">Error Occurred!</div>';
            }
        }
        ?>
        <div class="mt-4">
            <a href="add_worker.php" class="btn btn-primary">Add Another Worker</a>
            <a href="login.php" class="btn btn-primary">My Workers</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
