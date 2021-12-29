<?php
session_start();
session_destroy();
session_start();

$_SESSION['username'] = "";

echo "<form action='loginFormCheck.php' method='POST'>";
echo "Username";
echo "<input name='txtUsername' type='text' required/>";
echo "<br /> Password";
echo "<input name='txtPassword' type='password' required/>";
echo "<br /> <input type='submit' value='Login'>";
echo "<br /><br />Forgotten Password? Click <a href='passwordUsernameForm.php'>HERE</a>";
echo "<br /><br />Not Registered Yet? Click <a href='registerForm.php'>HERE</a>";
echo "</form>";
?>

