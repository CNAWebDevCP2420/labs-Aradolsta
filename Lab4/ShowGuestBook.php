<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
$DBConnect = @mysqli_connect("localhost", "root", "");
if ($DBConnect === FALSE)
{
    echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . 
    ": " . mysqli_error() . "</p>";
}
else
{
    $DBName = "guestbook";
    if (!@mysqli_select_db($DBConnect, $DBName))
    {
        echo "<p>There are no entries in the guest book!</p>";
    }
    else
    {
        $TableName = "visitors";
        $SQLstring = "SELECT * FROM $TableName";
        $QueryResult = @mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0)
        {
            echo "<p>There are no entries in the guest book!</p>";
        }
        else
        {
            echo "<p>The following visitors have signed our guest book:</p>";
            echo "<table width='100%' border='1'>";
            echo "<tr><th>First Name</th><th>Last Name</th></tr>";
            while (($Row = mysqli_fetch_assoc($QueryResult)) !== FALSE)
            {
                echo "<tr><td>{$Row['first_name']}</td>";
                echo "<td>{$Row['last_name']}</td></tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);
}
?>
</body>
</html>