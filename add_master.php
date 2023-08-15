<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Master Form</title>
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
        <!-- Heading for the form -->
        <h1>Master Registration</h1>
        
        <!-- Form for master registration -->
        <form action="upload_master.php" method="POST" enctype="multipart/form-data" class="custom-form">
            <div class="mb-3">
                <label for="password" class="form-label">Admin Password:</label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Device Name:</label>
                <input type="text" class="form-control" name="name" id="name" required />
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">Public IP or Domain:</label>
                <input type="text" class="form-control" name="ip" id="ip" required />
            </div>
            <div class="mb-3">
                <label for="certificate" class="form-label">Certificate:</label>
                <input type="file" class="form-control" name="certificate" id="certificate" accept=".pem" required />
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        
        <!-- Additional navigation links -->
        <div class="mt-4">
            <a href="forgot_token.php" class="btn btn-secondary">Forgot Token?</a>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
