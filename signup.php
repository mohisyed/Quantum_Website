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
        exit("Error - could not connect to MySQL");}

        //hmtl injection
        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName = htmlspecialchars($_POST["lastName"]);
        $email = htmlspecialchars($_POST["email"]);
        $campusID = htmlspecialchars($_POST["campusID"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        //mysql injection
        $firstName = mysqli_real_escape_string($db, $firstName);
        $lastName = mysqli_real_escape_string($db, $lastName);
        $email = mysqli_real_escape_string($db, $email);
        $campusID = mysqli_real_escape_string($db, $campusID);
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db,$password);


        //print statements
        echo "First Name: $firstName <br>";
        echo "Last Name: $lastName <br>";
        echo "Email: $email <br>";
        echo "Campus ID: $campusID <br>";

        //sql query
        $constructed_query = "INSERT INTO newUser(firstName, lastName,  email, campusID, username, password) VALUES('$firstName', '$lastName','$email','campusID','username','$password')";

        //execute SQL squery
        mysqli_query($db, $constructed_query);

        if(mysqli_error($db)) {
          die("Error: " .mysqli_error($db));
        }
        else {
          echo "New User Created";
        }

        ?>
    <br>
    <br>
    <div class = "button-center">
        <a href='jointeam.html'>
            Join Team
        </a>
    </div>
</body>
</html>
