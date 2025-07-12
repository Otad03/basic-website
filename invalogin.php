<?php
session_start();
if (!isset($_SESSION['error_message'])) {
    header("Location: login.php"); // Redirect if no error message
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffcccc; /* Light red background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Centered Container */
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            animation: shake 0.6s ease-in-out; /* Trigger shake animation */
        }

        /* Error Message */
        h2 {
            color: red;
            margin-bottom: 15px;
        }

        /* Back to Login Button */
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
                        transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Shake Animation */
        @keyframes shake {
            0% { transform: translateX(0); }
            10% { transform: translateX(-10px); }
            20% { transform: translateX(10px); }
            30% { transform: translateX(-10px); }
            40% { transform: translateX(10px); }
            50% { transform: translateX(-10px); }
            60% { transform: translateX(10px); }
            70% { transform: translateX(-10px); }
            80% { transform: translateX(10px); }
            90% { transform: translateX(-10px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= $_SESSION['error_message']; ?></h2>
        <a href="login.php">Back to Login</a>
    </div>
</body>
</html>
