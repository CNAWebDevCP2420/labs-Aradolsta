<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Edit a Bug Report</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <h1>Edit the selected bug report here</h1>
    <?php
    $bugID = $_POST["reportedBugsList"];
    $bugReport = fopen("BugReports/" . $bugID, 'a+');

    $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $bugID);
    $productName = fgets($bugReport);
    $productVersion = fgets($bugReport);
    $productHardware = fgets($bugReport);
    $operatingSystem = fgets($bugReport);
    $frequencyOfOccurence = fgets($bugReport);
    $proposedSolutions = fgets($bugReport);

    echo "<form method='POST' action='BugReports.php'>
        <p>Report ID <input type='text' name='number' . $name . readonly /></p>
        <p>Product Name <input type='text' name='product_name' . $productName . /></p>
        <p>Product Version <input type='text' name'product_version' . $productVersion . /></p>
        <p>Hardware Type <input type='text' name='hardware_type' . $productHardware . /></p>
        <p>Operating System (OS) <input type='text' name='operating_system' . $operatingSystem . /></p>
        <p>Frequency of Occurence <input type='text' name='frequency_of_occurence' . $frequencyOfOccurence . /></p>
        <p>Proposed Solutions <input type='text' name='proposed_solutions' . $proposedSolutions . /></p>
        <p><input type='submit' value='Submit' /></p>
    </form>"

    $bugReport = fclose("BugReports/" . $bugID, 'a+');
    ?>
</body>
</html>