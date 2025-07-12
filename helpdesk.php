<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Styling */
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Headings */
        h1 {
            color: #007bff;
            font-size: 28px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
        }

        /* Info Text */
        p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        /* Back Button */
        a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
                        transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Helpdesk</h1>
        <h2>Project Information</h2>
        <p><strong>Created By:</strong> Jeiel E. Gamboa</p>
        <p><strong>Date:</strong> March 23, 2025</p>
        <p><strong>Location:</strong> Tarlac City, Tarlac</p>
        <p><strong>Tools Used:</strong> XAMPP, PHP, MySQL, HTML, CSS</p>
        <p><strong>Description:</strong> A simple user management system with authentication and database connection.</p>
        <a href="home.php">Go Back</a>
    </div>
</body>
</html>
