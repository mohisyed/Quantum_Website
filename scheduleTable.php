<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Schedule</title>
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css" />

</head>
<body>
<?php
    $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "dabimbo1", "dabimbo1", "dabimbo1");

    $sql = "SELECT Dates, HOME, AWAY FROM Games";
    $result = mysqli_query($db, $sql);


?>
    <h1>Schedule of Games </h1>
    
        <table>
            <tr>
                <th>Date</th>
                <th>Home Team</th>
                <th>Away Team</th>
            </tr>
            
            <?php
            // Loop through the results and populate the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Dates'] . "</td>";
                echo "<td>" . $row['HOME'] . "</td>";
                echo "<td>" . $row['AWAY'] . "</td>";
                echo "</tr>";
            }
            
            // Close the result set and connection
            $result->close();
            
            ?>
            
        </table>
    
</body>
</html>

