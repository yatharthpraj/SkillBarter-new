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

// Function to sanitize inputs
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $skills = sanitizeInput($_POST['skills'] ?? '');
    $experience = (int) ($_POST['experience'] ?? 0);
    $interest = sanitizeInput($_POST['interest'] ?? '');
    $mode = sanitizeInput($_POST['mode'] ?? '');
    $mobile = (int) ($_POST['mobile'] ?? 0);
    $description = sanitizeInput($_POST['description'] ?? '');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user already exists in `user_data`
    $stmt_check = $conn->prepare("SELECT name FROM user_data WHERE email = ?");
    if (!$stmt_check) {
        die("Error preparing query: " . $conn->error);
    }
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Existing user
        $row = $result_check->fetch_assoc();
        $name = $row['name']; // Retrieve the name associated with this email
        $stmt_check->close();

        // Use the user-specific table for this user
        $user_table = "user_" . strtolower(str_replace(' ', '_', $name));

        // Ensure the table exists and has the correct structure
        $create_table_sql = "
            CREATE TABLE IF NOT EXISTS `$user_table` (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                skill VARCHAR(255) NOT NULL,
                experience INT NOT NULL,
                interest VARCHAR(255) NOT NULL,
                mode VARCHAR(100) NOT NULL,
                mobile BIGINT NOT NULL,
                description TEXT,
                time_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

        if ($conn->query($create_table_sql) !== TRUE) {
            die("Error creating table: " . $conn->error);
        }

        // Insert data into the user-specific table
        $stmt1 = $conn->prepare("INSERT INTO `$user_table` (name, email, password, skill, experience, interest, mode, mobile, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt1) {
            die("Error preparing query: " . $conn->error);
        }
        $stmt1->bind_param("ssssissis", $name, $email, $hashed_password, $skills, $experience, $interest, $mode, $mobile, $description);

        if ($stmt1->execute()) {
            echo "<script>
                alert('Data added successfully to your existing table.');
                window.location.href = '../index.html';
            </script>";
        } else {
            die("Error: " . $stmt1->error);
        }
        $stmt1->close();

    } else {
        // New user
        $stmt_check->close();

        // Insert the user into the `user_data` table
        $stmt2 = $conn->prepare("INSERT INTO user_data (name, email, password) VALUES (?, ?, ?)");
        if (!$stmt2) {
            die("Error preparing query: " . $conn->error);
        }
        $stmt2->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt2->execute()) {
            // Create a user-specific table for the new user
            $user_table = "user_" . strtolower(str_replace(' ', '_', $name));

            $create_table_sql = "
                CREATE TABLE IF NOT EXISTS `$user_table` (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    skill VARCHAR(255) NOT NULL,
                    experience INT NOT NULL,
                    interest VARCHAR(255) NOT NULL,
                    mode VARCHAR(100) NOT NULL,
                    mobile BIGINT NOT NULL,
                    description TEXT,
                    time_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

            if ($conn->query($create_table_sql) !== TRUE) {
                die("Error creating table: " . $conn->error);
            }

            // Insert data into the user-specific table
            $stmt3 = $conn->prepare("INSERT INTO `$user_table` (name, email, password, skill, experience, interest, mode, mobile, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt3) {
                die("Error preparing query: " . $conn->error);
            }
            $stmt3->bind_param("ssssissis", $name, $email, $hashed_password, $skills, $experience, $interest, $mode, $mobile, $description);

            if ($stmt3->execute()) {
                echo "<script>
                    alert('Registration successful! New user-specific table created.');
                    window.location.href = '../index.html';
                </script>";
            } else {
                die("Error: " . $stmt3->error);
            }
            $stmt3->close();
        } else {
            die("Error: " . $stmt2->error);
        }
        $stmt2->close();
    }
}

// Close the connection
$conn->close();

?>
