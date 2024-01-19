<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: index.php");
//     exit();
// }
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
    <link rel="stylesheet" href="C:\\xampp\\htdocs\\test\\style.css">
    <style>
    /* Style for the dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
      }
  
      /* Style for the dropdown button (username) */
      .dropdown-btn {
        padding: 10px;
        cursor: pointer;
        background-color: #f1f1f1;
        border: 1px solid #ddd;
      }
  
      /* Style for the dropdown content (hidden by default) */
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        z-index: 1;
      }
  
      /* Style for dropdown options */
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
  
      /* Change color on hover */
      .dropdown-content a:hover {
        background-color: #ddd;
      }
      ul li
      {
        cursor: pointer;
      }
      #issued
      {
        display: none;
      }
      table tr td
      {
          width: 8rem;
          height: 2rem;
          text-align: center;
      }
    </style>
</head>
<body>
    <ul>
        <li>View Books</li>
        <li>Request Books</li>
        <li onclick="Showtable()">Issued Books</li>
    </ul>
    <!-- Your dashboard content goes here -->
    <div class="dropdown">
  <div class="dropdown-btn" onclick="toggleDropdown()"> <?php echo $username; ?></div>
  <div class="dropdown-content" id="myDropdown">
    <a href="#">Change</a>
    <a href="#" onclick="Sure()">Logout</a>
  </div>
</div>
<div id="issued">
    <table border='2'>
        <tr>
            <td>Semester</td>
            <td>Book1</td>
            <td>Book2</td>
            <td>Book3</td>
            <td>Book4</td>
            <td>Book5</td>
        </tr>
        <tr>
        <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
        <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
        <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr></tr>

    </table>
</div>

<script>
    function Sure() 
    {
        var userConfirm = confirm("Are You Sure!");    
        if (userConfirm) {
            window.location.href = "newlogin.php";
            <?php 
            session_destroy();
            ?>
        }
    }
    function Showtable() 
    {
      var table = document.getElementById("issued");
      table.style.display = "block";
    }
  function toggleDropdown() {
    var dropdownContent = document.getElementById("myDropdown");
    dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.style.display === "block") {
          openDropdown.style.display = "none";
        }
      }
    }
  }
</script>
</body>
</html>
