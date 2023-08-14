<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Master Form</title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Master Registration</h1>
        <form action="upload_master.php" method="POST">
            <label for="password">Admin Password:</label>
            <input type="password" name="password" id="password" required />
            <br />
            <br />    
            <label for="name">Device Name:</label>
            <input type="text" name="name" id="name" required />
            <br />
            <br />
            <label for="ip">Public IP or Domain:</label>
            <input type="text" name="ip" id="ip" required />
            <br />
            <br />
            <label for="certificate">Certificate:</label>
            <input type="text" name="certificate" id="certificate" required />
            <input type="submit" name="submit" id="submit" />
        </form>
        <br />
        <br />
        <a href="forgot_token.php"><button>Forgot Token?</button></a>
        <br />
        <br />
        <a href="index.php"><button>Create an account</button></a>
    </body>
</html>