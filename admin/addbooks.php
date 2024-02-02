<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <link rel="stylesheet" href="assets/css/style.css?v=2">
</head>
<body>
    <div>
        <?php 
        session_start();
        if(isset($_SESSION['error']) && $_SESSION['error'])
        {
            echo '<div id="notification" class="notification">Failed to add books</div>';
            unset($_SESSION['error']);
        }
        ?>
    <form method="POST" action="booksprocess.php" id="addform" onsubmit="">
        <h1>Addbooks</h1>
        <input type="text" name="bookname" required placeholder="Book Name"><br>
        <select name="semester">
            <option value="Choose Semester" disabled selected hidden>Choose Semester</option>
            <option value="First">I</option>
            <option value="Second">II</option>
            <option value="Third">III</option>
            <option value="Forth">IV</option>
            <option value="Fifth">V</option>
            <option value="Sixth">VI</option>
            <option value="Seventh">VII</option>
            <option value="Eight">VIII</option>
        </select><br>
        <input type="text" name="author" placeholder="Author Name" required><br>
        <input type="submit" name="addbook" value="Add Book">

    </form>
</div>


    <form method="POST" action="booksprocess.php" id="delform" onsubmit="">
    </form>
</body>
<script src="assets/js/script.js"></script>
<script>
// JavaScript to handle the display and disappearance of the notification
document.addEventListener('DOMContentLoaded', function() {
    var notification = document.getElementById('notification');

    // Display the notification
    notification.style.display = 'block';

    // Set a timeout to hide the notification after 3000 milliseconds (3 seconds)
    setTimeout(function() {
        notification.style.display = 'none';
    }, 3000);
});
</script>
</html>