<?php
//should only carry connect and core database functions sign up should be for both 
//client 
class dbh{
    private $user = 'root';
    private $password = '';
     
    public function connect():object{
         try {
            return $dbh =new PDO('mysql:host=localhost;dbname=vitovinyl', $this->user, $this->password);
         } catch (PDOException $e) {
             die($e->getmessage());
         }
    }
   
    public function signup($email,$password){
        // $date = date("Y-m-d");
        $date ="2020-05-09";
         $stmt = $this->connect()->prepare("INSERT INTO users (email, psword,reg_date) VALUES (?,?,?)");
         $stmt->execute([$email,$password,$date]);
    }
  
}

