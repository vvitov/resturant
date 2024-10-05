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
    public function getAllEmail():array{
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
    public function updateFirstname($firstname,$id)
    {
      $sql = "UPDATE users SET fname=?  WHERE user_id=?";
      $stmt= $this->connect()->prepare($sql);
      $stmt->execute([$firstname,$id]);
    }
    public function updateLastname($lastname,$id)
    {
      $sql = "UPDATE users SET lname=? WHERE user_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$lastname,$id]);
    }
    public function updateBoth($firstname,$lastname,$id)
    {
        $sql = "UPDATE users SET fname=?, lname=?  WHERE user_id=?";
         $this->connect()->prepare($sql)->execute([$firstname,$lastname,$id]);
    }
    public function getRole($id){
        $sql = "SELECT * from user where user_id =?";
        $result = $this->connect()->prepare($sql)->execute([$id]);
        return $result['role'];
    }
}

