<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Registration Form</title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Welcome to NoPASARAN</h1>
        <h3>Create an account</h3>
        <form action="register.php" method="POST">
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
        <a href="login.php"><button>My Workers</button></a>
        <br />
        <br />
        <a href="add_worker.php"><button>Add a Worker</button></a>
        <br />
        <br />
        <a href="forgot_token.php"><button>Forgot Token?</button></a>
        <br />
        <br />
        <a href="master.php"><button>Get Master(s) Public Key</button></a>
        <br />
        <br />
        <a href="add_master.php"><button>Add Master Node</button></a>
    </body>
</html>