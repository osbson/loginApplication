<?php

session_start();
if($_SESSION['username'] == ""){
	header("Location:loginForm.php");
	exit;
}
 
echo "Request Antique Evaluation";
echo "<form action='requestEvaluationFormCheck.php' method='POST' enctype='multipart/form-data'>";
//echo "<form action='requestEvaluationFormCheck.php' method = 'POST'>";

echo "<br /> Description";
echo "<input name='txtDescription' type='text'/>";

echo "<br /> Image";
echo "<input name = 'txtPhoto' type='file'/>";

echo "<br /> Preferred method of contact";
echo "<select name = 'txtContact'>";
echo "<option value = 'Phone'>Phone</option>";
echo "<option value = 'Email'>Email</option>";
echo "</select>";

echo "<br /> <input type='submit' value='Submit'>";
echo "</form>";
?>
