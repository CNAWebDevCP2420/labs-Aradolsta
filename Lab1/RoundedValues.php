<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Rounding Values</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
//Assigning Values
$DivResult = 25 / 2;
$Round = round($DivResult);
$Ceil = ceil($DivResult);
$Floor = floor($DivResult);
//Displaying $DivResult Using round()
echo "<p>Rounding the fraction 25/2 with round() gives the result of: $Round</p>";
//Displaying $DivResult Using ceil()
echo "<p>Rounding the fraction 25/2 with ceil() gives the result of: $Ceil</p>";
//Displaying $DivResult Using floor()
echo "<p>Rounding the fraction 25/2 with floor() gives the result of: $Floor</p>";
?>
</body>
</html>