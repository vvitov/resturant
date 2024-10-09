<?php
//drop the image link here and
echo '<h1>Update record</h1>';
//search the database and return the image link 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
    </style>
</head>
<body>
    <?php 
       session_start();
       require  '../database/client.php';
   
       $client = new client();
      
       
      
      echo 'welcome' .' ' .$_SESSION['email'];
      
      $email = $_SESSION['email'];
      
      //call a function that get
      
      $users = $client->getEmail($email);
      $imagelink = $users['profimage'];
    ?>
<div class="container">
  <form action="./updateaction.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Your name.." value="<?php echo $users['fname'] ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." value="<?php echo $users['lname'] ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Profile Image</label>
      </div>
      <div class="col-75">
        
        <?php if($users['profimage']) 
         echo "<img src='$imagelink' alt='$imagelink'>";
         else 
         echo '<img src="../images/default-pfp-32.jpg" alt="">';
        ?>
        
        
      </div>
    </div>
  

    <div class="row">
      <input type="submit" value="Submit">
    </div>
    
  </form>
  <a href="../view/upload.php">
      <button>UploadImage</button>  
    </a>
</div>
</body>
</html>











