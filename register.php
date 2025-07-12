<?php
include "db.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable error reporting

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check for empty values
    if (empty($username) || empty($email) || empty($password)) {
        die("Please fill in all fields.");
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    try {
        $stmt->execute();
        header("Location: regisuccess.php"); // Redirect to regisuccess.php
        exit(); // Stop further execution
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            echo "Error: Username or email already exists.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Smooth Fade-in Background */
        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff; /* Light Blue Background */
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
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-sizing: border-box;
            text-align: center;
            transition: border-color 0.3s ease;
            margin-bottom: 12px; /* Add space between input fields */
        }

        input[type="text"]:focus, 
        input[type="email"]:focus, 
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Submit Button */
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

        /* Back to Home Button */
        .back-home {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            width: fit-content;
            text-align: center;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .back-home:hover {
            background-color: #5a6268;
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
    <h2>Register</h2>
    <form method="POST" action="">
        <input type="text" name="dummy" style="display: none;">
        <input type="text" name="username" placeholder="Username" required autocomplete="off">
        <input type="email" name="email" placeholder="Email" required autocomplete="off">
        <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>

    <!-- Back to Home Button -->
    <a href="index.php" class="back-home">Back to Home</a>
</div>

</body>
</html>
