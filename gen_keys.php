<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Worker</title>
</head>
<body>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['name']) && isset($_POST['location']) && isset($_POST['token'])) {
            # accounts table fields
            $name = $_POST['name'];
            $location = $_POST['location'];
            $token = $_POST['token'];

            # sanitize and escape the argument
            $sanitized_name = trim(escapeshellarg($name), '"');

            # create private key for the user
            $privateKeyCommand = "ssh-keygen -t rsa -b 2048 -N '' -f $sanitized_name" . "key 2>&1";
            shell_exec($privateKeyCommand);

            # get the CA private key and store it in a file
            $sql = "SELECT * FROM `secrets` WHERE `token`='54887d07aa3a907e290f06a775f5871bffb1746f3f91602a8cd2a079c87a'";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                $row = mysqli_fetch_row($query);
            
                if ($row && isset($row[3])) {
                    $myCAkey = $row[3];
            
                    // Save the CA private key to a file
                    file_put_contents('myCAkey', $myCAkey);

                    // Generate SSH certificate
                    // Sanitize and escape the input
                    $certificateCommand = "ssh-keygen -s myCAkey -I $sanitized_name -n $sanitized_name $sanitized_name" . "key.pub 2>&1";
                    // Execute the command and capture output
                    shell_exec($certificateCommand);

                    // Read generated files into variables
                    $private = file_get_contents($sanitized_name . 'key');
                    $public = file_get_contents($sanitized_name . 'key.pub');
                    $certificate = file_get_contents($sanitized_name . 'key-cert.pub');

                    $sql = "INSERT INTO `workers` (`token`, `name`, `location`, `public`, `certificate`) VALUES ('$token', '$sanitized_name', '$location', '$public', '$certificate')";
                    
                    $query = mysqli_query($conn, $sql);

                    $zipCommand = "zip $sanitized_name $sanitized_name" . "key.pub $sanitized_name" . "key";
                    shell_exec($zipCommand);

                    if ($query) {
                        echo "<h2>Worker added successfully!</h2><br><br>";
                        echo 'Public Key: <br>' . $public . '<hr>';
                        echo 'Private Key: <br>' . $private . '<hr>';
                        echo 'Certificate: <br>' . $certificate . '<hr>';
                    } else {
                        echo 'Error Occured!';
                    }
            
                } else {
                    echo 'Error: CA private key not found.';
                }
            } else {
                echo "Error occured.";
            }
        } else {
            echo 'Error occured.';
        }
    }
?>
    <br />
    <br />
    <a href="add_worker.php"><button>Add Another Worker</button></a>
    <br />
    <br />
    <a href="login.php"><button>My Workers</button></a>
</body>
</html>
