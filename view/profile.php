<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
 </style>
</head>
<body>
     <!-- Add icon library -->


<div class="card">
  <?php session_start();
    require dirname(__DIR__) .'/database.php';

    $db = new dbh();
   
    
   
   echo 'welcome' .' ' .$_SESSION['email'];
   
   $email = $_SESSION['email'];
   
   //call a function that get
   
   $users = $db->getEmail($email);
   
   $id = $_SESSION['user_id'];
   $role = $db->getRole($id);
  ?>
  <h1><?php echo $role?></h1>
  <img src="../images/default-pfp-32.jpg" alt="John" style="width:100%">
  
  <h1><?php echo $users['fname']. $users['lname'] ?></h1>
  <p class="title"><?php echo $users['role'] ?></p>
  <a href="../view/upload.php"><i class="fa fa-cloud"></i></a>
  <a href="../view/update.php"><i class="fa fa-pencil"></i></a>
  <p>
    <a href="./dashboard.php">
    <button>Contact</button>
    </a>
  </p>
</div> 
</body>
</html>





//search the database for this email and bring her details




