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
    <!-- <button onclick="shownav()">asdasdad</button> -->
    
    <div class="container">
        <ul class="menubar">
            <li><a href="" data-text="Add Books" >Add Books</a></li>
            <li id="category"><a disabled data-text="Category">Category</a>
            <ul  class="hover-menu">
                <li class="menu-item item--a"><a href="bookname.php" class="item--a">Name</a></li>
                <li class="menu-item item--b"><a href="authors.php" class="item--b">Authors</a></li>
                <li class="menu-item item--b"><a href="semester.php" class="item--c">Semester</a></li>
            </ul>
            <li><a href="" data-text="Issued Books">Issued Books</a></li>
            <li><a href="students.php" data-text="Students">Students</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>
</div>
<div class="menu-container">
    <div class="icon">
        <i title="menu" class="fas fa-bars" onclick="toggleNav(event)"></i>
        <i title="close" class="fas fa-xmark" onclick="toggleNav(event)"></i>
    </div>
  <ul class="vertical-nav">
    <li>
      <a href="#"><i data-feather="activity"></i>Add Books</a>
    </li>
    <li>
      <a href="#"><i data-feather="box"></i></a>
      <div class="hover-menu">
        <ul>
          <li><a href="#">Menu Item</a></li>
          <li><a href="#">Menu Item</a></li>
          <li><a href="#">Menu Item</a></li>
          <li class="menu-header">OTHER</li>
          <li><a href="#">Menu Item</a></li>
          <li><a href="#">Menu Item</a></li>
        </ul>
      </div>
    </li>
    <li>
      <a href="#"><i data-feather="cloud"></i></a>
      
    </li>
    <li>
      <a href="#"><i data-feather="database"></i></a>
      
    </li>
    <li>
      <a href="#"><i data-feather="inbox"></i></a>
      
    </li>
    <li>
      <a href="#"><i data-feather="package"></i></a>
      
    </li>
    <li>
      <a href="#"><i data-feather="user"></i></a>
      
    </li>
    
  </ul>
</div>
</body>
<script src="assets/js/script.js"></script>
</html>