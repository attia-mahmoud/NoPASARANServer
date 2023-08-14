<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Token</title>
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

                    $sql = "SELECT * FROM `accounts` WHERE `username`='$username'";
                    $query = mysqli_query($conn, $sql);

                    if ($row = mysqli_fetch_assoc($query)) {
                        if (password_verify($password, $row['password'])) {
                            echo '<div class="alert alert-success mt-3" role="alert">';
                            echo 'The token associated with the account <strong>' . $username . '</strong> is:<br>';
                            echo '<strong>' . $row['token'] . '</strong>';
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-danger mt-3" role="alert">';
                            echo 'Invalid username or password. Please check your credentials.';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">';
                        echo 'User not found. Please check your credentials.';
                        echo '</div>';
                    }
                }
            }
            ?>
            <div class="mt-4">
                <a href="add_worker.php" class="btn btn-secondary">Add a Worker</a>
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>

        <!-- Include Bootstrap JS (Optional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
