<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Nodes</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        body {
            text-align: center;
            padding-top: 50px;
        }
        .table-container {
            max-width: 800px; /* Adjust the maximum width as needed */
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed: " . mysqli_connect_error());
        $sql = "SELECT * FROM `masters`";
        $query = mysqli_query($conn, $sql);

        echo '<h1>Master Nodes</h1>';
        echo '<div class="table-container">';
        echo '<table class="table table-bordered table-striped mt-3">';
        echo '<thead class="table-dark"><tr><th>Name</th><th>Domain</th><th>Certificate</th></tr></thead>';
        echo '<tbody>';

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $name = $row['name'];
                file_put_contents($name  . 'master-cert.pub', $row['certificate']);
                echo '<tr>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $row['ip'] . '</td>';
                echo "<td><a href='$name" . "master-cert.pub' download='master-cert.pub'>Download Master Certificate</a></td>";
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">No master nodes found.</div>';
        }
        ?>
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
