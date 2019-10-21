<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Sign Guest Book</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <?php
        if(isset($_POST['submit']))
        {
            $GuestToAdd = stripslashes($_POST['guestname']);
            $EmailToAdd = stripslashes($_POST['email']);
            $ExistingGuest = array();
            if(file_exists("guestbook.txt") && filesize("guestbook.txt") > 0)
            {
                $ExistingGuest = file("guestbook.txt");
            }
            if(in_array($GuestToAdd,  $ExistingGuest))
            {
                echo "<p>The information you entered already exists!<br />\n";
                echo "Your information was not added to the list.<br />\n";
                echo "Your information was not saved.</p>";
                $GuestToAdd = "";
                $EmailToAdd = "";
            }
            else
            {
                $GuestFile = fopen("guestbook.txt", "ab");
                if($GuestFile === false)
                    echo "There was an error saving your information!\n";
                else
                {
                    fwrite($GuestFile, $GuestToAdd, $EmailToAdd);
                    fclose($GuestFile);
                    echo "Your name has been added to the list.\n";
                    $GuestToAdd = "";
                    $EmailToAdd = "";
                }
            }
        }
        if(empty($_POST['guestname']) || empty($_POST['email']))
        {
            echo "<p>You must enter the guest name and email correctly. Click your browser's Back button to return to the Guest Book.</p>\n";
        }
        else
        {
            $Name = stripslashes($_POST['guestname']);
            $Email = stripslashes($_POST['email']);

            echo "The email address &ldquo;" . $Email . "&rdquo; ";
            if(preg_match("/^(([A-Za-z]+\d+)|" . "([A-Za-z]+\.[A-Za-z]+))" . "@[_a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $Email) == 1)
            {
                echo " is a valid email address. <br />";
            }
            else
            {
                echo " is not a valid e-mail address. <br />";
            }
            
            $GuestFile = fopen("guestbook.txt", "ab");
            
            if(is_writeable("guestbook.txt"))
            {
                if(fwrite($GuestFile, $Name . ", " . $Email . "\n"))
                {
                    echo "<p>Thank you for signing our guest book!</p>\n";
                }
                else
                {
                    echo "<p>Cannot add your name to the guest book.</p>\n";
                }
            }
            else
            {
                echo "<p>Cannot write to the file.</p>\n";
            }
            fclose($GuestFile);
        }
        if(isset($_GET['action']))
        {
            if((file_exists("guestbook.txt")) && (filesize("guestbook.txt") != 0))
            {
                $GuestArray = file("guestbook.txt");
                switch($_GET['action'])
                {
                    case 'Remove Duplicates':
                        $GuestArray = array_unique($GuestArray);
                        $GuestArray = array_values($GuestArray);
                        break;
                    case 'Sort Ascending':
                        sort($GuestArray);
                        break;
                if(count($GuestArray)>0)
                {
                    $NewGuest = implode($GuestArray);
                    $GuestStore = fopen("guestbook.txt", "wb");
                    if($GuestStore === false)
                    {
                        echo "there was an error updating the guestbook file \n";
                    }
                    else
                    {
                        fwrite($GuestStore, $NewGuest);
                        fclose($GuestStore);
                    }
                }
                else
                {
                    unlink("guestbook.txt");
                }
            }
        }
	?>
</body>
</html>