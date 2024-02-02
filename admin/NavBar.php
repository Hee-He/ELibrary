<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/5e5a38d260.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="nav-bar">
    <div class="icon">
        <i title="menu" class="fas fa-bars" onclick="toggleNav(event)"></i>
        <i title="close" class="fas fa-xmark" onclick="toggleNav(event)"></i>
    </div>
    <div class="container">
        <ul class="menubar">
            <li><a href="addbooks.php" data-text="Add Books" >Add Books</a></li>
            <li><a href="addbooks.php" name="delete" data-text="Remove Books">Remove Books</a></li>
            <li><a href="../templetes/booklist.php" data-text="Books List">Books List</a></li>
            <li><a href="" data-text="Issued Books">Issued Books</a></li>
            <li><a href="students.php" data-text="Students">Students</a></li>
        </ul>
    </div>
</div>


</div>
</body>
<script src="assets/js/script.js"></script>
</html>