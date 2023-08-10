<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Added</title>
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
            if(isset($_POST['password']) && isset($_POST['name']) && isset($_POST['ip']) && isset($_POST['certificate'])) {
                # accounts table fields
                $password = $_POST['password'];
                $name = $_POST['name'];
                $ip = $_POST['ip'];
                $certificate = $_POST['certificate'];

                if ($password == 'password') {   
                    $sql = "INSERT INTO `masters` (`name`, `ip`, `certificate`) VALUES ('$name', '$ip', '$certificate')";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        echo "Master " . $name . " added successfully!<br>"; 
                    }
                } else {
                    echo "Incorrect password.";
                }
            }
        }
    ?>
    <br />
    <br />
    <a href="master.php"><button>All Masters</button></a>
    <br />
    <br />
    <a href="index.php"><button>Back Home</button></a>
</body>
</html>
