<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Temp Conversion</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php

for ($Fahrenheit = 0; $Fahrenheit <= 100; $Fahrenheit++)
{
    $Celsius = round(($Fahrenheit - 32) * (5/9), 1);
    echo "<p>$Fahrenheit &#176F is $Celsius &#176C</p>";
}
?>
</body>
</html>