<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out...</title>
    <style>
        /* Full-screen black background */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: white;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            transition: background-color 1s ease; /* Smooth transition */
        }

        h1 {
            font-size: 2rem;
            color: #333;
            opacity: 1;
            transition: opacity 0.5s ease;
        }
    </style>
</head>
<body>
    <h1>Logging Out...</h1>

    <script>
        // Fade to black after 1 second
        setTimeout(() => {
            document.body.style.backgroundColor = "black";
            document.querySelector('h1').style.opacity = "0";
        }, 1000); // Delay before fade starts

        // Redirect after fade completes
        setTimeout(() => {
            window.location.href = "index.php"; // Change to "login.php" if needed
        }, 2000); // Total duration before redirect
    </script>
</body>
</html>
