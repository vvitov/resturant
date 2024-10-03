<?php

require dirname(__DIR__) .'/database.php';

require dirname(__DIR__) .'../controller/signup_controller.php';
//require_once "../app/controller/signup_controller.php";


$database = new dbh();



$email = $_POST['email'];
$pass = $_POST['psw'];
$repeat = $_POST['psw-repeat'];

$errorcheck = new errorcheck($email,$pass,$repeat);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    $errors = [];
    if($errorcheck->emptyField($email,$pass,$repeat))
    {
        $errors = ['empty fields exist'];
    }
    if(!$errorcheck->validEmail($email))
    {
       $errors = ['invalid email'];
    }
    if($errorcheck->emailExist($email)){
        $errors = ['email exist'];
    }
    //get just email and password
    //error handlers for empty
    //verify email
    //setup email later to verify 
    
    //check if no errors call the register function
    if(count($errors)<1){
         $database->signup($email,$password);
    }
    
}