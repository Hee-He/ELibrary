<title>Admin Login</title>
<link rel="stylesheet" href="../style.css?v=2">
<div class="loginform">
<form action="admin_process.php" method="post">
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo '<input type="hidden" id="username" name="username" value="' . htmlspecialchars($_SESSION['username']) . '">';
        echo '<label for="password">Password:</label><br>';
        echo '<input type="password" id="passwd" name="password" placeholder="Password" value="" required><br>';
        echo '<label for="email">E-mail:</label><br>';
        echo '<input type="email" name="email" id="email" placeholder="E-mail" value="" required>';
        echo '<a onclick="code()">send</a><br>';
        echo '<label for="password">Verification Code:</label><br>';
        echo '<input type="text" name="code" id="verificationCode" minlength="6" maxlength="6" required autocomplete="off" placeholder="Verification Code"><br>';
        echo '<p id="error"></p><br>';
        echo '<input type="submit" name="login" value="Login">';
    }
    ?>
</form>
</div>
<script>
    var myInput = document.getElementById("verificationCode");
    myInput.addEventListener("input", function() {
        // This function will be called whenever the text in the input changes
        var inputValue = myInput.value;
        var para = document.getElementById('error');
        if(inputValue.length < 6) {
            para.innerHTML = "Code too short";
            para.style.color = "red";
        } else{
            para.innerHTML = ""; // Clear the error message if code length is sufficient
        }
    });
function code() {
    var email = document.getElementById('email').value;
    var username = document.getElementById('username').value;
    
    if (email.trim() !== '') {
        console.log('Sending AJAX request for email:', email);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'send_verification.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                console.log('Response from PHP:', xhr.responseText);
                alert("Verification code has been sent to <" + email + ">\nIf you don't get any code, please check your email and try again!");
            }
        };
        xhr.send('email=' + encodeURIComponent(email) + '&username=' + encodeURIComponent(username));
    } else {
        alert('Please enter a valid email address.');
    }
}
</script>
