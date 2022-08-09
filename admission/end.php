<?php
session_start();
if (isset($_SESSION['id'])) {
    require "../db_connect.php";
    $id = $_SESSION['id'];
    $select = "SELECT * FROM student_info WHERE sno='$id'";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    $image = 'data:image/jpg;base64,' . $row['picture'];
    session_destroy(); //destroy session
    require "preview.php";
} else {
    header('location:../student/index.php');
}