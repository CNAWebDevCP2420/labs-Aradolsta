<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
$DBConnect = @mysqli_connect("localhost", "root", "");
if($DBConnect === false)
{
     echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
}
else
{
     $DBName = "interviews";
     if (!@mysqli_select_db($DBConnect, $DBName))
     {
         echo "<p>There are no entries in the guest book!</p>";
     }
     else
     {
         $TableName = "applicant";
         $SQLstring = "SELECT * FROM $TableName";
         $QueryResult = @mysql_query($DBConnect, $SQLstring);
         if(mysql_num_rows($QueryResult) == 0)
         {
             echo "<p>There are no previous interviews!</p>";
         }
         else
         {    
               echo "<p>The following interviews have taken place:</p>";
               echo "<div class='col-xs-12'><table class='table table-striped'>";
               echo "<thead><tr><th>Interviewer's Name</th>";
               echo "<th>Position</th><th>Date</th>";
               echo "<th>Candidate's Name</th><th>Communication Abilities</th>";
               echo "<th>Professional Appearance</th><th>Computer Skills</th>";
               echo "<th>Business Knowledge</th><th>Interviewer's Comments</th></tr></thead>";
               echo "<tbody>";
          while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
          {
                 echo "<tr><td>{$Row['interviewers_name']}</td>";
                 echo "<td>{$Row['position']}</td>";
                 echo "<td>{$Row['date_of_interview']}</td>";
                 echo "<td>{$Row['candidates_name']}</td>";
                 echo "<td>{$Row['communication_abilities']}</td>";
                 echo "<td>{$Row['professional_appearance']}</td>";
                 echo "<td>{$Row['computer_skills']}</td>";
                 echo "<td>{$Row['business_knowledge']}</td>";
                 echo "<td>{$Row['interviewers_comments']}</td></tr>";
          }
          echo "</tbody></table>";
          mysql_free_result($QueryResult);
          }
          mysql_close($DBConnect);
     }
}
?>
</body>
</html>