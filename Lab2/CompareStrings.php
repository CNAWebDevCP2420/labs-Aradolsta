<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Compare Strings</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Compare Strings</h1><hr />
<?php
//Declaring two string variables
$firstString = "Geek2Geek";
$secondString = "Geezer2Geek";
//if statements to determine if strings are alike
if ( !empty($firstString) && !empty($secondString))
{
    if ($firstString == $secondString)
    {
        echo "<p>Both strings are the same.</p>";
    }
    else
    {
        echo "<p>Both strings have " . similar_text($firstString, $secondString) .
              " character(s) in common.</p>";
        echo "<p>You must change " . levenshtein($firstString, $secondString) .
              " character(s) to make the strings the same.</p>";
    }
}
//Executes if either variable contain an empty value
else
{
    echo "<p>Either the \$firstString variable or the \$secondString variable does not
     contain a value so the two strings cannot be compared.</p>";
}
?>
</body>
</html>