<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Smooth Fade-in Background */
        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }

        /* Centered Container with Slide-in Effect */
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            opacity: 0;
            transform: scale(0.9);
            animation: slideIn 1s forwards ease-out;
            animation-delay: 0.3s;
            transition: background-color 0.5s ease, transform 0.5s ease;
        }

        /* Input Fields */
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        /* Button Styles with Hover Effect */
        .btn {
            display: block;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin: 5px auto;
            text-decoration: none;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer Styles */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
            opacity: 0;
            animation: fadeInFooter 1s forwards ease-out;
            animation-delay: 1.5s;
        }

        /* Links */
        a {
            text-decoration: none;
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            to { opacity: 1; }
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeInFooter {
            to { opacity: 0.8; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to User Management</h1>
        <a href="register.php" class="btn">Register</a>
        <a href="login.php" class="btn">Login</a>
    </div>
    
    <footer>
        <p>Created by: Jeiel G, Kian T, Jeric C, Carl B</p>
    </footer>
</body>
</html>
