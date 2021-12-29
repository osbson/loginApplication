<?php

$servername = "krier.uscs.susx.ac.uk";
$rootUser = "ob217";
$db = "G6077_ob217";
$rootPassword = "Mysql_496082";

$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

if ($conn->connect_error){
	die ("Connection failed" .$conn->connect_error);
}

session_start();
if($_SESSION['username'] != "admin"){
	header("Location:loginForm.php");
	exit;
}

if($_SESSION['username'] != 'admin'){
	header("Location:loginForm.php");
	exit;
}

echo "All requests";
//list requests here []

$sql = "SELECT SystemUser.Forename, SystemUser.Surname, SystemUser.Email, SystemUser.Phone, 
	Requests.Description, Requests.Contact FROM SystemUser, Requests WHERE Requests.UserID = SystemUser.ID";
$result = $conn->query($sql);
if($result->num_rows > 0){
	
	echo "<table border = '1'>
		<tr>
		<th>Forename</th>
		<th>Surname</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Description</th>
		<th>Contact</th>
		</tr>";

	while($row = $result->fetch_assoc()){
		echo "<tr>";
		echo "<td>" . htmlspecialchars($row['Forename']) . "</td>";
		echo "<td>" . htmlspecialchars($row['Surname']) . "</td>";
		echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
		echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
		echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
		echo "<td>" . htmlspecialchars($row['Contact']) . "</td>";
		echo "</tr>";

	}
	echo "</table>";
	
} else {
	echo "<br /> 0 requests";
}	


echo "<br />";

echo "<a href='loginForm.php'>Logout</a>";




?>
