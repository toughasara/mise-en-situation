<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class UserModel{

    private $conn;

    public function __construct($conn){
        $db = new Database();
        $this->conn = new $db->$conn;
    }

    public function trouveruser($username, $password){
        try {

            // Query to check if the user exists
            $query = "SELECT * FROM User WHERE username = :username";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verify user credentials
            if ($user && password_verify($password, $user['password'])) {
                // Store user info in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect to a protected page
                header("Location: ../../views/dashboard.php");
                exit();
            } else {
                // Invalid credentials
                $_SESSION['error'] = "Invalid username or password.";
                header("Location: ../../views/auth/login.php");
                exit();
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function saveuser($user){
        $username = $user->getUsername();
        $fullname = $user->getFullname();
        $password = $user->getPassword();

        try {

            // Check if username already exists
            $query = "SELECT COUNT(*) FROM User WHERE username = :username";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $count = $stmt->fetchColumn();
    
            if ($count > 0) {
                // Username already exists
                $_SESSION['error'] = "Username already exists. Please choose another one.";
                header("Location: ../../views/auth/register.php");
                exit();
            }
    
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            // Insert user into the database
            $query = "INSERT INTO User (username, fullname, password) VALUES (:username, :fullname, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':password', $hashedPassword);
    
            $stmt->execute();
    
            // Registration successful
            $_SESSION['success'] = "Registration successful! Please log in.";
            header("Location: ../../views/auth/login.php");
            exit();
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }
    }
}