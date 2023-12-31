<!DOCTYPE html>
<html lang="en">
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
        
        /* Custom styling for the form */
        .custom-form {
            max-width: 400px; /* Adjust the maximum width as needed */
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Heading for the page -->
        <h1>Forgot Token?</h1>
        <h3>Input your credentials</h3>
        
        <!-- Form for retrieving token -->
        <form action="get_token.php" method="POST" class="custom-form">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        
        <!-- Additional navigation links -->
        <div class="mt-4">
            <a href="login.php" class="btn btn-secondary">Login with Token</a>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
