<title>Registration Form</title>
<link rel="stylesheet" href="style.css?v=2">
<div class="loginform">
    <form action="register_user.php" method="post">
        <?php
            session_start();
            // Check if the username is set in the session
            if (isset($_SESSION['username'])) {
                $username = htmlspecialchars($_SESSION['username']);
                echo '<input type="hidden" name="username" value="' . $username . '">';
            }
        ?>
        <label for="email">Email:</label><br>
        <input type="email" name="email" required placeholder="E-mail"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="passwd" name="password" required placeholder="Password"><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" name="confirm_password" required placeholder="Re-type Password"><br>
        <label for="contact_no">Contact No:</label><br>
        <input type="text" name="contact_no" required><br>
        <input type="checkbox" name="showpassword" id="showpassword" onclick="showpasswd()">Show Password<br>   
        <input type="submit" name="login" value="Register">
    </form>
</div>
    <script>
        function showpasswd() {
            var chk = document.getElementById("showpassword").checked;
            let passwd = document.getElementById("passwd");
            if (chk == true) {
                passwd.type = "text";
            } else {
                passwd.type = "password";
            }
        }
    </script>
</body>
</html>
