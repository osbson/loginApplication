<?php

session_start();
if($_SESSION['username'] == ""){
	header("Location:loginForm.php");
	exit;
}

echo "Your request has been submitted";
echo "<br>";
echo "<a href='home.php'>OK</a>";

?>
