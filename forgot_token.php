<!DOCTYPE html>
<html lang="en">
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
        <h1>Forgot Token?</h1>
        <h3>Input your credentials</h3>
        <form action="get_token.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required />
            <br />
            <br />
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
            <br />
            <br />
            <input type="submit" name="submit" id="submit">
        </form>
        <br />
        <br />
        <a href="login.php"><button>Login with Token</button></a>
        <br />
        <br />
        <a href="index.php"><button>Back to Home</button></a>
    </body>
</html>