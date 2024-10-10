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
//     $sql = "UPDATE profileImages SET pImage=? WHERE user_id=?"; 
//    $sth = $this->connect()->prepare($sql);
//     $sth->execute([$name,$id]);
    
}
public function ImageExist($id){
    $sql = "SELECT * FROM profileimages WHERE user_id = $id";
    
    $result = $this->connect()->query($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
public function insertNewImage($id,$name){
    $sql = "INSERT into profileimages(user_id,pImage) values ('$id','$name')";
    $sth= $this->connect()->prepare($sql);
    $sth->execute();
}
public function inserTimage($id,$name){
    //check for image first and delete 
      
   
    $imageexistence = $this->ImageExist($id);
   if($imageexistence){
     //delete the execute
     $this->deleteImage($id);
      $this->insertNewImage($id,$name);
      $this->changeImagename($id,$name);
   }else{
    
       $this->insertNewImage($id,$name);
   }

     
}
public function getprofileImage($id){

    $sql = "SELECT * FROM profileimages WHERE user_id = $id";
    
    $result = $this->connect()->query($sql);
    
    if ($result) {
        //delete it and put
       

        $data = $result->fetch();
        return $data['pImage'];
    } else {
        // Handle query failure, e.g., log the error
        echo "Query failed!";
    }
    
}
public function deleteImage($id)
{
    $sql = "DELETE FROM profileimages WHERE user_id=?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
}
public function getImageName($id)
{
    ///return the name of image
    $sql = "SELECT * from users where user_id = $id";
    $result = $this->connect()->query($sql);
    return $result['profimage'];
 
}

public function changeImagename($id,$name)
{  

$sql = "UPDATE users SET profimage = :profimage WHERE user_id = :user_id";


$stmt = $this->connect()->prepare($sql);

// Bind parameters
$stmt->bindParam(':profimage', $name);
$stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
$stmt->execute();
}
}