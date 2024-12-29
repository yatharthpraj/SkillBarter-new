<?php
session_start(); // Start session to access session variables
// Set a session timeout limit in seconds
$session_timeout = 86400; //  1 day

// Check if the session has a "last activity" timestamp
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's age
    $session_age = time() - $_SESSION['last_activity'];

    // If the session is too old, destroy it
    if ($session_age > $session_timeout) {
        session_unset(); // Remove all session variables
        session_destroy(); // Destroy the session
        header("Location: login.php"); // Redirect to the login page
        exit();
    }
}

// Update the last activity time
$_SESSION['last_activity'] = time();
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
    $mobile = (int)($_POST['mobile'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Check if user is logged in and email is available in session
    if (isset($_SESSION['email']) && $_POST['submit_skills']== 'Submit') {
        $email = $_SESSION['email']; // Use email from session
        $stmt = $conn->prepare("SELECT name FROM user_data WHERE email = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }


        $stmt->bind_param("s", $email); // "s" indicates the parameter is a string

        // Execute the statement
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Fetch the name
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name']; // Fetch the name
                // echo "Name: " . $name;
            }
        } else {
            echo "No user found.";
        }
        // Update user data
        $stmt = $conn->prepare("
        INSERT INTO user_data (name, skill, experience, interest, mode, mobile, description, email)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
        $stmt->bind_param("ssisssss", $name,  $skills, $experience, $interest, $mode, $mobile, $description, $email);

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
