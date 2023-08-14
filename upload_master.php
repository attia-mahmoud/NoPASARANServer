<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Added</title>
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
            if (isset($_POST['password']) && isset($_POST['name']) && isset($_POST['ip']) && isset($_POST['certificate'])) {
                $password = $_POST['password'];
                $name = $_POST['name'];
                $ip = $_POST['ip'];
                $certificate = $_POST['certificate'];

                if ($password == 'password') {
                    $sql = "INSERT INTO `masters` (`name`, `ip`, `certificate`) VALUES ('$name', '$ip', '$certificate')";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        echo '<div class="alert alert-success mt-3" role="alert">';
                        echo 'Master ' . $name . ' added successfully!<br>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">';
                    echo 'Incorrect password.';
                    echo '</div>';
                }
            }
        }
        ?>
        <div class="mt-4">
            <a href="master.php" class="btn btn-primary">All Masters</a>
            <a href="index.php" class="btn btn-primary">Back Home</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
