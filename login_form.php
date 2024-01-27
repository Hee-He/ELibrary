<title>Registeration Form</title>
<link rel="stylesheet" href="style.css?v=2">



<div class="loginform">
    <form action="login_process.php" method="post">
        <?php
            // Check if the username is set in the session
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<input type="hidden" name="username" value="' . htmlspecialchars($_SESSION['username']) . '">';
                echo '<label for="password">Password:</label><br>';
                echo '<input type="password" name="password" placeholder="Password" value="" required><br>';
                echo '<input type="submit" name="login" value="Login">';
            }
        ?>        
    </form>
</div>

<!-- <style>
    #Form
    {
        height: fit-content;
        border: 0.1rem solid black;
        width: fit-content;
        align-items: center;
        justify-content: center;
        position: absolute;
        left: 40%;
        top: 35%;
        background-color: antiquewhite;
        border-radius: 0.6rem;
    }
    input[type="passowrd"]
    {
        margin: 0.5rem;
        outline: none;
        width:10rem;
        position: relative;
        border-radius: 0.2rem;
        height: 3rem;
    }
    input[type="password"]::placeholder
    {
        color: aqua;
    }
</style> -->
