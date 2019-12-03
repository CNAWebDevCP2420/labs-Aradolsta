<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Conference</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Submitting Information</h1>
<p>You entered the following information:</p>
<?php
$errors = 0;
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
		$TableName = "seminar_info";
		mysqli_select_db($DBConnect, $DBName);
		$SQLstring = "SHOW TABLES LIKE '$TableName'"; 
		$QueryResult= @mysqli_query($DBConnect, $SQLstring); 
        if (mysqli_num_rows($QueryResult) == 0)
        { 
			$SQLString2 = "CREATE TABLE $TableName (seminarID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, javascript VARCHAR(3), php VARCHAR(3), 
                           mysql VARCHAR(3), apache VARCHAR(3), webservices VARCHAR(3))";
			$QueryResult2= @mysqli_query($DBConnect, $SQLString2);
            if ($QueryResult2 === FALSE)
            {
				echo "<p>Unable to create the table. " . "Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
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
	
    if ($_GET['javascript'] == "yes")
    {
 		$javascript = "yes";
    }
    else
    {
 		$javascript = "no";
    }
    
    if ($_GET['php'] == "yes")
    {
 		$php = "yes";
    }
    else
    {
 		$php = "no";
    }
    
    if ($_GET['mysql'] == "yes")
    {
 		$mysql = "yes";
    }
    else
    {
 		$mysql = "no";
    }
    
    if ($_GET['apache'] == "yes")
    {
 		$apache = "yes";
    }
    else
    {
 		$apache = "no";
    }
    
    if ($_GET['webservices'] == "yes")
    {
 		$webservices = "yes";
    }
    else
    {
 		$webservices = "no";
	}
	$SQLstring = "INSERT INTO $TableName " . " (javascript, php, mysql, apache, webservices) " . " VALUES( '$javascript', '$php', '$mysql', '$apache', '$webservices')";
	$QueryResult = @mysqli_query($DBConnect, $SQLstring);
    if ($QueryResult === FALSE)
    {
		echo "<p>Unable to save your registration " . " information. Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
		++$errors;
	}
    else
    {
		$InternID = mysqli_insert_id($DBConnect);
	}
	mysqli_close($DBConnect);
}
$DBName = "conference_registrations";
$conn = new mysqli(localhost, root, $DBName);
$personalQuery = "SELECT * FROM personal_info ORDER BY employeeID DESC LIMIT 1";
$personalResult = $conn->query($personalQuery);
$companyQuery = "SELECT * FROM company_info ORDER BY companyID DESC LIMIT 1";
$companyResult = $conn->query($companyQuery);
$seminarQuery = "SELECT * FROM seminar_info ORDER BY seminarID DESC LIMIT 1";
$seminarResult = $conn->query($seminarQuery);
if ($personalResult->num_rows > 0)
{
    while($row = $personalResult->fetch_assoc())
    {
	    $empfirst = $row["first"];
	    $emplast = $row["last"];
	    $empaddress = $row["address"];
	    $empcity = $row["city"];
	    $empstate = $row["state"];
	    $empzip = $row["zip"];
	    $empphone = $row["phone"];
	    $empemail = $row["email"];
    }
}
if ($companyResult->num_rows > 0)
{
    while($row = $companyResult->fetch_assoc())
    {
	    $company = $row["company"];
	    $companyaddress = $row["address"];
	    $companycity = $row["city"];
	    $companystate = $row["state"];
	    $companyzip = $row["zip"];
	    $companyphone = $row["phone"];
    }
}
if ($seminarResult->num_rows > 0)
{
    while($row = $seminarResult->fetch_assoc())
    {
	    $javascript = $row["javascript"];
	    $php = $row["php"];
	    $mysql = $row["mysql"];
	    $apache = $row["apache"];
	    $webservices = $row["webservices"];
    }
}
echo '<table style="width:100%" border="1"><tr><td valign="top"><h1>Personal Information</h1>
	First name: ' . $empfirst . '</br>
	Last name: ' . $emplast . ' </br>
	Address: ' . $empaddress . '</br>
	City: ' . $empcity . ' </br>
	State: ' . $empstate . '</br>
	Zip: ' . $empzip . '</br>
	Phone: ' . $empphone . '</br>
	E-mail: ' . $empemail . '</br></br>
    </td><td valign="top"><h1>Company Information</h1>
	Company: ' . $company . '</br>
	Address: ' . $companyaddress . '</br>
	City: ' . $companycity . ' </br>
	State: ' . $companystate . '</br>
	Zip: ' . $companyzip . '</br>
	Phone: ' . $companyphone . '</br>
    </td><td valign="top"><h1>Seminars</h1>
	JavaScript seminar: ' . $javascript . '</br>
	PHP seminar: ' . $php . '</br>
	MySQL seminar: ' . $mysql . ' </br>
	Apache seminar: ' . $apache . '</br>
	Web services seminar: ' . $webservices . '</br>
    </td></tr></table>
    <p><form method="post" action="Confirmation.php">
    <input type="submit" name="register_company" value="Register" /></br></br>
    <input type="button" onclick="history.back();" value="Back">
    </form></br>
    <form method="post" action="ContactInfo.php">
    <input type="submit" name="Start Over" value="Start Over" />
    </form> </p></br>';
$conn->close();
?>
</body>
</html>