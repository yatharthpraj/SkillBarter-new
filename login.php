<?php
session_start();

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

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Sanitize inputs
    $email = $conn->real_escape_string($_POST['Email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Check if email and password are provided
    if (!empty($email) && !empty($password)) {
        // Query to fetch user data
        $stmt = $conn->prepare("SELECT password, name FROM user_data WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the user data
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            $name = $row['name'];

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Login successful, store user info in session
                $_SESSION['user'] = $name; // Store user's name in the session
                $_SESSION['email'] = $email;

                echo "<script>
                    alert('Login successful! Welcome, $name.');
                    window.location.href = './service/service.php'; // Redirect to dashboard or home page
                </script>";
            } else {
                echo "<script>alert('Incorrect password. Please try again.');
                    window.location.href = './index.html'; // Redirect back to login page
                </script>";
            }
        } else {
            echo "<script>alert('No account found with this email address.');
                window.location.href = './index.html'; // Redirect back to login page
            </script>";
        }

        // Close the statement
        $stmt->close();
    }
}

// Handle logout request
if (isset($_POST['logout'])) {
    // Destroy the session to log out the user
    session_destroy();
    echo "<script>
            alert('You have logged out successfully.');
            window.location.href = './index.html'; // Redirect to login page
          </script>";
}

// Close the connection
$conn->close();
?>
