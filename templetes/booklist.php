<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=2">
    <style>
        body {
            overflow: hidden; /* Prevent scrolling when .editOrDelete is displayed */
            transition: filter 0.3s ease;
        }

        .blur-background {
            filter: blur(5px); /* Adjust the blur intensity as needed */
        }


    </style>
</head>
<body>
    <?php 
    session_start();
    if (isset($_SESSION['status']) && $_SESSION['status']=== true) {
        $status = $_SESSION['status'];
        echo '<div id="notification" class="notification">Book added successfully!</div>';

    }
    unset($_SESSION['status']);
    ?>
    <div class="filter">
        <form>
            <input type="text" placeholder="Book Name / Author">
            
        </form>
    </div>
    <div class="editOrDelete">
        <form method="post">
            <p id="close">+</p><br>
            <input type="text"><br>
            <input type="checkbox" name="" id=""><br>
            <input type="checkbox" name="" id=""><br>
            <input type="checkbox" name="" id="">
        </form>
    </div>
    <table border='2'>
        <tr>
            <td>Book Name</td>
            <td>Semester</td>
            <td>Author</td>
            <td>No. of Books</td>
            <td>Added Date</td>
            <td>Activity</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button onclick="showhide()">Edit</button></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Edit</button></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Edit</button></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Edit</button></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Edit</button></td>
        </tr>
    </table>
</body>

<script>
// JavaScript to handle the display and disappearance of the notification
function showhide() {   
        var showhide = document.querySelector(".editOrDelete");
        showhide.style.display = "block";  
        
        // Add blur class to the body
        document.body.style.filter = "5px";
        
        // Remove blur from the .editOrDelete element
        showhide.style.filter = "none";
    }
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