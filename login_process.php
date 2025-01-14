<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (!empty($email) && !empty($password)) {
        try {
            // Check if the email already exists in the database
            $query = "SELECT * FROM login_data WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->rowCount() == 0) {
                // User does not exist, so let's insert them as if they are registering
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Get the current timestamp
                $timestamp = date("Y-m-d H:i:s");
                
                $insertQuery = "INSERT INTO login_data (email, password, timestamp) VALUES (:email, :password, :timestamp)";
                $insertStmt = $conn->prepare($insertQuery);
                $insertStmt->bindParam(':email', $email);
                $insertStmt->bindParam(':password', $hashed_password);
                $insertStmt->bindParam(':timestamp', $timestamp);
                $insertStmt->execute();
                
                // After registering, automatically log the user in
                $user_id = $conn->lastInsertId();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                
                header("Location: dashboard.php");
                exit;
            } else {
                // User exists, let's check if the password matches
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    // Correct password, log the user in
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    
                    // Insert a login timestamp on each successful login
                    $loginTimestamp = date("Y-m-d H:i:s");
                    $loginQuery = "INSERT INTO login_data (email, password, timestamp) VALUES (:email, :password, :timestamp)";
                    $loginStmt = $conn->prepare($loginQuery);
                    $loginStmt->bindParam(':email', $email);
                    $loginStmt->bindParam(':password', $user['password']);  // Storing the existing password
                    $loginStmt->bindParam(':timestamp', $loginTimestamp);
                    $loginStmt->execute();
                    
                    header("Location: dashboard.php");
                    exit;
                } else {
                    // Invalid password
                    $error = "Incorrect password. Please try again.";
                }
            }
        } catch (PDOException $e) {
            // Error handling
            $error = "An error occurred. Please try again later.";
        }
    } else {
        $error = "Please provide both email and password.";
    }
}
?>
