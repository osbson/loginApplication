<?php


$servername = "krier.uscs.susx.ac.uk";
$rootUser = "ob217";
$db = "G6077_ob217";
$rootPassword = "Mysql_496082";

$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

$username = $_POST['txtUsername'];

if ($conn->connect_error){
	die ("Connection failed" .$conn->connect_error);
}

session_start();
$_SESSION['forgotUsername'] = $username;

$userFound = 0;

$stmt = $conn->prepare("SELECT Username FROM SystemUser WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($bind_username);
$stmt->store_result();

if($stmt->num_rows == 1){
	if($stmt->fetch()){
		$userFound = 1;
		echo "User found";
		header("Location:forgotPasswordForm.php");
		exit;
	}
} else {
	echo "User not found";
}


?>
