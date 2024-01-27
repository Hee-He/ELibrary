<?php

// Function to generate a random verification code
function generateVerificationCode($length = 6) {
    return substr(str_shuffle("0123456789"), 0, $length);
}

// Recipient's email address
$to_email = 'hembarabin8@gmail.com';

// Subject of the email
$subject = 'Verification Code';

// Generate a verification code
$verificationCode = generateVerificationCode();

// Message body
$message = 'Your verification code is: ' . $verificationCode;

// Additional headers
$headers = 'From: your@gmail.com' . "\r\n" .
    'Reply-To: your@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Send the email
$mailSent = mail($to_email, $subject, $message, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    echo json_encode(['success' => true, 'message' => 'Verification code sent successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error sending verification code. Please try again later.']);
}

?>
