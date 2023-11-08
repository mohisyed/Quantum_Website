<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Validation</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="main_stylesheet.css" />
</head>
<body>
    <h1>Sign Up Validation</h1>

    <?php

        //will be connected to database...
        $db = mysqli_connect("studentdb-maria.gl.umbc.edu","skhanda1","skhanda1","skhanda1");
        if (mysqli_connect_errno()){
        exit("Error - could not connect to mySQL");}

        //hmtl injection
        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName = htmlspecialchars($_POST["lastName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $campusID = htmlspecialchars($_POST["campusID"]);

        //mysql injection
        $firstName = mysqli_real_escape_string($db, $firstName);
        $lastName = mysqli_real_escape_string($db, $lastName);
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db,$password);
        $campusID = mysqli_real_escape_string($db, $campusID);

        //print statements
        echo "First Name: $firstName <br>";
        echo "Last Name: $lastName <br>";
        echo "Email: $email <br>";
        echo "Password: $password <br>";
        echo "Campus ID: $campusID <br>";

        //sql query
        $constructed_query = "INSERT INTO newUser(firstName, lastName, email, password; campusID) VALUES('$firstName', '$lastName','$email','$password', '$campusID')";

        //execute SQL squery
        $result = mysqli_query($db, $constructed_query);

        //will be linked to join team page
        //echo "<a href='dashboard.html'>Team Page</a>";
        ?>

    <p>New User Created</p>
    <br>
    <br>
    <div class = "button-center">
        <a href='jointeam.html'>
            Join Team
        </a>
    </div>
</body>
</html>
