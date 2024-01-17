<?php
// Assuming you have a database connection established
require('connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact_no = $_POST['contact_no'];

    // Insert new user into the database
    $query = "INSERT INTO tblstudents (username, emailid, password, mobilenumber) VALUES ('$username', '$email', '$password', '$contact_no')";
    
    if ($conn->query($query) === TRUE) {
        // Registration successful, redirect to dashboard
        $_SESSION['username'] = $username; // Store username in session
        header("Location: dash.php");
    } else {
        // Registration failed, handle error (redirect or display an error message)
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
