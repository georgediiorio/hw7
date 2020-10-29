<!DOCTYPE html>
<html>
<head>
<title>Departments</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<style>
body{
    font-family: 'Montserrat', sans-serif;
    margin: 10%;
}
td {
width: 100px;
}
thead {
font-weight: bold;
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
echo "<h1>Evil Corp Departments</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM DEPARTMENT";
$result = mysqli_query($connection, $query);


echo "<table>
                <thead>
                    <td>Department ID</td>
                    <td>Department Name</td>
                    <td>Number of Employees</td>
                    <td>Building Location</td>
            </thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>
            <td class='center'><a href='department_detail.php?id=" . $row['department_id'] ."'>" . $row['department_id'] . "</a></td>
            <td>" . $row['department_name'] . "</td>
            <td>" . $row['num_of_employees'] . "</td>
            <td>" . $row['building_number'] . "</td>
            </tr>";
}
echo "</table>"; // close table
?>
</body>
</html>