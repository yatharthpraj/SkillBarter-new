<?php
session_start(); // Start session to access session variables

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "user_schema";

try {
    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to sanitize inputs
    function sanitizeInput($input)
    {
        return htmlspecialchars(trim($input));
    }

    // Function to create a user-specific table
    function createUserTable($conn, $user_table)
    {
        $create_table_sql = "
            CREATE TABLE IF NOT EXISTS `$user_table` (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                skill VARCHAR(255) ,
                experience INT ,
                interest VARCHAR(255) ,
                mode VARCHAR(100) ,
                mobile BIGINT ,
                description TEXT,
                time_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

        if (!$conn->query($create_table_sql)) {
            die("Error creating table: " . $conn->error);
        }
    }

    // Handle the main registration form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['submit_skills']) && !isset($_POST['delete_post'])) {
        // Sanitize inputs
        $name = sanitizeInput($_POST['name'] ?? '');
        $email = sanitizeInput($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $skills = sanitizeInput($_POST['skills'] ?? '');
        $experience = isset($_POST['experience']) && is_numeric($_POST['experience']) ? (int) $_POST['experience'] : null;
        $interest = sanitizeInput($_POST['interest'] ?? '');
        $mobile = isset($_POST['mobile']) && is_numeric($_POST['mobile']) ? (int) $_POST['mobile'] : null;
        $description = sanitizeInput($_POST['description'] ?? '');
        $mode = sanitizeInput($_POST['mode'] ?? '');

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into user_data table
        $stmt_user = $conn->prepare("INSERT INTO user_data (name, email, password, create_time) VALUES (?, ?, ?, NOW())");
        if (!$stmt_user) {
            die("Error preparing query: " . $conn->error);
        }
        $stmt_user->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt_user->execute()) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $hashed_password;

            // Create a user-specific table
            $user_table = "user_" . strtolower(str_replace(' ', '_', $name));
            createUserTable($conn, $user_table);

            // Insert all data into the user-specific table (initial empty data)
            $stmt_table = $conn->prepare(
                "INSERT INTO `$user_table` (name, email, password, skill, experience, interest, mode, mobile, description) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            if (!$stmt_table) {
                die("Error preparing query: " . $conn->error);
            }
            $stmt_table->bind_param("ssssissis", $name, $email, $hashed_password, $skills, $experience, $interest, $mode, $mobile, $description);

            if ($stmt_table->execute()) {
                echo '
            <style>
            .modal {
      border: none;
      border-radius: 8px;
      padding: 20px;
      background: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 300px;
    }

    .modal::backdrop {
      background: rgba(0, 0, 0, 0.3);
    }

    .modal-content h2 {
      text-align:center;
    }

    .close-btn {
      padding: 10px 20px;
      background-color: #f7ad19;
      color: black;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .close-btn:hover {
      background-color:rgb(251, 211, 131);
    }
            </style>
            <script>
          document.addEventListener(\'DOMContentLoaded\', function() {
              const modal = document.querySelector(\'#successModal\');
            //   console.log(\'this function is working \');
              
              modal.showModal();    
              const closeModal = document.querySelector(\'.close-btn\');
              
              // Close modal on button click
              closeModal.addEventListener(\'click\', () => {
                modal.close();
                // window.history.back();
                      window.location.href = \'../index.php\';


              });

              // Close modal on outside click
              modal.addEventListener(\'click\', (event) => {
                  if (event.target === modal) {
                      modal.close();
                      window.location.href = \'../index.php\';
                    // window.history.back();

                  }
              });
          });
 
      </script>
      <dialog class=\'modal\' id=\'successModal\'>
    <div class=\'modal-content\'>
      <h2>Registration Successfull</h2>
      <button class=\'close-btn\'>Close</button>
    </div>
  </dialog>
      ';

            } else {
                die("Error: " . $stmt_table->error);
            }
            $stmt_table->close();
        } else {
            die("Error: " . $stmt_user->error);
        }
        $stmt_user->close();
    }

    // Handle the additional skills form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_skills'])) {
        if (!isset($_SESSION['email'])) {
            echo "<script>
                alert('User not logged in');
                window.location.href = '../service/service.php';
                document.querySelector('.form-container').style.display='flex';
            </script>";
            exit;
        }

        $email = $_SESSION['email'];

        // Sanitize and validate input data
        $skills = sanitizeInput($_POST['skills'] ?? '');
        $experience = (int) $_POST['experience'];
        $interest = sanitizeInput($_POST['interest'] ?? '');
        $mobile = (int) $_POST['mobile'];
        $description = sanitizeInput($_POST['description'] ?? '');
        $mode = sanitizeInput($_POST['mode'] ?? '');

        if ((empty($skills) || empty($description) || empty($interest) || empty($mobile) || empty($description))) {
            echo "<script>
            alert('Whoops !!! Looks like you forgot to fill this out.');
            window.location.href = '../service/service.php';
        </script>";
        }else{

        // Get the user name from the user_data table
        $stmt_get_user = $conn->prepare("SELECT name FROM user_data WHERE email = ?");
        if (!$stmt_get_user) {
            die("Error preparing query: " . $conn->error);
        }
        $stmt_get_user->bind_param("s", $email);
        $stmt_get_user->execute();
        $result_user = $stmt_get_user->get_result();

        if ($result_user->num_rows === 0) {
            die("No user found with the given email.");
        }

        $user = $result_user->fetch_assoc();
        $name = $user['name'];
        $stmt_get_user->close();

        // Insert data into the user-specific table
        $user_table = "user_" . strtolower(str_replace(' ', '_', $name));
        $stmt_insert_skills = $conn->prepare(
            "INSERT INTO `$user_table` (name, email, password, skill, experience, interest,mobile, mode,  description) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        if (!$stmt_insert_skills) {
            die("Error preparing query: " . $conn->error);
        }

        $stmt_insert_skills->bind_param(
            "ssssisiss",
            $name,
            $email,
            $_SESSION['password'],
            $skills,
            $experience,
            $interest,
            $mobile,
            $mode,
            $description
        );
        if ($stmt_insert_skills->execute()) {
            echo '
            <style>
            .modal {
      border: none;
      border-radius: 8px;
      padding: 20px;
      background: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 300px;
    }

    .modal::backdrop {
      background: rgba(0, 0, 0, 0.3);
    }

    .modal-content h2 {
      text-align:center;
    }

    .close-btn {
      padding: 10px 20px;
      background-color: #f7ad19;
      color: black;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .close-btn:hover {
      background-color:rgb(251, 211, 131);
    }
            </style>
            <script>
          document.addEventListener(\'DOMContentLoaded\', function() {
              const modal = document.querySelector(\'#successModal\');
              console.log(\'this function is working \');
              
              modal.showModal();    
              const closeModal = document.querySelector(\'.close-btn\');
              
              // Close modal on button click
              closeModal.addEventListener(\'click\', () => {
                modal.close();
                window.history.back();
                //   window.location.href = \'../service/service.php\';

              });

              // Close modal on outside click
              modal.addEventListener(\'click\', (event) => {
                  if (event.target === modal) {
                      modal.close();
                    window.history.back();

                  }
              });
          });
      </script>
      <dialog class=\'modal\' id=\'successModal\'>
    <div class=\'modal-content\'>
      <h2>Post successfully added</h2>
      <button class=\'close-btn\'>Close</button>
    </div>
  </dialog>
      ';
            // echo "this works properly";
        } else {
            die("Error: " . $stmt_insert_skills->error);
        }
        $stmt_insert_skills->close();
    }
    }

   
    

} catch (Exception $e) {
    echo "Error: " . $e->getMessage()."<script>
        window.history.back();
    </script>";
    
}

$conn->close();
?>
