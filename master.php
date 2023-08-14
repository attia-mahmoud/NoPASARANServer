<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Nodes</title>
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
        $conn = mysqli_connect('localhost', 'root', '', 'nopasaran') or die("Connection Failed:" .mysqli_connect_error());
        $sql = "SELECT * FROM `masters`";
        $query = mysqli_query($conn, $sql);

        echo '<table>';
        echo '<tr><th>Name</th><th>Domain</th><th>Certificate</th></tr>';

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['ip'] . '</td>';
                echo '<td>' . $row['certificate'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No workers found with that token.';
        }
    ?>
    <br />
    <br />
    <a href="index.php"><button>Back to Home</button></a>
</body>
</html>