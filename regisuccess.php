<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
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
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            opacity: 0;
            transform: translateY(50px);
            animation: slideUp 1.5s forwards;
            animation-delay: 0.2s;
        }

        h1 {
            color: #007bff;
            margin-bottom: 10px;
        }

        /* Button Link */
        a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
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
        <h1>Registration Successful!</h1>
        <p>You have successfully registered.</p>
        <a href="login.php">Go to Login</a>
    </div>
</body>
</html>
