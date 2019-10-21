<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Store Online Form</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<?php
		$Dir = "OnlineOrders";
        if(is_dir($Dir))
        {
			$DirEntries = scandir($Dir, 1);
		}
        else
        {
			mkdir($Dir);
		}
        if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description']))
        {
			echo "<p>You must enter all the information correctly. Click your browser's Back button to return to the Online Order Form.</p>\n";
		}
        else
        {
			$Name = stripslashes($_POST['name']);
			$Price = stripslashes($_POST['price']);
			$Description = stripslashes($_POST['description']);
            function displayError($Price, $errorMsg)
            {
				global $errorCount;
				echo "Error for \"$Price\": $errorMsg<br />\n";
				++$errorCount;
			}			
				$OrderFile = fopen("OnlineOrders/onlineorders.txt", "ab");
                if(preg_match("/^[0-9]+$/i", $Price) == 1)
                {
                    if(is_numeric($Price))
                    {
						$Price = number_format($Price, 2);
					}
					else
					{
						echo "You must enter a number in the Price slot.";
					}
                    if(is_writeable("OnlineOrders/onlineorders.txt"))
                    {
                        if(fwrite($OrderFile, "Sale Name: " . $Name . "\nPrice: $" . $Price . "\nDescription: " . $Description . "<br />\n"))
                        {
							echo "<p>Thank you for your sale!</p>\n";
						}
                        else
                        {
                            echo "<p>Cannot add your sale to the order. Click your browser's Back button to return to the Online Order Form.</p>\n";
                        }
					}
                    else
                    {
                        echo "<p>Cannot write to the file.</p>\n";
                    }
					fclose($OrderFile);
				}
                else
                {
					echo "Please enter a number in the Price slot. Click your browser's Back button to return to the Online Order Form.</p>\n";
				}
		}
	?>
</body>
</html>