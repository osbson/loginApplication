<?php

session_destroy();
session_start();

$_SESSION['forgotUsername'] = "";

echo "<form action='passwordUsernameFormCheck.php' method='POST'>";
echo "Username";
echo "<input name='txtUsername' type='text' required/>";
echo "<br /> <input type='submit' value='Submit'>";
echo "</form>";
?>
