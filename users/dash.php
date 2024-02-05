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
    <link rel="stylesheet" href="assets/css/style.css?v=2">
    <style>
    
    </style>
</head>
<body>
    <ul>
        <li>View Books</li>
        <li onclick="booklist()">Request Books</li>
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
<?php
echo $username;
require('../database/connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM issuedbook");
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;

if ($rows === 0) {
    echo "<h1>No Issued Books</h1>";
} else {
    echo ("<table border='2'>
        <tr>
            <td>Semester</td>
            <td>Books</td>
            <td>Issued Date</td>
            <td>Return Date</td>
        </tr>");

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row['semester'] . "</td>
            <td>" . $row['book1'] . "<br>" . $row['book2'] . "<br>" . $row['book3'] . "<br>" . $row['book4'] . "<br>" . $row['book5'] . "</td>
            <td>" . $row['issuedate'] . "</td>
            <td class='danger'>" . $row['returndate'] . "</td>
        </tr>";
    }
    $stmt = $conn->prepare("SELECT *, DATEDIFF(returndate, issuedate) AS date_difference FROM issuedbook");
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $dateDifference = $row['date_difference'];
        if ($dateDifference < 10) {
          echo '<script>alert("Less than ' . $dateDifference . ' days remaining");</script>';
            echo "<style> .danger{background-color: red;}</style>";
        }
    }
    
  
}  
$conn->close();
?>

</div>
<div class="container">
<div class="books">
    <form action="requestbook.php" method="post">
        <select name="semester" id="">
          <option disabled selected default hidden>Choose Semester</option>
          <option value="First">I</option>
          <option value="Second">II</option>
          <option value="Third">III</option>
          <option value="Forth">IV</option>
          <option value="Fifth">V</option>
          <option value="Sixth">VI</option>
          <option value="Seventh">VII</option>
          <option value="Eight">VIII</option>
        </select><br>
        <input type="submit" value="Request">
    </form>
</div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
