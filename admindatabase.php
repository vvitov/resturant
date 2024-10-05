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
     $emails = [];
     $sql = "SELECT * emails from users";
     $stmt = $this->connect() ->prepare($sql);
     $result = $stmt->execute($stmt);

     foreach ($result as $email) {
        $emails = $result;
     }
     return $emails;
   }
}