<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Team Standings</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="centerBox">
    <?php
    $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "dabimbo1", "dabimbo1", "dabimbo1");

    // Check if the connection is successful
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch teams and their standings from the database, grouped by Sport
    $standings_query = "SELECT Teamname, Sport, Score FROM Teams ORDER BY Sport, Score DESC";
    $standings_result = mysqli_query($db, $standings_query);

    // Check if the query is successful
    if (!$standings_result) {
        die("Query failed: " . mysqli_error($db));
    }
    ?>

    <h1>Team Standings</h1>

    <?php
    $currentSport = null;

    while ($row = mysqli_fetch_assoc($standings_result)) {
        // Check if the current sport is different from the previous one
        if ($row['Sport'] !== $currentSport) {
            // Start a new table for the current sport
            if ($currentSport !== null) {
                echo "</table>"; // Close the previous table if it exists
            }

            echo "<h2>{$row['Sport']} Standings</h2>";
            echo "<table>";
            echo "<tr>
                    <th>Team</th>
                    <th>Sport</th>
                    <th>Score</th>
                </tr>";
            
            $currentSport = $row['Sport'];
        }

        echo "<tr>
                <td>{$row['Teamname']}</td>
                <td>{$row['Sport']}</td>
                <td>{$row['Score']}</td>
                
            </tr>";
    }

    // Close the last table
    echo "</table>";
    ?>

    <a href="scoreboard.html">Go to Scoreboard</a>
</body>
</html>
