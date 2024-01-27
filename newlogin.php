<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
    <div class="loginform">
        <form name="login" action="check_username.php" method="post" onsubmit="return check()">
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off"><br>
            <p id="message"></p>
            <input type="submit" name="continue" value="Sign In or Sign Up">
        </form>
    </div>
</body>
<script>
    function check() 
    {   
        var username = document.forms["login"]["username"].value;
            if (username == "") {
                document.getElementById('message').innerHTML = "Username required!";
                // alert("Username must be filled out");
                return false;
            }
    }
</script>
</html>
