<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Single Family Home</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
//Assigning Home Price
$SingleFamilyHome = 399500;
//Assigning Formatted Price
$SingleFamilyHome_Display = number_format($SingleFamilyHome, 2);
//Displaying Formatted Price
echo "<p>The current median price of a single family home in Pleasanton, CA is $$SingleFamilyHome_Display.</p>";
?>
</body>
</html>