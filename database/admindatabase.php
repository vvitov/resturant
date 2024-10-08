<?php

require (__DIR__) .'/database.php';


class admin extends dbh{
  //should have database function like getting all users
  public function getAllUsers(): array
  {
     $users = [];
     $sql = "SELECT * from users";
     $stmt = $this->connect()->prepare($sql);
     $result= $stmt->execute($stmt);
     foreach($users as $user){
         $users = $user;
     }
     return $users;
  }
  //check the user role and modify
   public function getUser($id):array
   {
     $user = [];
     $sql = "SELECT * from users where user_id = ?";
     $stmt = $this->connect()->prepare($sql);
     $result  = $stmt->execute([$id]);
     $user = $result;
     return $user;
   }
   public function getAllEmail(): array
   {
    //returns all the emails for purpose of promotion and the likes
     $emails = [];
     $sql = "SELECT * emails from users";
     $stmt = $this->connect() ->prepare($sql);
     $result = $stmt->execute();

     foreach ($result as $email) {
        $emails = $result;
     }
     return $emails;
   }
   public function getEmail($email):array
   {
      //return an array of the email itself and the id 
      $sql = "SELECT * from users where email=?";
      $stmt = $this->connect()->prepare($sql);
      $result = $stmt->execute([$email]);
      return $result;
   }
   public function upgradeUserType($id):bool
   {
      $usertype = "store-owner";
      //change the type from visitor to store owner
      $sql = "UPDATE users set usertype = $usertype where user_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $result = $stmt->execute([$id]);
      if($result){
         return true;
      }else{
        return false;
      }
   }
}