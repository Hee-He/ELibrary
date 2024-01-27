<?php
session_start();
require('../connect.php');
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendVerificationCode($email, $username)
{
    // Generate a more secure verification code
    $verificationCode = random_int(100000, 999999);

    // Store the verification code in the session for comparison later
    $_SESSION['verificationCode'] = $verificationCode;

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bcabmc72@gmail.com'; // Replace with your Gmail address
        $mail->Password   = 'afra engg ejjs giod '; // Replace with your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients i.e {To and From}
        $mail->setFrom('bcabmc72@gmail.com', 'bca bmc');
        $mail->addAddress($email);

        // Content of the body of mail
        $mail->isHTML(true);
        $mail->Subject = 'Verification Code';
        $mail->Body    = "Hello $username, your verification code is: $verificationCode";

        // Send the email
        $mail->send();

        echo "Verification code sent to $email. Check your email.";
    } catch (Exception $e) {
        echo 'Error sending verification code. Please try again later. ', $e->getMessage();
    }
}
// This block 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['username'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $username = htmlspecialchars($_POST['username']);

        $query = "SELECT emailid FROM admintable WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['emailid'] == $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                sendVerificationCode($email, $username);
            }
        } else {
            echo '<script>alert("Invalid Email"); window.location.href = "adminlogin.php";</script>';
        }
    } else {
        echo 'Email or username not provided in the form.';
    }
}
?>
