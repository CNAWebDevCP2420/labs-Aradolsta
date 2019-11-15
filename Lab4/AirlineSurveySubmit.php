<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php	
if ((empty($_POST['flightDate'])) || (empty($_POST['flightTime'])) || (empty($_POST['flightNumber'])) || (empty($_POST['airlineName'])) || (empty($_POST['friendliness'])) || (empty($_POST['luggage_space'])) || (empty($_POST['comfort'])) || (empty($_POST['clean'])) || (empty($_POST['noise_level'])))
{
    if (isset($_POST['submit']))
    {
		echo "All fields in Airline Survey are required.<br />Click your browser's Back button to return and complete your survey.";
	}
}
else
{
	$DBConnect = @mysqli_connect("localhost", "root", "");
    if ($DBConnect === FALSE)
    {
		echo "<p>Unable to connect to the database server.</p><p>Error code ". mysqli_errno() .": ".  mysqli_error() ."</p>";
    }
    else
    {
		$DBName = "airlineSurveys";
        if (!@mysqli_select_db($DBConnect, $DBName))
        {
		    $SQLstring = "CREATE DATABASE $DBName";
			$QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
            {
				echo "<p>Unable to execute the query.</p><p>Error code ". mysqli_errno() .": ". mysqli_error() ."</p>";
            }
            else
            {
				echo "<p>You've just created the first Airline Survey!</p>";
			}
		}
		mysqli_select_db($DBConnect, $DBName);
		$TableName = "results";
		$SQLstring = "SHOW TABLES LIKE '$TableName'";
		$QueryResult = @mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0)
        {
			$SQLstring = "CREATE TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
						  flightTime DATETIME, flightNum VARCHAR(20), airlineCo VARCHAR(30), 
                          friendly VARCHAR(20), enoughSpace VARCHAR(20), enoughComfort VARCHAR(20),
						  enoughClean VARCHAR(20), enoughQuiet VARCHAR(20))";
			$QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
            {
				echo "<p>Unable to create the table.</p><p>Error code ". mysqli_errno() .": ". mysqli_error() ."</p>";
			}
		}
		$FlightNum = stripslashes($_POST['flightNumber']);
		$AirlineName = stripslashes($_POST['airline']);
		$Friendly = stripslashes($_POST['friendliness']);
		$Space = stripslashes($_POST['space']);
		$Comfort = stripslashes($_POST['comfort']);
		$Clean = stripslashes($_POST['clean']);
		$Noise = stripslashes($_POST['noise']);
				
		$SQLstring = "INSERT INTO $TableName VALUES(NULL, '$FlightDateTime', '$FlightNum', '$AirlineName', '$Friendly', '$Space', '$Comfort', '$Clean', '$Noise')";
		$QueryResult = @mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE)
        {
			echo "<p>Unable to execute the query.</p><p>Error code ". mysqli_errno() .": ". mysqli_error() ."</p>";
        }
        else
        {
			echo "<h3>New survey added successfully!</h3>";
		}
		mysqli_close($DBConnect);
	}
}
?>
</body>
</html>