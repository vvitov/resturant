<?php
require '../model/database.php';
//controller should error check 
//load views
$db = new db();
class errorcheck{
    private $email;
    private $password;
    private $repeat;

    public function __construct($email,$password,$repeat)
    {
        $this->email = $this->email;
        $this->password = $this->password;
        $this->$repeat = $this->repeat;
    }
    public function emptyField($email,$password,$repeat)
    {
          //if empty return true
          //if not empty return false
        if(empty($email) || empty($password) || empty($repeat))
        {
             return true;
        }else
        {
            return false;
        }
    }
    public function validEmail($email)
    {

        //if valid return true
        //if not valid return false
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return true;
        }else{
            return false;
        }
    }
    public function emailExist($email){
         //this should just call a function from the model and
         require '../model/database.php';
         
         if($db->getEmail($email)){
             return true;
         }else
         {
            return false;
         }
    }
}