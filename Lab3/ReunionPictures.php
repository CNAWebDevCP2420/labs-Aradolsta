<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Reunion Pictures</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <h1>Reunion Pictures</h1>
    <?php
    $ImageLines = file("imagelist.txt");
    echo "<h2>Reunion Images</h2>\n";
    echo "<h4>" .count($ImageLines)  . " Images</h4>\n";
    echo "<hr />\n";
    foreach ($ImageLines as $ImageLine) {
         $fields = explode('|',$ImageLine,3);
         echo "<p>From " . $fields[0] . "<br />\n";
         echo "<img src='" . $fields[2] . "' alt='" . $fields[1] . "' ><br />\n";
         echo $fields[1] . "</p>\n";
         echo "<hr />\n";
    }
    ?>
</body>
</html>