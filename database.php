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
    //   $data = [
    //     'name' => $firstname,
    //     'surname' => $lastname,
    //     'id' => $id,
    // ];
      
      //UPDATE customer set user_id = 2 where email = "j@gmail";
        //$sql = "UPDATE users SET fname=?,lname=?,WHERE user_id=?";
        //$stmt = $this->connect()->prepare($sql);
        //$stmt->execute([$firstname,$lastname,$id]);
        //UPDATE `users` SET `fname`='big',`lname`='shrk' WHERE `user_id`=3;
        //$query = "UPDATE users set fname=$firstname,lname=$lastname WHERE user_id=$id";
        // $query ="UPDATE `users` SET `fname`=$firstname,`lname`=$lastname WHERE `user_id`=$id;";
        // $stmt = $this->connect()->prepare($query)->execute();
        //$sql = "UPDATE users SET fname=:name, lname=:surname, WHERE id=:id";
        $sql = "UPDATE users SET fname=?, lname=?  WHERE user_id=?";
         $this->connect()->prepare($sql)->execute([$firstname,$lastname,$id]);
    }
}

