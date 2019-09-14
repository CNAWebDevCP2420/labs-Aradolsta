<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Is the Number Even?</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
//Creating Variables of Different Data Types
$AnUnevenInteger = 37;
$AString = "Twenty-Two";
$AnEvenInteger = 44;
$ANumericString = "10";
//Creating a Result Variable
$Result = 0;
//Determining if Variables are Numeric
is_numeric($AnUnevenInteger) ? $Result = $AnUnevenInteger % 2 : $Result = "$AnUnevenInteger is not numeric";
echo "<p>The result is: $Result</p>";
if ($Result === 0)
{
    echo "<p>$AnUnevenInteger is an even number!</p>";
} else if ($Result === 1)
{
    echo "<p>$AnUnevenInteger is an uneven number!</p>";
}

is_numeric($AString) ? $Result = $AString % 2 : $Result = "$AString is not numeric";
echo "<p>The result is: $Result</p>";
if ($Result === 0)
{
    echo "<p>$AString is an even number!</p>";
} else if ($Result === 1)
{
    echo "<p>$AString is an uneven number!</p>";
}

is_numeric($AnEvenInteger) ? $Result = $AnEvenInteger % 2 : $Result = "$AnEvenInteger is not numeric";
echo "<p>The result is: $Result</p>";
if ($Result === 0)
{
    echo "<p>$AnEvenInteger is an even number!</p>";
} elseif ($Result === 1)
{
    echo "<p>$AnEvenInteger is an uneven number!</p>";
}

is_numeric($ANumericString) ? $Result = $ANumericString % 2 : $Result = "$ANumericString is not numeric";
echo "<p>The result is: $Result</p>";
if ($Result === 0)
{
    echo "<p>$ANumericString is an even number!</p>";
} else if ($Result === 1)
{
    echo "<p>$ANumericString is an uneven number!</p>";
}
?>
</body>
</html>