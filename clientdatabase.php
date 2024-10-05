<?php

require dirname(__DIR__) .'/database.php';
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
    $sql = "SELECT * from users where email = ?";
    $stmt = $this->connect()->prepare($sql);
    $userEmail = $stmt->execute([$email]);
    return $userEmail;
}
}