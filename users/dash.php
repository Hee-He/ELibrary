<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../newlogin.php");
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php
      if(isset($_SESSION['username']))
        { 
          echo $username;
        }
        else {
          echo 'Dashboard';
        }
        ?>
        </title>
    <link rel="stylesheet" href="assets/css/style.css?v=4">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5e5a38d260.js" crossorigin="anonymous"></script>
</head>
<body>

    <ul>
        <li>View Books</li>
        <li onclick="booklist()">Request Books</li>
        <li onclick="Showtable()">Issued Books</li>
    </ul>
<br>
<div class="dropdown">
    <div class="dropdown-btn" onclick="toggleDropdown()"> <?php echo $username; ?>
    </div>
    <div class="dropdown-content" id="myDropdown">
        <a href="#">Change</a>
        <a href="#" onclick="Sure()">Logout</a>
    </div>
</div>
<div class="container">
        <div class="books">
        <select id="dropdown">
        <option disabled selected default hidden>Choose Semester</option>
                <option value="First">I</option>
                <option value="Second">II</option>
                <option value="Third">III</option>
                <option value="Forth">IV</option>
                <option value="Fifth">V</option>
                <option value="Sixth">VI</option>
                <option value="Seventh">VII</option>
                <option value="Eight">VIII</option>
        <!-- Add more options as needed -->
    </select>
        </div>
    </div>
    <br>
    <div id="output"></div>
<div id="issued">
    <?php
        require('issuedbook.php');
    ?>
</div>

</body>
<script src="assets/js/script.js?v=2"></script>
</html>
