<?php
// Start the session
session_start();

// Assuming you have a database connection established
require('connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['continue'])) {
    $username = $_POST['username'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM tblstudents WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username exists, load login form
        $_SESSION['username'] = $username; // Store username in session
        header("Location: login_form.php");
    } else {
        // Username doesn't exist, load registration form
        $_SESSION['username'] = $username; // Store username in session
        header("Location: registration_form.php");
    }

    $stmt->close();
}

$conn->close();
?>
