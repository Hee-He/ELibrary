

<?php
if (isset($_POST['option'])) {
    $selectedOption = $_POST['option'];
    
    require('../database/connect.php');

    $stmt = $conn->prepare("SELECT * FROM tblbooks WHERE semester = ?");
    $stmt->bind_param("s", $selectedOption);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data in a table format
        echo '<form method="post" action="handle_form_submission.php">';
        while ($row = $result->fetch_assoc()) {
            // Properly concatenate the bookname within the echo statement
            echo '<label class="checkbox-container">';
            echo "<input type='checkbox' name='selected_books[]' value='" . $row['bookname'] . "' class='styled-checkbox'>" . $row['bookname'];
            echo '<span class="checkmark"></span>';
            echo '</label><br>';
        }
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    } else {
        echo "No books found for the selected semester.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>

