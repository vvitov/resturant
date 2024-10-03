<?php

class dbh{
    private $user = 'root';
    private $password = '';
     
    public function connect(){
         try {
            return $dbh =new PDO('mysql:host=localhost;dbname=vitovinyl', $this->user, $this->password);
         } catch (PDOException $e) {
             die($e->getmessage());
         }
    }
    public function getAllEmail(){
        //return all emails
        $users = [];
        $stmt = $this->connect()->prepare("SELECT * FROM users");
        $stmt->execute(); 
        $user = $stmt->fetchAll();
       
        
        foreach($user as $row){
             $users[] = $row;
        }
        return $users;
    }
    public function getEmail($email){
       //this 
       $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
       $stmt->execute([$email]);
       $user = $stmt->fetch();
       
       if($user){
         return $user;
       }else
       {
         return false;
       }
    }
    public function signup($email,$password){
        // $date = date("Y-m-d");
        $date ="2020-05-09";
         $stmt = $this->connect()->prepare("INSERT INTO users (email, psword,reg_date) VALUES (?,?,?)");
         $stmt->execute([$email,$password,$date]);
    }

}

