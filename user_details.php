<!DOCTYPE html>
<html>
<head>
<title>Users Details</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<style>
body{
    font-family: 'Montserrat', sans-serif;
    margin:10%;
}

.center {
text-align:center;
}

</style>
</head>
<body>
<?php include 'header.php'; ?>
<?php 
require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries
// require('mysqli_connection.php');
$this_user_id = $_GET['id'];
$query = "SELECT * FROM USER WHERE user_id =$this_user_id";

$result = mysqli_query($connection, $query);


while ($row = mysqli_fetch_assoc($result)) {
    echo "<h1>Name:  " . $row['first_name'] .  " " . $row['last_name'] . "</h1>";
    echo "<p>User Id: " . $row['user_id'] .  "</p>";
    echo "<p>Email: " . $row['email_address'] .  "</p>";
    echo "<p>Registration Date: " . $row['create_date'] .  "</p>";
}
?>
<?php include 'footer.php'; ?>
</body>
</html>