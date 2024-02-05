<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    session_destroy();
    
    // Send a response if it's an AJAX request
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        echo json_encode(['status' => 'success']);
        exit();
    }
}

header("Location: ../newlogin.php");
exit();
?>
