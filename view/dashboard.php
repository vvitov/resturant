<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>
    <style>
      /* Add some basic CSS styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      #sidebar {
        height: 100vh;
        padding: 20px;
        background-color: #e1e1e1;
        float: left;
        width: 250px;
      }

      #sidebar h2 {
        margin-top: 0;
      }

      #content {
        padding: 20px;
        float: left;
        width: calc(100% - 250px);
      }

      /* Style the navigation links */
      #sidebar a {
        color: #333;
        display: block;
        margin-bottom: 10px;
        text-decoration: none;
      }
      #sidebar a:hover {
        text-decoration: underline;
      }
      .container {
            display: grid;
            grid-template-columns: 30% 70%;
            height: 100vh; /* Full height */
        }
        /* Sidebar */
        .sidebar {
            padding: 20px;
        }

        /* Main content */
        .main-content {
          
            padding: 20px;
        }
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
    </style>

  </head>
  <body>
    <div class="container">
    <div id="sidebar" class="sidebar">
      <?php session_start()?>
      <?php
       require '../database/database.php';
       $database = new dbh();
       $role = $database->getRole($_SESSION['user_id']);
      ?>
      <div>
    
      </div>
    <h2>User Dashboard</h2>
      <h1>Session id <?php echo $_SESSION['user_id'];?> </h1>
      <a href="./profile.php">Profile</a>
      <a href="#">Orders</a>
      <a href="#">Settings</a>
    </div>
    <div id="content" class="main-content">
      <h1>Welcome back, <?php echo $_SESSION['email']?></h1>
      <p>
        This is your Dashboard where you can manage your account, orders and
        settings and much more.
      </p>
      

   <a href="./userprofile.php"><tr></tr></a>
<?php
        // Only show data if the user is an admin
        if ($role == "ADMIN") {
          $users = $database->getTableData();

          if ($users) {
            echo '<h2>Users Data</h2>';
            echo '<table id="customers">';
            echo '<tr><th>NAME</th><th>EMAIL</th><th>USER TYPE</th></tr>';

            // Loop through the fetched data and display in the table
            foreach ($users as $user) {
              echo "<tr>";
              echo "<td><a href='./userprofile.php?id={$user['user_id']}'>{$user['NAME']}</a></td>";
              echo "<td><a href='./userprofile.php?id={$user['user_id']}'>{$user['email']}</a></td>";
              echo "<td><a href='./userprofile.php?id={$user['user_id']}'>{$user['usertype']}</a></td>";
              echo "</tr>";
            }

            echo '</table>';
          } else {
            echo '<p>No users found.</p>';
          }
        } else {
          echo '<p>You do not have permission to view this data.</p>';
        }
        ?>
    </div>
    </div>
  </body>
</html>
