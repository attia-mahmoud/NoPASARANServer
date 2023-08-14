<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding-top: 50px;
        }
        
        .custom-form {
            max-width: 400px; /* Adjust the maximum width as needed */
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to NoPASARAN</h1>
        <h3>Create an account</h3>
        <form action="register.php" method="POST" class="custom-form">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Register</button>
        </form>
        <div class="mt-4">
            <a href="login.php" class="btn btn-secondary">My Workers</a>
            <a href="add_worker.php" class="btn btn-secondary">Add a Worker</a>
            <a href="forgot_token.php" class="btn btn-secondary">Forgot Token?</a>
            <a href="master.php" class="btn btn-secondary">Get Master Certificates</a>
            <a href="add_master.php" class="btn btn-secondary">Add Master Node</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
