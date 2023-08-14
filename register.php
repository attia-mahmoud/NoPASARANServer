<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed:" .mysqli_connect_error());
            if(isset($_POST['username']) && isset($_POST['password'])) {
                # accounts table fields
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $token = bin2hex(random_bytes(30));

                $sql = "INSERT INTO `accounts` (`username`, `password`, `token`) VALUES ('$username', '$hashedPassword', '$token')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo "User " . $username . " registered successfully!<br>"; 
                    echo "Your token is " . $token . "!";
                }
            }
        }
    ?>
    <br />
    <br />
    <a href="add_worker.php"><button>Add a Worker</button></a>
    <br />
    <br />
    <a href="login.php"><button>Login with Token</button></a>
    <br />
    <br />
    <a href="forgot_token.php"><button>Back Home</button></a>
</body>
</html>
