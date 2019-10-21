<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Edit a Bug Report</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <h1>Bug Reporting</h1>
    <?php
    $bugID = addslashes($_POST["number"]);
    $productName = addslashes($_POST["product_name"]);
    $productVersion = addslashes($_POST["product_version"]);
    $productHardware = addslashes($_POST["hardware_type"]);
    $operatingSystem = addslashes($_POST["operating_system"]);
    $frequencyOfOccurence = addslashes($_POST["frequency_of_occurence"]);
    $proposedSolutions = addslashes($_POST["proposed_solutions"]);

    $bugReport = fopen("BugReports/" . $bugID, 'a+');
    ?>
</body>
</html>