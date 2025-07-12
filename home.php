<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include "db.php";

// Fetch user data
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Smooth Fade-in Background */
        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }

        /* Container with Slide-up Effect */
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            transform: translateY(50px);
            opacity: 0;
            animation: slideUp 1.5s forwards;
            animation-delay: 0.2s;
        }

        h1 {
            color: #007bff;
            margin-bottom: 15px;
        }

        /* Button Links with Hover Transition */
        .link-container a {
            display: block;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 5px 0;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .link-container a:hover {
            background-color: #0056b3;
        }

        /* Recent Activity Section */
        .recent-activity {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            margin-top: 20px;
            color: #555;
            font-size: 0.9rem;
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
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Today is <?= date("l, F j, Y"); ?></p>

    <div class="link-container">
        <a href="editprofile.php">Edit Profile</a>
        <a href="changepassword.php">Change Password</a>
        <a href="team.php">Meet the Team</a> <!-- ✅ New Button -->
                <a href="helpdesk.php">Helpdesk</a>
        <a href="logout.php">Logout</a>
        <a href="game.php">Guess the Number Game</a>
    </div>

<div class="recent-activity">
    <h3>Recent Activity</h3>
    <p>Keep track of your latest interactions and security updates.</p>
    <ul id="activity-list">
        <li>Logged in at <span id="current-time"></span></li>
        <li>Updated profile recently</li>
        <li>Changed password recently</li>
    </ul>
</div>

<script>
    function updateTime() {
        let now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; 
        minutes = minutes < 10 ? '0' + minutes : minutes;
        document.getElementById("current-time").textContent = hours + ":" + minutes + " " + ampm;
    }

    updateTime();
    setInterval(updateTime, 60000); // Updates time every minute
</script>

    <footer>
        &copy; <?= date("Y"); ?> User Management System
    </footer>
</div>

</body>
</html>
