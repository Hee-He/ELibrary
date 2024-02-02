<?php
require('../database/connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addbook'])) {
    $BooksName = $_POST['bookname'];
    $author = $_POST['author'];
    $semester = $_POST['semester'];

    $res = checkBook($conn, $BooksName, $author, $semester);

    if ($res === true) {
        $insertBook = "INSERT INTO tblbooks(bookname, author, semester) VALUES (?,?,?)";
        $stmt = $conn->prepare($insertBook);
        $stmt->bind_param("sss", $BooksName, $author, $semester);
        $rst = $stmt->execute();

        if ($rst) {
            $_SESSION['status'] = true;
            header("Location: ../templetes/booklist.php");
            exit();
        } else {
            $_SESSION['error'] = "Error while inserting the book. Please try again.";
            header("Location: addbooks.php");
            exit();
        }
    } else if ($res === false) {
        $_SESSION['error'] = "Book already exists in the database.";
        header("Location: addbooks.php");
        exit();
    } else {
        $_SESSION['error'] = true;
        header("Location: addbooks.php");
        exit();
    }
}

function checkBook($conn, $BooksName, $author, $semester)
{
    $search = "SELECT * FROM tblbooks WHERE semester=? AND bookname=? AND author=?";
    $stmt = $conn->prepare($search);
    $stmt->bind_param("sss", $semester, $BooksName, $author);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return false; // Book already exists
    }

    return true; // Book does not exist
}

?>
