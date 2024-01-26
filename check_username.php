<?php
// Start the session
session_start();

// Assuming you have a database connection established
require('connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function checkUsername($username) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM tblstudents WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result_students = $stmt->get_result();

    $stmt = $conn->prepare("SELECT * FROM admin WHERE fullname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result_admin = $stmt->get_result();

    // Check if the username exists in tblstudents
    if ($result_students->num_rows > 0) {
        return 1;
    }
    // Check if the username exists in admin
    elseif ($result_admin->num_rows > 0) {
        return -1;
    } else {
        return 0; // Username not found in either table
    }
    $stmt->close();
}

if (isset($_POST['continue'])) {
    $username = $_POST['username'];

    // Use prepared statement to prevent SQL injection
    
    $result = checkUsername($username);
    if ($result== 1) {
        // Username exists, load login form
        $_SESSION['username'] = $username; // Store username in session
        header("Location: login_form.php");
    } elseif($result ==-1)
    {
        $_SESSION['username'] = $username;
        header('admin/dashboard.php');
    }
    else
    {
        // Username doesn't exist, load registration form
        $_SESSION['username'] = $username; // Store username in session
        header("Location: registration_form.php");
    }

    
}

$conn->close();
?>
