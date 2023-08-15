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
        // Check if the form has been submitted via POST and if the 'submit' button was pressed
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            // Establish a connection to the MySQL database
            $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed: " . mysqli_connect_error());

            // Check if both 'username' and 'password' fields are set in the POST data
            if (isset($_POST['username']) && isset($_POST['password'])) {
                // Retrieve the submitted username and password
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Hash the password using the BCRYPT algorithm
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Generate a random token for the user
                $token = bin2hex(random_bytes(30));

                // Construct the SQL query to insert the user data into the 'accounts' table
                $sql = "INSERT INTO `accounts` (`username`, `password`, `token`) VALUES ('$username', '$hashedPassword', '$token')";
                
                // Execute the SQL query
                $query = mysqli_query($conn, $sql);
                
                // If the query was successful, display a success message
                if ($query) {
                    echo '<div class="alert alert-success mt-3" role="alert">';
                    echo 'User ' . $username . ' registered successfully!<br>';
                    echo 'Your token is ' . $token . '!';
                    echo '</div>';
                }
            }
        }
        ?>
        <!-- Navigation links -->
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