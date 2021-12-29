<?php
echo "<form action='registerFormCheck.php' method='POST'>";
echo "<h1> Please register your details below: </h1>";
//echo "<pre>";

echo "Type in your forename";
echo "<input name='txtForename' type='text' required/>";

echo "<br/>Type in your surname";
echo "<input name='txtSurname' type='text' required/>";

echo "<br /> Type in your username";
echo "<input name='txtUsername' type='text' required/>";

echo "<br/> Type in your email address";
echo "<input name='txtEmail1' type='text' required/>";
echo "<br/> Type your email address again";
echo "<input name='txtEmail2' type='text' required/>";

echo "<br/ > Type in your phone number";
echo "<input name='txtPhone' type='text' required/>";

echo "<br/> Type in your password";
echo "<input name='txtPassword1' type='password' required/>";
echo "<br/> A strong password has at least 8 characters, mixture of uppercase and lowercase letters, 
	mixture of letters and numbers, and at least one special character, eg '@?!#'.";
echo "<br/> Type your password again";
echo "<input name='txtPassword2' type='password' required/>";
//echo "</pre>";

echo "<br /> Choose security question";
echo "<select name = 'txtSecurityQ'>";
echo "<option value = 'What was your first school?'>What was your first school?</option>";
echo "<option value = 'What is your mother's maiden name?'>What is your mother's maiden name?</option>";
echo "<option value = 'What is your favourite food?'>What is your favourite food?</option>";
echo "</select>";
echo "<br/> Type your security answer";
echo "<input name='txtSecurityA' type='text' required/>";

echo "<br/> <input type='submit' value='Register'>";
echo "</form>";
?>
