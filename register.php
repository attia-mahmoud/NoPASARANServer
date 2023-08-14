<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account</title>
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
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $token = bin2hex(random_bytes(30));

                $sql = "INSERT INTO `accounts` (`username`, `password`, `token`) VALUES ('$username', '$hashedPassword', '$token')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo '<div class="alert alert-success mt-3" role="alert">';
                    echo 'User ' . $username . ' registered successfully!<br>';
                    echo 'Your token is ' . $token . '!';
                    echo '</div>';
                }
            }
        }
        ?>
        <div class="mt-4">
            <a href="add_worker.php" class="btn btn-primary">Add a Worker</a>
            <a href="login.php" class="btn btn-primary">Login with Token</a>
            <a href="forgot_token.php" class="btn btn-primary">Back Home</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
