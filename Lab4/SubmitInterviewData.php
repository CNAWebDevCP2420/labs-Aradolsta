<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
if( empty($_POST['interviewers_name']) || empty($_POST['position']) || empty($_POST['date_of_interview']) || empty($_POST['candidates_name']) || empty($_POST['communication_abilities']) || empty($_POST['professional_appearance']) || empty($_POST['computer_skills']) || empty($_POST['business_knowledge']) || empty($_POST['interviewers_comments']))
{
    echo "<p>You must fill in all fields of the Interview Entry page. Press Back to return to the page and complete the entry.</p>";
}
else
{
    $DBConnect = @mysqli_connect("localhost", "root", "");
    if ($DBConnect === FALSE)
    {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    }
    else
    {
        $DBName = "interviews";
        if (!@mysqli_select_db($DBConnect, $DBName))
        {
            $SQLstring = "CREATE DATABASE $DBName";
            $QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
            {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
            }
            else
            {
                echo "<p>You are the first interviewer!</p>";
            }
            mysqli_select_db($DBConnect, $DBName);
        }
    }

    mysqli_select_db($DBConnect, $DBName);
            $TableName = "applicant";
            $SQLstring = "SHOW TABLES LIKE '$TableName'";
            $QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if (mysqli_num_rows($QueryResult) == 0)
            {
                $SQLstring = "CREATE TABLE $TableName 
                    (Interviewer_Name VARCHAR(50) NOT NULL, 
                    Position VARCHAR(100) NOT NULL, 
                    Date_of_Interview DATE NOT NULL, 
                    Candidate's_Name VARCHAR(50) NOT NULL, 
                    Communication_Abilities LONGTEXT NOT NULL, 
                    Professional_Appearance LONGTEXT NOT NULL, 
                    Computer_Skills LONGTEXT NOT NULL, 
                    Business_Knowledge LONGTEXT NOT NULL, 
                    Interviewer_Comments LONGTEXT NOT NULL)";
                $QueryResult = @mysqli_query($DBConnect, $SQLstring);
                if ($QueryResult === FALSE)
                {
                    echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) 
                    . ": " . mysqli_error($DBConnect) . "</p>";
                }
            }
            $interviewer = stripslashes($_POST['interviewers_name']);
            $position = stripslashes($_POST['position']);
            $dateOfInterview = stripslashes($_POST['date_of_interview']);
            $candidate = stripslashes($_POST['candidates_name']);
            $communication = stripslashes($_POST['communication_abilities']);
            $professional = stripslashes($_POST['professional_appearance']);
            $computer = stripslashes($_POST['computer_skills']);
            $business = stripslashes($_POST['business_knowledge']);
            $comments = stripslashes($_POST['interviewers_comments']);
            $SQLstring = "INSERT INTO $TableName VALUES(NULL, '$interviewer', '$position', '$dateOfInterview', '$candidate', '$communication', '$professional', '$computer', '$business', $comments')";
            $QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
            {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) 
                . ": " . mysqli_error($DBConnect) . "</p>";
            }
            else
            {
                echo "<h1>Thank you for your interview!</h1>";
            }
            mysqli_close($DBConnect);
}
?>
</body>
</html>