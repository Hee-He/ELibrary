<?php
session_start();
require('../connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verificationCode = $_POST['code'];

    // Check if the verification code matches the one sent to the user
    if ($_SESSION['verificationCode'] == $verificationCode) {
        $query = "SELECT * FROM admintable WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && password_verify($password, $row['password'])) {
            // Login successful, redirect to dashboard
            $_SESSION['username'] = $username; //set the $_SESSION['username'] given by user
            header("Location: dashboard.php");
            exit(); // Ensure no further code execution after the redirection
        } else {
            // Login failed, redirect back to login form
            unset($_SESSION['verificationCode']); //unset the Verification code if user submit form with wrong password
            $_SESSION['username'] = $username;
            echo '<script>alert("Invalid Password"); window.location.href = "adminlogin.php";</script>';
            exit(); // Ensure no further code execution after the redirection
        }
    } else {
        unset($_SESSION['verificationCode']); // unset verification code if user provide wrong verification code
        echo '<script>alert("Invalid verification code."); window.location.href = "adminlogin.php";</script>';
    }

    $stmt->close();
}

$conn->close();
?>
