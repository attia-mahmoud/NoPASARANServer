<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Worker Form</title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Worker Registration</h1>
        <form action="gen_keys.php" method="POST">
            <label for="token">Your Token:</label>
            <input type="text" name="token" id="token" required />
            <br />
            <br />    
            <label for="name">Device Name:</label>
            <input type="text" name="name" id="name" required />
            <br />
            <br />
            <label for="ip">Public IP:</label>
            <input type="text" name="ip" id="ip" required />
            <br />
            <br />
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