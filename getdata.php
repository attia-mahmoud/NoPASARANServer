<!DOCTYPE html>
<html>
<head>
    <title>My Workers</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        .table-container {
            text-align: center;
            width: 70%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed: " . mysqli_connect_error());
            if (isset($_POST['token'])) {
                $token = $_POST['token'];

                $sql = "SELECT * FROM `workers` WHERE `token`=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $token);
                mysqli_stmt_execute($stmt);
                $query = mysqli_stmt_get_result($stmt);

                if ($query) {
                    echo '<h3 class="mt-4">Workers associated with token: <i>' . $token . '</i></h3>';
                    echo '<div class="table-container">';
                    echo '<table class="table table-bordered table-striped mt-3">';
                    echo '<thead class="table-dark"><tr><th>Name</th><th>Location</th><th>Public Key</th><th>Certificate</th></tr></thead>';
                    echo '<tbody>';

                    while ($row = mysqli_fetch_assoc($query)) {
                        $name = $row['name'];
                        file_put_contents($name . 'key.pub', $row['public']);
                        file_put_contents($name . 'key-cert.pub', $row['certificate']);
                        echo '<tr>';
                        echo '<td>' . $name . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo "<td><a href='$name" . "key.pub' download='key.pub'>Download Public Key</a></td>";
                        echo "<td><a href='$name" . "key-cert.pub' download='key-cert.pub'>Download SSH Certificate</a></td>";
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-warning" role="alert">No workers found with that token.</div>';
                }
            }
        }
        ?>
        <div class="mt-4 text-center">
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
