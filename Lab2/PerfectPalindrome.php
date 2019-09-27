<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Perfect Palindrome</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Perfect Palindrome</h1><hr />
<?php
//Declaring variables for the  palindromes
$firstPalindrome = "racecar";
$secondPalindrome = "dad";
$thirdPalindrome = "game";
$fourthPalindrome = "mom";
$fifthPalindrome = "palindrome";
//Checking if first string is a perfect palindrome
if ((strrev($firstPalindrome)) == $firstPalindrome)
{
     echo "<p>\"$firstPalindrome\" is a perfect palindrome!</p>";
}
else
{
     echo "<p>\"$firstPalindrome\" is not a perfect palindrome</p>";
}
//Checking if second string is a perfect palindrome
if ((strrev($secondPalindrome)) == $secondPalindrome)
{
     echo "<p>\"$secondPalindrome\" is a perfect palindrome!</p>";
}
else
{
     echo "<p>\"$secondPalindrome\" is not a perfect palindrome</p>";
}
//Checking if third string is a perfect palindrome
if ((strrev($thirdPalindrome)) == $thirdPalindrome)
{
     echo "<p>\"$thirdPalindrome\" is a perfect palindrome!</p>";
}
else
{
     echo "<p>\"$thirdPalindrome\" is not a perfect palindrome</p>";
}
//Checking if fourth string is a perfect palindrome
if ((strrev($fourthPalindrome)) == $fourthPalindrome)
{
     echo "<p>\"$fourthPalindrome\" is a perfect palindrome!</p>";
}
else
{
     echo "<p>\"$fourthPalindrome\" is not a perfect palindrome</p>";
}
//Checking if fifth string is a perfect palindrome
if ((strrev($fifthPalindrome)) == $fifthPalindrome)
{
     echo "<p>\"$fifthPalindrome\" is a perfect palindrome!</p>";
}
else
{
     echo "<p>\"$fifthPalindrome\" is not a perfect palindrome</p>";
}
?>
</body>
</html>