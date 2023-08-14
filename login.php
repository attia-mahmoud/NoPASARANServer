<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            text-align: center;
        }
    </style>    
</head>
<body>
    <h1>Login with Token</h1>

    <form action="getdata.php" method="POST">
        <label for="token">Token:</label>
        <input type="text" name="token" id="token" required />
        <br />
        <br />
        <input type="submit" name="submit" id="submit" />
    </form>

    <br />
    <br />

    <a href="index.php"><button>Back to Register</button></a>
</body>
</html>