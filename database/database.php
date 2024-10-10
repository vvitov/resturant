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
         $result = $stmt->execute([$email,$password,$date]);
         
        return $result;
    }
    public function getId($email){
        
        $sql = "SELECT * FROM users WHERE email = :email";

    // Prepare the statement
    $stmt = $this->connect()->prepare($sql);

    // Bind the email parameter to the query
    $stmt->bindParam(':email', $email, PDO::PARAM_STR); // Bind as a string

    // Example email (this should typically come from user input)
    

    // Execute the query
    $stmt->execute();

    // Fetch the user data as an associative array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user['user_id'];
    }
  
}

