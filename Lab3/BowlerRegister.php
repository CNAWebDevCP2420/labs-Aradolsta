<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Bowler Registered</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
     <?php
     if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['age']) || empty($_POST['average']))
     {
          echo "<p>You must enter your first and last name, age and average. Click your browser's Back button to return to the Bowler Register.</p>\n";
     }
     else {
		$FirstName = addslashes($_POST['first_name']);
          $LastName = addslashes($_POST['last_name']);
          $Age = addslashes($_POST['age']);
          $Average = addslashes($_POST['average']);
          $NewBowler = $FirstName . ", " . $LastName . ", " . $Age . ", " . $Average . "%\n";
          $BowlerInfo = "bowlerinfo.txt";
          
          if (file_put_contents($BowlerInfo, $NewBowler, FILE_APPEND) > 0)
          {
               echo "<p>$FirstName $LastName has been registered for the bowling tournament!</p>";
          }
     }
    ?>
</body>
</html>