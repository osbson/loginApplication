<?php


$servername = "krier.uscs.susx.ac.uk";
$rootUser = "ob217";
$db = "G6077_ob217";
$rootPassword = "Mysql_496082";

$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

$securityA = $_POST['txtSecurityA'];

if ($conn->connect_error){
	die ("Connection failed" .$conn->connect_error);
}

session_start();
if($_SESSION['forgotUsername'] == ""){
	header("Location:loginForm.php");
	exit;
}
$currentUser = $_SESSION['forgotUsername'];

$sql = "SELECT SecurityA FROM SystemUser WHERE Username = '$currentUser'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$result_securityA = $row['SecurityA'];

if(password_verify($securityA, $result_securityA)){
	echo "Correct security answer";
	header("Location:resetPasswordForm.php");
	exit;
} else {
	echo "Incorrect security answer";
}




?>
