<?php
session_start();
require('connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM tblstudents WHERE username = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($query);
    
    // Bind parameters
    $stmt->bind_param("s", $username);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch the row
    $row = $result->fetch_assoc();
    if ($row && password_verify($password, $row['password'])) {
        // Login successful, redirect to dashboard
        $_SESSION['username'] = $username;
        header("Location: dash.php");
        exit(); // Ensure no further code execution after the redirection
    } else {
        // Login failed, redirect back to login form
        
        header("Location: login_form.php");
        exit(); // Ensure no further code execution after the redirection
    }

    $stmt->close();
}

$conn->close();
?>