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
    public function getRole($id){
        $sth = $this->connect()->prepare("SELECT * from users where user_id = ?");
        $sth->execute([$id]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result['usertype'];
    
    }
    public function getAllUsers(): array
    {
        $users = [];
        $sql = "SELECT * FROM users";

        // Prepare and execute the statement
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        // Fetch all results
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the list of users
        return $users;
       
    }
    public function getTableData():array
    {
         $users = [];
         $sql = "SELECT CONCAT(fname, ' ', lname) AS NAME,email ,usertype,user_id FROM users;";

         $stmt = $this->connect()->prepare($sql);
         $stmt->execute();

         $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $users;
    }
    public function getUser($userId) {
        $sql = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

