<!DOCTYPE html>
<html>
<head>
<title>List Users</title>
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
<?php include 'header.php'; ?>
<?php 
require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries
// require('mysqli_connection.php');
echo "<h1>List of Website Users</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM USER";
$result = mysqli_query($connection, $query);


echo "<table>
                <thead>
                    <td class='center'>User ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email Address</td>
                    <td>Status</td>
                    <td>Delete</td>

            </thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>
            <td class='center'><a href='user_details.php?id=" . $row['user_id'] ."'>" . $row['user_id'] . "</a></td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['email_address'] . "</td>
            <td class='center'>" . $row['status'] . "</td>
            <td class='center'><a href='update_user.php?id=" . $row['user_id'] ."'>Delete</a></td>
            </tr>"; 
}
echo "</table>"; // close table
?>
<?php include 'footer.php'; ?>
</body>
</html>