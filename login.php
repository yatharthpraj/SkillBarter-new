<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "user_schema";

try {
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
                    $_SESSION['password'] = $hashed_password;

                  
                    echo '
<div id="deleteModal" class="modal" onclick="closeModal()">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h1>Login Successfull!! Welcome</h1>
    </div>
</div>
<script>
    // Function to show the modal
    function showModal() {
        document.getElementById("deleteModal").style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("deleteModal").style.display = "none";
       location.reload();
               window.history.back();


    }

    // Automatically show the modal
    window.onload = function() {
        showModal();
        console.log("Post deleted");
    };
</script>
<style>
    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        text-align: center;
        border-radius: 10px;
    }
    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
    }
</style>
';


                } else {
                    echo "<script>alert('Incorrect password. Please try again.');
                    window.history.back(); // Redirect back to login page
                </script>";
                }
            } else {
                echo "<script>alert('No account found with this email address.');
                window.history.back(); // Redirect back to login page
            </script>";
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Handle logout request
    if (isset($_POST['logout']) && isset($_SESSION['email'])) {
        // Destroy the session to log out the user
    //     echo "<script>
    // alert('You have logged out successfully.');
    // window.history.back(); // Redirect to login page
    // </script>";
    echo '
    <div id="deleteModal" class="modal" onclick="closeModal()">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Logged out successfully. Don’t stay away too long! </h2>
        </div>
    </div>
    <script>
        // Function to show the modal
        function showModal() {
            document.getElementById("deleteModal").style.display = "block";
        }
    
        // Function to close the modal
        function closeModal() {
            document.getElementById("deleteModal").style.display = "none";
            window.history.back();
        }
    
        // Automatically show the modal
        window.onload = function() {
            showModal();
            console.log("Post deleted");
        };
    </script>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            text-align: center;
            border-radius: 10px;
        }
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
        }
    </style>
    ';
        session_destroy();
    }
    if (isset($_POST['logout']) && !isset($_SESSION['email'])) {
        echo "<script>
    alert('You are already logged out');
    window.history.back(); // Redirect to login page
    </script>";
    }
} catch (Exception $e) {
    echo "Something went wrong, but we’ll make it right!
    <script>
    window.history.back();
    </script>";
}
// Close the connection
$conn->close();
?>