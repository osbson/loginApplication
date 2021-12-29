<?php

$servername = "krier.uscs.susx.ac.uk";
$rootUser = "ob217";
$db = "G6077_ob217";
$rootPassword = "Mysql_496082";

$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

if ($conn->connect_error){
	die ("Connection failed" .$conn->connect_error);
}

$forename = $_POST['txtForename'];
$surname = $_POST['txtSurname'];
$username = $_POST['txtUsername'];
$email1 = $_POST['txtEmail1'];
$email2 = $_POST['txtEmail2'];
$phoneNo = $_POST['txtPhone'];
$password1 = $_POST['txtPassword1'];
$password2 = $_POST['txtPassword2'];
$securityQ = $_POST['txtSecurityQ'];
$securityA = $_POST['txtSecurityA'];

$errorOccurred = 0;

//check that no inputs are blank
if ($forename == ""){
	echo "Enter forename <br/>";
	$errorOccurred = 1;
}

if ($surname == ""){
	echo "Enter surname <br/>";
	$errorOccurred = 1;
}

if ($username == ""){
	echo "Enter username <br/>";
	$errorOccurred = 1;
}

if ($email1 == "" OR $email2 == ""){
	echo "Enter email <br/>";
	$errorOccurred = 1;
}

if ($phoneNo == ""){
	echo "Enter phone number <br />";
	$errorOccurred = 1;
}

if ($password1 == "" OR $password2 == ""){
	echo "Enter password <br/>";
	$errorOccurred = 1;
}

if ($securityQ == ""){
	echo "Choose security question <br/>";
	$errorOccurred = 1;
}

if ($securityA == ""){
	echo "Enter security answer <br/>";
	$errorOccurred = 1;
}

//check if user exists using prepared sql
$stmt = $conn->prepare("SELECT Username FROM SystemUser WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($bind_username);
$stmt->store_result();


if($stmt->num_rows > 0){
	echo "Username already in use <br/>";
	$errorOccurred = 1;
}

//check if email exists using prepared sql
$stmt1 = $conn->prepare("SELECT Email FROM SystemUser WHERE Email = ?");
$stmt1->bind_param("s", $email1);
$stmt1->execute();
$stmt1->bind_result($bind_email);
$stmt1->store_result();

if($stmt1->num_rows > 0){
	echo "Email already in use <br/>";
	$errorOccurred = 1;
}

//check to make sure that email address contain at symbol
if (strpos ($email1, "@") == false OR strpos($email2, "@") == false){
	echo "Email address invalid <br/>";
	$errorOccurred = 1;
}

//check to make sure that emails match
if($email1 != $email2){
	echo "Emails do not match <br/>";
	$errorOccurred = 1;
}

if (!(is_numeric($phoneNo)) OR strlen($phoneNo)>15){
	echo "Invalid phone number <br />";
	$errorOccurred = 1;
}

//check to make sure that password values match
if ($password1 != $password2){
	echo "Passwords do not match <br/>";
	$errorOccurred = 1;
}

/*
console.log("test");
$password = password_hash($password1, PASSWORD_DEFAULT);
console.log($password);
 */

//if no errors occurred, add values to database using prepared sql statement

if($errorOccurred == 0){
	//hash password
	$password = password_hash($password1, PASSWORD_DEFAULT);
	//hash security answer
	$securityA1 = password_hash($securityA, PASSWORD_DEFAULT);
	$stmt = $conn->prepare("INSERT INTO SystemUser (Username, Password, Forename, Surname, Email, Phone, SecurityQ, SecurityA) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssss", $username, $password, $forename, $surname, $email1, $phoneNo, $securityQ, $securityA1);
	if($stmt->execute()){
		//thank user for joining and send to login page
		echo "Thank you for joining Lovejoy's Antiques";
		header("Location:registerThanks.php");
		exit;
	}
}


?>

