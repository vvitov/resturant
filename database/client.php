<?php

require '../database/database.php';
//should only call client function
//
class client extends dbh{
//call super

public function updateLastname($lastname,$id)
{
  $sql = "UPDATE users SET lname=? WHERE user_id = ? AND usertype=visitor";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$lastname,$id]);
}
public function updateFirstname($firstname, $id)
{
    $sql ="UPDATE users SET fname=? WHERE user_id = ? AND usertype=visitor";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname,$id]);
}
public function updateBoth($firstname, $lastname, $id)
{
    $sql = "UPDATE users SET fname=?, lname=?  WHERE user_id=?";
    $this->connect()->prepare($sql)->execute([$firstname,$lastname,$id]);
}
public function getEmail($email)
{
$sth = $this->connect()->prepare("SELECT * from users where email=?");
$sth->execute([$email]);
$result = $sth->fetch(PDO::FETCH_ASSOC);
 return $result;
}
public function getRole($id){
    $sth = $this->connect()->prepare("SELECT * from users where user_id = ?");
    $sth->execute([$id]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result['usertype'];

}
public function uploadImage($name,$id){
     //call the connection
     //sql
    //$sql = "Update users set image= ? where user_id = ?";
   // $sql ="UPDATE users SET profimage=? WHERE user_id = ? AND usertype=visitor";
    $sql = "UPDATE users SET profimage=? WHERE user_id=?"; 
   $sth = $this->connect()->prepare($sql);
    $sth->execute([$name,$id]);
    
}
}