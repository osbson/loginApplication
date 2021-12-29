<?php


$servername = "krier.uscs.susx.ac.uk";
$rootUser = "ob217";
$db = "G6077_ob217";
$rootPassword = "Mysql_496082";

$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

if ($conn->connect_error){
	die ("Connection failed" .$conn->connect_error);
}

session_start();
$_SESSION['username'] = $username;

$userFound = 0;

$stmt = $conn->prepare("SELECT Username, Password FROM SystemUser WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($bind_username, $bind_password);
$stmt->store_result();

if($stmt->num_rows == 1){
	if($stmt->fetch()){
		$userFound = 1;
		if(password_verify($password, $bind_password)){
			echo "Login successful";

			if($username == 'admin'){
				header("Location:requests.php");
				exit;
			} else {
				header("Location:home.php");
				exit;
			}
		} else {
			echo "Incorrect password";
		}
	}
} else {
	echo "User not found";
}


?>

