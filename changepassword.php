<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include 'db.php';

// Fetch current user data
$username = $_SESSION['username'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = "Please fill in all fields.";
    } elseif ($new_password !== $confirm_password) {
        $error_message = "New passwords do not match.";
    } else {
        $query = "SELECT password FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if (password_verify($current_password, $user['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
            $update_query = "UPDATE users SET password='$hashed_password' WHERE username='$username'";

            if (mysqli_query($conn, $update_query)) {
                $success_message = "Password changed successfully!";
            } else {
                $error_message = "Error updating password: " . mysqli_error($conn);
            }
        } else {
            $error_message = "Current password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        /* Smooth Fade-in Background */
        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }

        /* Centered Container with Slide-up Effect */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            opacity: 0;
            transform: translateY(50px);
            animation: slideUp 1.5s forwards;
            animation-delay: 0.2s;
        }

        /* Heading */
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 15px;
        }

        /* Input Fields */
        input[type="password"] {
            display: block;
            width: 90%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
            border: 1px solid #aaa;
            text-align: center;
        }

        /* Button */
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
                        transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Message Styles */
        .message {
            text-align: center;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Back to Dashboard Link */
        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            to { opacity: 1; }
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        
        <!-- Success or Error Messages -->
        <?php if (isset($success_message)) { ?>
            <p class="message" style="color: green;"> <?= $success_message ?> </p>
        <?php } elseif (isset($error_message)) { ?>
            <p class="message" style="color: red;"> <?= $error_message ?> </p>
        <?php } ?>

        <!-- Form -->
        <form method="POST" action="">
            <input type="password" name="current_password" placeholder="Current Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
            <button type="submit">Change Password</button>
        </form>

        <p style="text-align: center"><a href="home.php">Back to Dashboard</a></p>
    </div>
</body>
</html>
