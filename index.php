<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Flip Simulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8b400, #0034ff);
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        button {
            background-color: #fff;
            color: #5000ffed;
            border: none;
            border-radius: 30px;
            padding: 2px 12px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
        }
        #coin {
            width: 400px;
            height: 400px;
            margin: 20px 0;
            animation: none;
        }
        #result {
            margin-top: 20px;
            font-size: 2rem;
            font-weight: bold;
        }
        .highlight {
            color: #d9a41f;
            background: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        @keyframes flip {
            0% { transform: rotateY(0); }
            50% { transform: rotateY(180deg); }
            100% { transform: rotateY(360deg); }
        }
    </style>
</head>
<body>
    <h1 id="result"></h1>
    <img id="coin" src="2006_Quarter_Proof.png" alt="Coin">
    <button onclick="flipCoin()">Flip</button>


    <audio id="flipSound" src="https://www.soundjay.com/button/sounds/button-16.mp3" preload="auto"></audio>

    <script>
        function flipCoin() {
            const coin = document.getElementById('coin');
            const resultDiv = document.getElementById('result');
            const flipSound = document.getElementById('flipSound');
            // Play flip sound
            flipSound.play();
            // Randomize the outcome
            const outcome = Math.random() < 0.5 ? "Head" : "Tail";
            // Add animation to the coin
            coin.style.animation = "flip 1s ease-in-out";
            // Wait for the animation to finish before showing the result
            setTimeout(() => {
                resultDiv.innerHTML = `<span class="highlight">${outcome}</span>`;
                coin.style.animation = "none"; // Reset animation
            }, 1000);
        }
    </script>
</body>
</html>
