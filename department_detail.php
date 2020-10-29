<!DOCTYPE html>
<html>
<head>
<title>Department Details</title>
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
<?php 
require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries
// require('mysqli_connection.php');
$this_depart_id= $_GET['id'];
$depart_query = "SELECT * FROM DEPARTMENT WHERE department_id =$this_depart_id";
$depart_result = mysqli_query($connection, $depart_query);


while ($row = mysqli_fetch_assoc($depart_result)) {
    echo "<h1>Department:  " . $row['department_name'] .  " ". "</h1>";
    echo "<p>Department Id: " . $row['department_id'] .  "</p>";
    echo "<p>Number of Employees: " . $row['num_of_employees'] .  "</p>";
    echo "<p>Building Location: " . $row['building_number'] .  "</p>";
    
}
?>
</body>
</html>