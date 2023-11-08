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
if (mysqli_connect_errno())
exit("Error - could not connect to mySQL");

//hmtl injection
$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST["lastName"]);
$email = htmlspecialchars($_POST["email"]);
$campusID = htmlspecialchars($_POST["campusID"]);

//mysql injection
$firstName = mysqli_real_escape_string($db, $firstName);
$lastName = mysqli_real_escape_string($db, $lastName);
$email = mysqli_real_escape_string($db, $email);
$campusID = mysqli_real_escape_string($db, $campusID);

//sql query
$constructed_query = "INSERT INTO newUser(firstName, lastName, email, campusID) VALUES('$firstName', 'lastName','$email', '$campusID')";

//execute SQL squery
$result = mysqli_query($db, $constructed_query);

//will be linked to join team page
echo "<a href='dashboard.html'>Team Page</a>";
?>

<p>New User Created</p>

</body>
</html>
