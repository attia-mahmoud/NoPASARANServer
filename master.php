<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed:" .mysqli_connect_error());
        $sql = "SELECT * FROM `secrets` WHERE token='54887d07aa3a907e290f06a775f5871bffb1746f3f91602a8cd2a079c87a'";
        $query = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($query)) {
            echo 'The public key of the master is: <br><br>' . $row['public'] . '<br>';
        } 
    ?>
    <br />
    <br />
    <a href="index.php"><button>Back to Register</button></a>
</body>
</html>