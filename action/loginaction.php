<?php

declare(strict_types=1);

//require_once './database.php';

 require dirname(__DIR__) .'/database.php';

 $db = new dbh();

$username = 'root';
$dbpassword = '';



try {
    $conn =new PDO('mysql:host=localhost;dbname=vitovinyl', $username, $dbpassword);
} catch (PDOException $e) {
    die($e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $pas = $_POST['pasword'];
    
    $errors = [];
    //check for empty fields
    //check for valid email
    //login and start the session
    //if login is successfull push the person to dashboard
   if(empty($email)  || empty($password))
   {
      $errors = ['empty fields'];
   }
   if(filter_var($email, FILTER_VALIDATE_EMAIL))
   {
     $errrors = ['invalid email'];
   }

  
$actualemail = $db->getEmail($email);
   if($actualemail['email'])
   {
      //check if password is same
      if($actualemail['psword'] === $pas){
        session_start();

$_SESSION['user_id'] = $actualemail['user_id'];
$_SESSION['email']   = $email;
$_SESSION['time']    = time();

header('Location: \vitovinyl\view\dashboard.php');
          echo 'Passwords are same';
          //push to database
      }else{
         ///push to loginpage
         header('Location: \vitovinyl\view\login.php');
          echo 'passwords are not same';
      }
   }
   
}