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
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_email = trim($_POST['email']);
    $new_name = trim($_POST['name']);

    // Validate input fields
    if (!empty($new_email) && !empty($new_name)) {
        // Update query without profile picture
        $update_query = "UPDATE users SET email='$new_email', username='$new_name' WHERE username='$username'";

        if (mysqli_query($conn, $update_query)) {
            // Update session username if changed
            $_SESSION['username'] = $new_name;
            $success_message = "Profile updated successfully!";
            header("Location: editprofile.php"); // Refresh to show changes
            exit();
        } else {
            $error_message = "Error updating profile: " . mysqli_error($conn);
        }
    } else {
        $error_message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Background Style */
        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff; /* Light Blue Background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            opacity: 0; /* Start fully transparent */
            animation: fadeIn 1.5s forwards; /* Fade-in animation */
        }

        /* Form Container */
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            transform: translateY(50px); /* Start slightly shifted down */
            opacity: 0; /* Start fully transparent */
            animation: slideUp 1.5s forwards;
            animation-delay: 0.2s;
        }

        /* Input Fields */
        input[type="text"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
            border: 1px solid #aaa;
            display: block;
            text-align: center;
        }

        /* Submit Button */
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

        /* Message Styling */
        .message {
            text-align: center;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Back Link */
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
        <h2>Edit Profile</h2>

        <!-- Success or Error Message -->
        <?php if (isset($success_message)) { ?>
            <p class="message" style="color: green;"> <?= $success_message ?> </p>
        <?php } elseif (isset($error_message)) { ?>
            <p class="message" style="color: red;"> <?= $error_message ?> </p>
        <?php } ?>

        <!-- Edit Profile Form -->
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Username" 
                   value="<?= htmlspecialchars($user['username']); ?>" required>
            
            <input type="email" name="email" placeholder="Email Address" 
                   value="<?= htmlspecialchars($user['email']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>

        <p><a href="home.php">Back to Dashboard</a></p>
    </div>
</body>
</html>
