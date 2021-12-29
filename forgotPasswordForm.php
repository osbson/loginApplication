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
if($_SESSION['forgotUsername'] == ""){
        header("Location:loginForm.php");
        exit;
}
$currentUser = $_SESSION['forgotUsername'];

$sql = "SELECT SecurityQ FROM SystemUser WHERE Username = '$currentUser'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$securityQ = $row['SecurityQ'];

echo "Forgot password";
echo "<form action ='forgotPasswordFormCheck.php' method='POST'>"; 

echo "<br/>Security question: $securityQ";


echo "<br/>Enter security answer";
echo "<input name='txtSecurityA' type='text' required>";

echo "<br /> <input type='submit' value='Submit'>";

echo"</form>";
?>
