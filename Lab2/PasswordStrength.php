<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Password Strength</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Password Strength</h1><hr />
<?php
//Declaring array containing passwords, six that fail
$Passwords = array(
    "as12$$%alj", //should fail, needs an uppercase letter
    "12Password!34!", //should pass
    "Hi1&", //should fail, length
    "1234!theQuickBrownFoxJumpedOverTheLazyDog", //should fail, length
    "up@Case4Pass!", //should pass
    "NoNumbers##", //should fail, needs a number
    "ChineseZodiac#0", //should pass
    "NoSpecialChar1273", //should fail, needs a special char
    "APASSWORD12!", //should fail, needs a lowercase letter
    "%Short%pass37" //should pass
);
//Checking regular expression and length
for ($i = 0; $i < count($Passwords); $i++)
{
    $uppercase = preg_match('@[A-Z]@', $Passwords[$i]);
    $lowercase = preg_match('@[a-z]@', $Passwords[$i]);
    $number = preg_match('@[0-9]@', $Passwords[$i]);
    $specialChars = preg_match('@[^\w]@', $Passwords[$i]);
    if (!$uppercase)
    {
        echo "<p>\"$Passwords[$i]\" needs to contain at least one uppercase letter</p>";
    }
    else if (!$lowercase)
    {
        echo "<p>\"$Passwords[$i]\" needs to contain at least one lowercase letter</p>";
    }
    else if (!$number)
    {
        echo "<p>\"$Passwords[$i]\" needs to contain at least one number</p>";
    }
    else if (!$specialChars)
    {
        echo "<p>\"$Passwords[$i]\" needs to contain at least one special character</p>";
    }
    else if ((strlen($Passwords[$i]) < 8 || strlen($Passwords[$i]) > 16))
    {
        echo "<p>\"$Passwords[$i]\" must be between 8 and 16 characters long</p>";
    }
    else
    {
        echo "<p>\"$Passwords[$i]\" is a strong password!</p>";
    }
}
?>
</body>
</html>