<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">


<html xmlns = "http://www.w3.org/1999/xhtml">
<head> 
    <title>New league</title>
    <link rel="stylesheet" type = "text/css" href="main_stylesheet.css">
</head>
<body>
    <?php
        //Connect to database
        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "dabimbo1", "dabimbo1", "dabimbo1");
        
        //collecting form inputs and put all html variable into php viarables
        $teamname =  $_POST["name"];
        $teamnumber =  $_POST["players"];
        $sport =  $_POST["sport"];

        $teamname = mysqli_real_escape_string($db,$teamname);
        $teamnumber = mysqli_real_escape_string($db,$teamnumber);
        $sport = mysqli_real_escape_string($db,$sport);

        //create my SQL query
        //more columns might added but basic info for now
        $constrcuted_query = "INSERT INTO Teams(Teamname, Numberofplayers , Sport) VALUES('$teamname', '$teamnumber', '$sport')" ;

        //execute SQL query
        $results = mysqli_query($db, $constrcuted_query);
            
    ?>

<h1> Congratulationas! </h1>
<p> Your team <?php echo $teamname ?> 
has been added to team roster with <?php echo $teamnumber ?> 
number of players for <?php echo $sport  ?> <p>
<br>
<br>

<a href = "leaguepage.html">
League page
</a>
</body>
</html>
