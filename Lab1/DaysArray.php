<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Days of the Week</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
//Creating Days of Week Array
$Days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
//Displaying $Days[] Array in English
echo "<p>The days of the week in English are: </p>";
echo "$Days[0]</br>";
echo "$Days[1]</br>";
echo "$Days[2]</br>";
echo "$Days[3]</br>";
echo "$Days[4]</br>";
echo "$Days[5]</br>";
echo "$Days[6]</br>";
//Reassigning Days to French
$Days[0] = "Lundi";
$Days[1] = "Mardi";
$Days[2] = "Mercredi";
$Days[3] = "Jeudi";
$Days[4] = "Vendredi";
$Days[5] = "Samedi";
$Days[6] = "Dimanche";
//Displaying $Days[] Array in French
echo "<p>The days of the week in French are: </p>";
echo "$Days[0]</br>";
echo "$Days[1]</br>";
echo "$Days[2]</br>";
echo "$Days[3]</br>";
echo "$Days[4]</br>";
echo "$Days[5]</br>";
echo "$Days[6]</br>";
?>
</body>
</html>