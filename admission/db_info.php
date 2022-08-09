<?php session_start(); ?>
<?php
if (isset($_SESSION['id'])) {
    if (isset($_POST['add_user'])) {
        require "variable.php";
        // Create connection    
        require "../db_connect.php";

        // Check connection
        if ($conn->connect_error) {
            echo "<script>alert('error');</script>";
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO student_info (`sno`, `first_name`, `Last_name`,`picture`, `dob`, `gender`, `category`, `religion`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `income`, `number`) 
        VALUES ('$id', '$first_name', '$last_name','$image', '$dob', '$gender', '$catogery', '$religion', '$father_name', '$father_occupation', '$mother_name', '$mother_occupation', '$income', '$number')";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            include "status.php";
            header("location:end.php");
        }
    }

    //if not set post
    else
        header("location:form.html");
} else
    header("location:../student/index.php");


?>