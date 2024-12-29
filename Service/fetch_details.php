<?php

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

    // Check if user is logged in
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Fetch the name of the logged-in user
        $stmt = $conn->prepare("SELECT name FROM user_data WHERE email = ?");
        if (!$stmt) {
            die('SQL Error: ' . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
        } else {
            echo "<center><h3>User not found.</h3></center>";
        }

        $stmt->close();

        // Create the user's specific table name
        $user_table = "user_" . strtolower(str_replace(' ', '_', $name));

        // Handle post deletion request
        if (isset($_GET['id'])) {
            $post_id = $_GET['id'];

            // Delete the post from the user-specific table
            $stmt_delete = $conn->prepare("DELETE FROM `$user_table` WHERE id = ?");
            if (!$stmt_delete) {
                die("Error preparing delete query: " . $conn->error);
            }
            $stmt_delete->bind_param("i", $post_id);

            if ($stmt_delete->execute()) {
                // Show the modal with a confirmation message
                echo '<script>
                alert("This post is deleted");
                window.history.replaceState(null, null, window.location.pathname);
                </script>';
                // $stmt_delete->close();
                header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
                // exit;

            } else {
                echo "Error deleting post: " . $stmt_delete->error;
            }
            $stmt_delete->close();
        }

        // Fetch posts from the user's specific table
        $sql = "SELECT id, skill, name, email, mobile, experience, description, interest, mode FROM $user_table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $rows = array_reverse($rows);

            foreach ($rows as $row) {
                // Display post information
                echo '
<div class="card">
    <div class="contact-details">
        <div class="head">
            <h2>' . strtoupper(htmlspecialchars($row['skill'])) . '</h2>
            <div class="card-desc">
                <p>' . htmlspecialchars($row['description']) . '</p>
            </div>
        </div>
        <div class="title">
            <div class="card-name">
                <h3>Name:</h3>
                <p>' . htmlspecialchars($row['name']) . '</p>
            </div>
            <div class="card-exchange">
                <h3>Exchange:</h3>
                <p>' . htmlspecialchars($row['interest']) . '</p>
            </div>
            <div class="card-mode">
                <h3>Mode:</h3>
                <p>' . htmlspecialchars($row['mode']) . '</p>
            </div>
            <div class="card-experience">
                <h3>Experience:</h3>
                <p>' . htmlspecialchars($row['experience']) . ' years</p>
            </div>
            <div class="onclick">
                <div class="card-more">
                    <h3>About:</h3>
                    <p>' . htmlspecialchars($row['description']) . '</p>
                </div>
                <div class="card-mobile">
                    <h3>Contact:</h3>
                    <p>+91-' . htmlspecialchars($row['mobile']) . '</p>
                </div>
                <div class="card-email">
                    <h3>Email:</h3>
                    <p>' . htmlspecialchars($row['email']) . '</p>
                </div>
                <div class="delete">
        <form action="' . $_SERVER['PHP_SELF'] . '" method="get">
            <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
            <button type="submit" name="delete_post" value="delete" class="delete-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#EA3323">
                    <path d="M267.33-120q-27.5 0-47.08-19.58-19.58-19.59-19.58-47.09V-740H160v-66.67h192V-840h256v33.33h192V-740h-40.67v553.33q0 27-19.83 46.84Q719.67-120 692.67-120H267.33Zm425.34-620H267.33v553.33h425.34V-740Zm-328 469.33h66.66v-386h-66.66v386Zm164 0h66.66v-386h-66.66v386ZM267.33-740v553.33V-740Z"/>
                </svg>
            </button>
        </form>
    </div>
            </div>
        </div>
       <button onclick="openDetails(event)" class="open-detail-btn" >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/>
                        </svg>
                    </button>
    </div>
    
</div>';

            }
        } else {
            echo " 
            <div class='no-post-error-container'>
            <img src='../Assets/no_post_error.jpg' alt='error image' class='no-post-error'>
            <center><h3>No posts available.</h3></center>
            </div>
            <button class='no-post' onclick='noPost()'> Click to Create new post</button>
            <script>closeSliderBtn();</script>
            ";
        }


    } else {
        echo "<center><h3>Please log in to view Posts.</h3></center>";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>