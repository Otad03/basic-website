<?php
session_start();

// Generate a random number if it doesn't exist in the session
if (!isset($_SESSION['random_number'])) {
    $_SESSION['random_number'] = rand(1, 100);
}

// Initialize variables
$message = "";
$attempts = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 0;

// Handle form submission for Guess the Number game
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guess = $_POST['guess'];
    $attempts++;

    // Check the guess
    if ($guess < $_SESSION['random_number']) {
        $message = "Too low! Try again.";
    } elseif ($guess > $_SESSION['random_number']) {
        $message = "Too high! Try again.";
    } else {
        $message = "Congratulations! You guessed the number in $attempts attempts.";
        // Reset game after correct guess
        unset($_SESSION['random_number']);
        unset($_SESSION['attempts']);
    }

    // Store attempts count
    $_SESSION['attempts'] = $attempts;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .game-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h3 {
            margin-bottom: 20px;
        }

        input[type="number"] {
            padding: 10px;
            margin-bottom: 15px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            font-size: 16px;
            margin-top: 15px;
        }

        .reset-button {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 15px;
            background-color: #6c757d;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .reset-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h3>Guess the Number (1-100)</h3>

        <form method="POST">
            <input type="number" name="guess" placeholder="Enter your guess" required>
            <button type="submit">Guess</button>
        </form>

        <p class="message"><?= $message; ?></p>

        <?php if (isset($message) && strpos($message, 'Congratulations') !== false): ?>
            <a href="guess_number.php" class="reset-button">Play Again</a>
        <?php endif; ?>
    </div>
</body>
</html>
