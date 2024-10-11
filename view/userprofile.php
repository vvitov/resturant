<?php
// Start session to access session variables
session_start();

// Include the database connection file
require '../database/database.php';

// Check if the 'id' is set in the query string (URL)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the user input (for security)
    $userId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    // Create a database object
    $database = new dbh();

    // Fetch the user data based on the user ID
    $user = $database->getUser($userId);

    // Check if the user exists
    if ($user) {
        $userName = $user['fname']. " ".$user['lname'];
        $userEmail = $user['email'];
        $userType = $user['usertype'];
    } else {
        // Redirect back or show an error if user is not found
        echo "User not found!";
        exit();
    }
} else {
    // Redirect back or show an error if the 'id' parameter is missing
    echo "Invalid user ID!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .profile-details {
            margin: 20px 0;
        }
        .profile-details p {
            font-size: 18px;
            line-height: 1.5;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
            color: #04AA6D;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($userName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($userEmail); ?></p>
            <p><strong>User Type:</strong> <?php echo htmlspecialchars($userType); ?></p>
        </div>
        <a href="./dashboard.php" class="back-link">← Back to Dashboard</a>
        <button>GRANT</button>
        <button>DELETE</button>
    </div>
</body>
</html>
