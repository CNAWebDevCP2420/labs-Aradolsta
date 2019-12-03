<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Conference</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Conference</h1>
<h2>Company Information</h2>
<?php
$errors = 0;
$email = "";
if (empty($_POST['email']))
{
	++$errors;
	echo "<p>You need to enter an e-mail address.</p>\n";
}
else
{
    $email = stripslashes($_POST['email']);
    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-] + (\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email) == 1)
    {
        ++$errors;
        echo "<p>You need to enter a valid e-mail address.</p>\n";
        $email = "";
    }
}
if (empty($_POST['phone']))
{
	++$errors;
	echo "<p>You need to enter a phone number.</p>\n";
	$phone = "";
}
else
{
    $phone = stripslashes($_POST['phone']);
}
if (empty($_POST['first']))
{
	++$errors;
	echo "<p>You need to enter a first name.</p>\n";
	$first = " ";
}
else
{
	$first = stripslashes($_POST['first']);
}
if (empty($_POST['last']))
{
	++$errors;
	echo "<p>You need to enter a last name.</p>\n";
	$last = " ";
}
else
{
	$last = stripslashes($_POST['last']);
}
if (empty($_POST['address']))
{
	++$errors;
	echo "<p>You need to enter an address.</p>\n";
	$address = " ";
}
else
{
	$address = stripslashes($_POST['address']);
}
if (empty($_POST['city']))
{
	++$errors;
	echo "<p>You need to enter a city.</p>\n";
	$city = " ";
}
else
{
	$city = stripslashes($_POST['city']);
}
if (empty($_POST['state']))
{
	++$errors;
	echo "<p>You need to enter a state.</p>\n";
	$state = " ";
}
else
{
	$state = stripslashes($_POST['state']);
}
if (empty($_POST['zip']))
{
	++$errors;
	echo "<p>You need to enter a zip.</p>\n";
	$zip = " ";
}
else
{
	$zip = stripslashes($_POST['zip']);
}
$TableName = "personal_info";
$DBConnect = FALSE;
if ($errors == 0)
{
	$DBConnect = @mysqli_connect("localhost", "root","");
    if ($DBConnect === FALSE)
    {
		echo "<p>Unable to connect to the database server. " . "Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>\n";
	}
    else
    {
		$DBName = "conference_registrations"; 
        if (!@mysqli_select_db($DBConnect, $DBName))
        {
			$SQLstring = "CREATE DATABASE $DBName"; 
			$QueryResult = @mysqli_query($DBConnect, $SQLstring); 
            if ($QueryResult === FALSE)
            {
				echo "<p>Unable to create the database.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>"; 
            }
            else
            { 
				mysqli_select_db($DBConnect, $DBName);
				$SQLString2 = "CREATE TABLE $TableName (employeeID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, first VARCHAR(40), 
				               last VARCHAR(40), address VARCHAR(40), city VARCHAR(40), state VARCHAR(30), zip VARCHAR(10), phone VARCHAR(10), email VARCHAR(40))";
				$QueryResult2= @mysqli_query($DBConnect, $SQLString2);
                if ($QueryResult2 === FALSE)
                {
					echo "<p>Unable to create the table. " . "Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
				}
			} 
		}
	}
} 
if ($errors > 0)
{
	echo "<p>Please use your browser's BACK button to return" . " to the form and fix the errors indicated.</p>\n";
}
if ($errors == 0)
{
 	$first = stripslashes($_POST['first']);
	$last = stripslashes($_POST['last']);
	$address = stripslashes($_POST['address']);
	$city = stripslashes($_POST['city']);
	$state = stripslashes($_POST['state']);
	$zip = stripslashes($_POST['zip']);
	$phone = stripslashes($_POST['phone']);
	$email = stripslashes($_POST['email']);
	$SQLstring = "INSERT INTO $TableName " . " (first, last, address, city, state, zip, phone, email) " . " VALUES( '$first', '$last', '$address', '$city', '$state', '$zip', '$phone', '$email')";
	$QueryResult = @mysqli_query($DBConnect, $SQLstring);
	if ($QueryResult === FALSE) {
	echo "<p>Unable to save your registration " . " information. Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
	++$errors;
	}
    else
    {
		$InternID = mysqli_insert_id($DBConnect);
	}
	mysqli_close($DBConnect);
}
if ($errors == 0)
{
echo '<hr />
    <form method="post" action="SelectSeminar.php">
    <p>Company Name: 
    <input type="text" name="company" /></p>
    <p>Address: 
    <input type="text" name="address" />
    City:
    <input type="text" name="city" /></p>
    <p>State: 
    <input type="text" name="state" />
    Zip: 
    <input type="text" name="zip" /></p>
    <p>Phone Number:  
    <input type="text" name="phone" /></p>
    <input type="submit" name="register_company" value="Next" /></br></br>
    <input type="button" onclick="history.back();" value="Back"></br></br>
    <input type="reset" name="reset" value="Start Over" /></br></br>
    </form>
    <hr />';
}
?>
</body>
</html>