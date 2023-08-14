<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h1>Login with Token</h1>
        <form action="getdata.php" method="POST" class="custom-form">
            <div class="mb-3">
                <label for="token" class="form-label">Token:</label>
                <input type="text" class="form-control" name="token" id="token" required />
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Back to Register</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
