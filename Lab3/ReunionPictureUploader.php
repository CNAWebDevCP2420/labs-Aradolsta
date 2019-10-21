<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Picture Uploader</title>
     <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <?php
    $Dir = ".";
    if (isset($_POST['upload']))
    {
        if (empty($_POST['name']) || empty($_POST['caption']))
        {
            echo "<p>You must enter your name and a caption for the image. Click your browser's Back button to return to the upload page.</p>\n";
        }
        else if (!isset($_FILES['image']))
        {
            echo "<p>You must select an image to upload. Click your browser's Back button to return to the upload page.</p>\n";
        }
        else
        {
            $Name = addslashes($_POST['name']);
            $Caption = addslashes($_POST['caption']);
            $FileName = $Dir . "/" . $_FILES['image']['name'];
            $ImageList = fopen("imagelist.txt", "ab");
            if (is_writeable("imagelist.txt"))
            {
                if (fwrite($ImageList, $Name . "|" . $Caption . "|" . $FileName . "\n"))
                {
                    echo "<p>Thank you for uploading your picture!</p>\n";
                }
                else
                {
                    echo "<p>Cannot add your picture to our site.</p>\n";
                }
            }
            else
            {
                echo "<p>Cannot write to the file.</p>\n";
            }
            fclose($ImageList);
        }
        if (isset($_FILES['image']))
        {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $Dir . "/" . $_FILES['image']['name']) == TRUE)
            {
                echo "File \"" . htmlentities($_FILES['image']['name']) . "\" successfully uploaded.<br />\n";
            }
            else
            {
                echo "There was an error uploading \"" . htmlentities($_FILES['image']['name']) . "\".<br />\n";
            }
        }
    }
?>
<form action="ReunionPictureUploader.php" method="POST" enctype="multipart/form-data">Your Name:<br />
    <input type="text" name="name" /><br />Image Caption or Description:<br />
    <textarea cols="80" rows="2" name="caption" /></textarea><br />
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><br />Image to upload:<br />
    <input type="file" name="image" /><br />(1 MB limit) <br />
    <input type="submit" name="upload" value="Upload the Image" /><br />
</form>
</body>
</html>