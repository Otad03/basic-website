<?php
include "db.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: home.php"); // Redirect to home/dashboard
        exit();
    } else {
        // Store the error message in the session
        $_SESSION['error_message'] = "Invalid username or password.";
        header("Location: invalogin.php"); // Redirect to the error page
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
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

        /* Centered Container with Flexbox */
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            opacity: 0;
            transform: translateY(50px);
            animation: slideUp 1.5s forwards;
            animation-delay: 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 12px; /* Increased gap between elements */
        }

        /* Input Fields */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-sizing: border-box;
            text-align: center;
            transition: border-color 0.3s ease;
            margin-bottom: 12px; /* Add space between input fields */
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Buttons */
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
                        transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Links */
        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Back to Home Button */
        .back-home {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            width: fit-content;
            transition: background-color 0.3s ease;
        }

        .back-home:hover {
            background-color: #5a6268;
                        transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
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
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register</a></p>

    <!-- Back to Home Button -->
    <a href="index.php" class="back-home">Back to Home</a>
</div>

</body>
</html>
