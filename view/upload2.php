<?php
session_start();
$id = $_SESSION['user_id'];
require '../database/client.php';
 $filename = $_FILES["userfile"]["name"]; 
 $tempname = $_FILES["userfile"]["tmp_name"];
  $folder = "image/".$filename;  
$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
 
$client = new client();
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $client->uploadImage($filename,$id);
   echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";
var_dump($uploadfile);
?>
