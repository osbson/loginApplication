<?php


$servername = "krier.uscs.susx.ac.uk";
$rootUser = "ob217";
$db = "G6077_ob217";
$rootPassword = "Mysql_496082";

$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

$password1 = $_POST['txtPassword1'];
$password2 = $_POST['txtPassword2'];

if ($conn->connect_error){
	die ("Connection failed" .$conn->connect_error);
}

session_start();
if($_SESSION['forgotUsername'] == ""){
        header("Location:loginForm.php");
        exit;
}
$currentUser = $_SESSION['forgotUsername'];

$errorOccurred = 0;

if ($password1 != $password2){
	echo "Passwords do not match <br/>";
	$errorOccurred = 1;
}

if($errorOccurred == 0){	
	$password = password_hash($password1, PASSWORD_DEFAULT);
	
	$stmt = $conn->prepare("UPDATE SystemUser SET Password = ? WHERE Username = ?");
	$stmt->bind_param("ss", $password, $currentUser);
	if($stmt->execute()){
		echo "Password reset success";
		header("Location:resetPasswordSuccess.php");
		exit;
	}
}

?>
