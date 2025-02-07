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
            padding: 10px 20px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
        }
        #coin {
            width: 200px;
            height: 200px;
            margin: 20px 0;
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
    </style>
</head>
<body>
    <h1 id="result"></h1>
    <img id="coin" src="front.png" alt="Coin">
    <button onclick="flipCoin()">Flip</button>
    
    <audio id="flipSound" src="https://www.soundjay.com/button/sounds/button-16.mp3" preload="auto"></audio>
    
    <script>
        function flipCoin() {
            const coin = document.getElementById('coin');
            const resultDiv = document.getElementById('result');
            const flipSound = document.getElementById('flipSound');
            
            flipSound.play(); // Play sound
            
            let flipCount = 0;
            const flipImages = [
                "front.png", 
                "back.png"
            ];
            
            const flipInterval = setInterval(() => {
                coin.src = flipImages[flipCount % 2];
                flipCount++;
            }, 250);
            
            setTimeout(() => {
                clearInterval(flipInterval);
                const outcome = Math.random() < 0.5 ? flipImages[0] : flipImages[1];
                coin.src = outcome;
                resultDiv.innerHTML = `<span class="highlight">${outcome === flipImages[0] ? 'Head' : 'Tail'}</span>`;
            }, 2000);
        }
    </script>
</body>
</html>
