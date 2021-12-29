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
if($_SESSION['username'] == ""){
	header("Location:loginForm.php");
	exit;
}
$currentUser = $_SESSION['username'];

echo "Your current requests";
//list requests here []

$sql = "SELECT Requests.Description, Requests.Contact FROM Requests, SystemUser WHERE Requests.UserID = SystemUser.ID AND SystemUser.username = '$currentUser'";
$result = $conn->query($sql);
if($result->num_rows > 0){
	
	echo "<table border = '1'>
		<tr>
		<th>Description</th>
		<th>Contact</th>
		</tr>";

	while($row = $result->fetch_assoc()){
		echo "<tr>";
		echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
		echo "<td>" . htmlspecialchars($row['Contact']) . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	
} else {
	echo "<br /> 0 requests";
}	

echo "<br />";
echo "<a href='requestEvaluationForm.php'>Request Evaluation</a>";
echo "<br />";
echo "<a href='loginForm.php'>Logout</a>";

?>
