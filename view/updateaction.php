<?php

require '../database/client.php';
session_start();

$client = new client();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$userid = $_SESSION['user_id'];
$email = $_SESSION['email'];

if($_SERVER['REQUEST_METHOD']==='POST')
{
     $users = $client->getEmail($email);

     if($firstname && $lastname)
     {  
       
        $client->updateBoth($firstname,$lastname,$userid);
         echo "BOTH NAMES UPDATED";
     }
     elseif($firstname)
     {
         $client->updateFirstname($firstname,$userid);
         echo "Firstname updated";
     }
     elseif($lastname)
     {
          $client->updateLastname($lastname,$userid);
          echo "Lastname updated";
     }

     //get a function to update the email and firstname and lastname

}