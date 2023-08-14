<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Token</title>
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

                    $sql = "SELECT * FROM `accounts` WHERE `username`='$username'";
                    $query = mysqli_query($conn, $sql);

                    if ($row = mysqli_fetch_assoc($query)) {
                        if (password_verify($password, $row['password'])) {
                            echo 'The token associated with the account <strong>' . $username . '</strong> is: <br>' . $row['token'] . '<hr>';
                        }
                    } else {
                        echo 'User not found. Please check your credentials.';
                        echo '<br /><br /><a href="forgot_token.php"><button>Retry</button></a>';
                    }
                }
            }
        ?>
        <br />
        <br />
        <a href="add_worker.php"><button>Add a Worker</button></a>
        <br />
        <br />
        <a href="index.php"><button>Back to Home</button></a>
    </body>
</html> 
