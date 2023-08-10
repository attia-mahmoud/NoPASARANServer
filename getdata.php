<!DOCTYPE html>

<html>
    <head>
        <title>My Workers</title>
        <style>
            td:nth-child(even), th:nth-child(even) {
                background-color: #D6EEEE;
            }
            td {
                min-width: 10rem;
                max-width: 70ch;
                word-wrap: break-word;
            }
            tr {
                border-bottom: 1px solid #000000;
            }
        </style>
    </head>
    <body>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed:" .mysqli_connect_error());
                if(isset($_POST['token'])) {
                    # accounts table fields
                    $token = $_POST['token'];

                    $sql = "SELECT * FROM `workers` WHERE `token`=?";
                    $stmt = mysqli_prepare($conn, $sql);

                    // Bind the parameter
                    mysqli_stmt_bind_param($stmt, "s", $token);
                
                    // Execute the statement
                    mysqli_stmt_execute($stmt);
                
                    // Get the result
                    $query = mysqli_stmt_get_result($stmt);
            
                    if ($query) {
                        echo '<h3>Workers associated with token <strong>' . $token . '</strong></h3>';
                        echo '<table>';
                        echo '<tr><th>Name</th><th>Location</th><th>Public Key</th><th>Certificate</th></tr>';
                
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td>' . $row['public'] . '</td>';
                            echo '<td>' . $row['certificate'] . '</td>';
                            echo '</tr>';
                        }
            
                        echo '</table>';
                    } else {
                        echo 'No workers found with that token.';
                    }
        }
    }
?>
<br />
<br />
<a href="index.php"><button>Back to Home</button></a>
</body>
</html>