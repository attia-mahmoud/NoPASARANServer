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
            // Establish a connection to the MySQL database
            $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed: " . mysqli_connect_error());
            
            // Check if necessary POST fields are set
            if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['token'])) {
                // Retrieve values from POST data
                $name = $_POST['name'];
                $location = $_POST['location'];
                $token = $_POST['token'];

                // Sanitize the name for shell commands
                $sanitized_name = trim(escapeshellarg($name), '"');

                // Generate private and public keys using ssh-keygen
                $privateKeyCommand = "ssh-keygen -t rsa -b 2048 -N '' -f $sanitized_name" . "key 2>&1";
                shell_exec($privateKeyCommand);

                // Generate a certificate using ssh-keygen
                $certificateCommand = "ssh-keygen -s myCAkey -I $sanitized_name -n $sanitized_name $sanitized_name" . "key.pub 2>&1";
                shell_exec($certificateCommand);

                // Read the generated private, public, and certificate keys
                $private = file_get_contents($sanitized_name . 'key');
                $public = file_get_contents($sanitized_name . 'key.pub');
                $certificate = file_get_contents($sanitized_name . 'key-cert.pub');

                // Construct the SQL query to insert worker data into the 'workers' table
                $sql = "INSERT INTO `workers` (`token`, `name`, `location`, `public`, `certificate`) VALUES ('$token', '$sanitized_name', '$location', '$public', '$certificate')";
                
                // Execute the SQL query
                $query = mysqli_query($conn, $sql);

                // Zip the private and public keys
                $zipCommand = "zip $sanitized_name $sanitized_name" . "key.pub $sanitized_name" . "key";
                shell_exec($zipCommand);

                if ($query) {
                    // Display success message along with links to download keys
                    echo '<div class="alert alert-success mt-3" role="alert">';
                    echo '<h2>Worker added successfully!</h2>';
                    echo '<p>Public Key: <a href="' . $public . '" download="key.pub">Download Public Key</a></p>';
                    echo '<p>Private Key: <a href="' . $private . '" download="key">Download Private Key</a></p>';
                    echo '<p>Certificate: <a href="' . $certificate . '" download="key-cert.pub">Download SSH Certificate</a></p>';
                    echo '</div>';

                    // Delete the generated private key file
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
        <!-- Navigation links -->
        <div class="mt-4">
            <a href="add_worker.php" class="btn btn-primary">Add Another Worker</a>
            <a href="login.php" class="btn btn-primary">My Workers</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
