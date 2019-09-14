<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Interest Array</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
     //Interest Rates
     $InterestRate1 = .0725;
     $InterestRate2 = .0750;
     $InterestRate3 = .0775;
     $InterestRate4 = .0800;
     $InterestRate5 = .0825;
     $InterestRate6 = .0850;
     $InterestRate7 = .0875;

     //Interest Rate Array
     $RatesArray = array(.0725, .0750, .0775, .0800, .0825, .0850, .0875);

     //Statements Displaying Rates
     echo "<p>Interest Rates are listed lowest to highest:</br> 
                $RatesArray[0]</br>
                $RatesArray[1]</br>
                $RatesArray[2]</br>
                $RatesArray[3]</br>
                $RatesArray[4]</br>
                $RatesArray[5]</br>
                $RatesArray[6]</p>";
?>
</body>
</html>