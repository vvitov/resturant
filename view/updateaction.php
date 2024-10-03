<?php

require dirname(__DIR__) .'/database.php';
session_start();

$db = new dbh();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$userid = $_SESSION['user_id'];
$email = $_SESSION['email'];

if($_SERVER['REQUEST_METHOD']==='POST')
{
     $users = $db->getEmail($email);

     if($firstname && $lastname)
     {  
        $data = [
            'name' => $firstname,
            'surname' => $lastname,
            'id' => $userid,
        ];
        
         //call the function to update both
        // $db->updateBoth($firstname,$lastname,$userid);
        $db->updateBoth($firstname,$lastname,$userid);
         echo "BOTH NAMES UPDATED";
     }
     elseif($firstname)
     {
         $db->updateFirstname($firstname,$userid);
         echo "Firstname updated";
     }
     elseif($lastname)
     {
          $db->updateLastname($lastname,$userid);
          echo "Lastname updated";
     }

     //get a function to update the email and firstname and lastname

}