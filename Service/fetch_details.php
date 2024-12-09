<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "12345678"; // Replace with your database password
$dbname = "user_schema"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT skill, name,email,mobile, description, interest, mode FROM user_data";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">
                <div class="contact-details">
                    <div class="card-skill">
                        <h2>' . htmlspecialchars($row['skill']) . '</h2>
                    </div>
                    <div class="card-name">
                        <h3>Name:</h3>
                        <p>' . htmlspecialchars($row['name']) . '</p>
                    </div>
                    <div class="card-email">
                        <h3>Email :</h3>
                        <p>' . htmlspecialchars($row['email']) . '</p>
                    </div>
                   
                    <div class="card-desc">
                        <h3>Description:</h3>
                        <p>' . htmlspecialchars($row['description']) . '</p>
                    </div>
                    <div class="card-exchange">
                        <h3>Exchange:</h3>
                        <p>' . htmlspecialchars($row['interest']) . '</p>
                    </div>
                    <div class="card-mode">
                        <h3>Mode:</h3>
                        <p>' . htmlspecialchars($row['mode']) . '</p>
                    </div>
                    
                </div>
            </div>';
    }
} else {
    echo "<center><h3>No Post available.</h3></center>";
}

// Close connection
$conn->close();
?>
