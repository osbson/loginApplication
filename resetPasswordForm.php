<?php

session_start();
if($_SESSION['forgotUsername'] == ""){
        header("Location:loginForm.php");
        exit;
}
$currentUser = $_SESSION['forgotUsername'];

echo "Reset password";

echo "<form action='resetPasswordFormCheck.php' method='POST'>";

echo "<br/> Type in new password for $currentUser";
echo "<input name='txtPassword1' type='password' required/>";
echo "<br/> A strong password has at least 8 characters, mixture of uppercase and lowercase letters, mixture of letters and numbers, and at least one special character, eg '@?!#'.";
echo "<br/> Type your password again";
echo "<input name='txtPassword2' type='password' required/>";
echo "<br /> <input type='submit' value='Submit'>";

echo "</form>";
?>
