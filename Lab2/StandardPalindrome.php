<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Standard Palindrome</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Standard Palindrom</h1><hr />
<?php
//Declaring variables
$firstPalindrome = "Mr. Owl ate my metal worm";
$secondPalindrome = "Madam, I'm Adam";
$thirdPalindrome = "Yesterday's supper was great";
$fourthPalindrome = "Was it a car or a cat I saw?";
//Checking if the first string is a standard palindrome
$rpFirstPalindrome = strtolower(preg_replace("([^A-Za-z0-9])", "", $firstPalindrome));
$revFirstPalindrome = strtolower(strrev($rpFirstPalindrome));
if ($rpFirstPalindrome == $revFirstPalindrome)
{
     echo "<p>\"$firstPalindrome\" is a standard palindrome! Without formatting it is: $revFirstPalindrome</p>";
}
else
{
     echo "<p>\"$firstPalindrome\" is not a standard palindrome</p>";
}
//Checking if the second string is a standard palindrome
$rpSecondPalindrome = strtolower(preg_replace("([^A-Za-z0-9])", "", $secondPalindrome));
$revSecondPalindrome = strtolower(strrev($rpSecondPalindrome));
if ($rpSecondPalindrome == $revSecondPalindrome)
{
     echo "<p>\"$secondPalindrome\" is a standard palindrome! Without formatting it is: $revSecondPalindrome</p>";
}
else
{
     echo "<p>\"$secondPalindrome\" is not a standard palindrome</p>";
}
//Checking if the third string is a standard palindrome
$rpThirdPalindrome = strtolower(preg_replace("([^A-Za-z0-9])", "", $thirdPalindrome));
$revThirdPalindrome = strtolower(strrev($rpThirdPalindrome));
if ($rpThirdPalindrome == $revThirdPalindrome)
{
     echo "<p>\"$thirdPalindrome\" is a standard palindrome! Without formatting it is: $revThirdPalindrome</p>";
}
else
{
     echo "<p>\"$thirdPalindrome\" is not a standard palindrome</p>";
}
//Checking if the fourth string is a standard palindrome
$rpFourthPalindrome = strtolower(preg_replace("([^A-Za-z0-9])", "", $fourthPalindrome));
$revFourthPalindrome = strtolower(strrev($rpFourthPalindrome));
if ($rpFourthPalindrome == $revFourthPalindrome)
{
     echo "<p>\"$fourthPalindrome\" is a standard palindrome! Without formatting it is: $revFourthPalindrome</p>";
}
else
{
     echo "<p>\"$fourthPalindrome\" is not a standard palindrome</p>";
}
?>
</body>
</html>