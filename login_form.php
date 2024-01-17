<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="login_process.php" method="post">
        <?php
            // Check if the username is set in the session
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<input type="hidden" name="username" value="' . htmlspecialchars($_SESSION['username']) . '">';
            }
        ?>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
