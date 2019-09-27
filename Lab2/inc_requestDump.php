<?php
echo "<table>";
foreach($_REQUEST as $Name => $Value)
{
    echo "<tr>\n<td>" . stripslashes(htmlentities($Name)) . "</td>\n<td>" . stripslashes(htmlentities($Value)) . "</td>\n</tr>\n";
}
echo "</table>";
?>