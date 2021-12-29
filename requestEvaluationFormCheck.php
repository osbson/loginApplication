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
 
$description = $_POST['txtDescription'];
$contact = $_POST['txtContact'];

$errorOccurred = 0;

$filename = $_FILES["txtPhoto"]["name"];
$tempname = $_FILES["txtPhoto"]["tmp_name"];
$folder = "uploads/".basename($filename);

$fileParts = pathinfo($filename, PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','gif','pdf');

if(in_array($fileParts, $allowTypes)){	
	if (move_uploaded_file($tempname, $folder)){
		$output = "Successful image upload";	
	} else {
		echo "Image upload unsuccessful";
		$errorOccurrd = 1;
	}
} else {
	echo "Only JPG, JPEG, PNG, GIF, or PDF files allowed";
}

if ($description  == ""){
	echo "Enter description <br/>";
	$errorOccurred = 1;
}

if ($contact == ""){
	echo "Enter preferred contact <br/>";
	$errorOccurred = 1;
}

//fetch current userID, and use as foreign key in table
if($errorOccurred == 0){
	$result = $conn->query("SELECT ID FROM SystemUser WHERE Username = '$currentUser'");
	$arr = $result->fetch_assoc();
	$user_id = $arr["ID"];
	$stmt = $conn->prepare("INSERT INTO Requests (UserID, Description, Contact, Photo) VALUES (?, ?, ?, ?)");
	$stmt->bind_param('isss',$user_id, $description, $contact, $filename);
	if($stmt->execute()){
		echo "Your request has been submitted";
		header("Location:requestThanks.php");
		exit;
	}
}

?>
