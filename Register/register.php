<?php
session_start(); // Start session to access session variables

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "user_schema";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve inputs
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';
    $skills = trim($_POST['skills'] ?? '');
    $experience = (int)($_POST['experience'] ?? 0);
    $interest = trim($_POST['interest'] ?? '');
    $mode = trim($_POST['mode'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if user is logged in and email is available in session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email']; // Use email from session

        // Update user data
        $stmt = $conn->prepare("
            UPDATE user_data 
            SET name = ?, password = ?, skill = ?, experience = ?, interest = ?, mode = ?, mobile = ?, description = ?
            WHERE email = ?
        ");
        $stmt->bind_param("sssisssss", $name, $hashed_password, $skills, $experience, $interest, $mode, $mobile, $description, $email);

        if ($stmt->execute()) {
            echo "<script>
                alert('Your data has been successfully updated.');
                window.location.href = '../index.html'; // Redirect to home page
            </script>";
        } else {
            echo "Error updating data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // If no session email, assume this is a new registration
        if (empty($_POST['email'])) {
            echo "<script>alert('Email is required for registration.'); window.history.back();</script>";
            exit();
        }
        $email = trim($_POST['email']);

        // Insert new user data
        $stmt = $conn->prepare("
            INSERT INTO user_data (name, email, password, skill, experience, interest, mode, mobile, description) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("ssssissis", $name, $email, $hashed_password, $skills, $experience, $interest, $mode, $mobile, $description);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registration successful!');
                window.location.href = '../index.html'; // Redirect to home page
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
