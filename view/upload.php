<?php
//if successful push the person to update page
echo '<h1>Upload image</h1>';

?>


<!DOCTYPE html>
<html>
<body>

<h2>File Upload Form</h2>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="./upload2.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <!-- <input type="file" name="picture" value=""/> -->
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>

</body>
</html>
