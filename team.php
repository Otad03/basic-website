<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #cce7ff;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Grid Container */
        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            max-width: 800px;
            width: 100%;
        }

        /* Flip Card Container */
        .flip-card {
            background-color: transparent;
            perspective: 1000px; /* Enables 3D effect */
            cursor: pointer;
        }

        /* Flip Card Inner */
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 250px;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Flip on Click */
        .flip-card.show .flip-card-inner {
            transform: rotateY(180deg);
        }

        /* Front and Back */
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px;
            overflow: hidden;
        }

        /* Front Side (Image) */
        .flip-card-front {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 20px;
            object-fit: cover;
        }

        .name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 10px;
            color: #555;
        }

        /* Back Side (Information) */
        .flip-card-back {
            background-color: #f2f2f2;
            transform: rotateY(180deg);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            text-align: center;
            font-size: 0.9rem;
            color: #333;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>Meet Our Team</h1>

    <div class="team-container">
        <!-- Jeiel's Card -->
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
                <!-- Front -->
                <div class="flip-card-front">
                    <img src="images/jeiel.png" alt="Jeiel G" class="profile-img">
                    <p class="name">Jeiel Gamboa</p>
                </div>
                <!-- Back -->
                <div class="flip-card-back">
                    <p><strong>Role:</strong> Lead Developer</p>
                    <p>BSIT 2nd Year, Cuyapo, Nueva Ecija</p>
                </div>
            </div>
        </div>

        <!-- Kian's Card -->
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/kian.png" alt="Kian T" class="profile-img">
                    <p class="name">Kian Tawatao</p>
                </div>
                <div class="flip-card-back">
                    <p><strong>Role:</strong> UI/UX Designer</p>
                    <p>BSIT 2nd Year, Paniqui, Tarlac</p>
                </div>
            </div>
        </div>

        <!-- Jeric's Card -->
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/jeric.png" alt="Jeric C" class="profile-img">
                    <p class="name">Jeric Casantusan</p>
                </div>
                <div class="flip-card-back">
                    <p><strong>Role:</strong> Backend Developer</p>
                    <p>BSIT 2nd Year, Tarlac City, Tarlac</p>
                </div>
            </div>
        </div>

        <!-- Carl's Card -->
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/carl.png" alt="Carl B" class="profile-img">
                    <p class="name">Carl Bagalayos</p>
                </div>
                <div class="flip-card-back">
                    <p><strong>Role:</strong> Database Manager</p>
                    <p>BSIT 2nd Year, Camiling, Tarlac</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Our Amazing Team</p>
    </footer>

    <script>
        // Function to handle card flip
        function flipCard(card) {
            // Remove "show" class from other cards
            document.querySelectorAll('.flip-card').forEach(c => {
                if (c !== card) c.classList.remove('show');
            });

            // Toggle "show" class on the clicked card
            card.classList.toggle('show');
        }
    </script>

</body>
</html>
