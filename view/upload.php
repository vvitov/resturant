<?php
//if successful push the person to update page
echo '<h1>Upload image</h1>';

?>


<!DOCTYPE html>
<html>
<body>

<h2>File Upload Form</h2>
<form method = "POST" action = "upload2.php" enctype="multipart/form-data">
   <label for="file">File name:</label>
   <input type="file" name="uploadfile" />
   <input type="submit" name="submit" value="Upload" />
</form>

</body>
</html>
