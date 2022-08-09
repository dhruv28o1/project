<?php
require "../db_connect.php";
$update="UPDATE stud_register SET `status`=1 WHERE `id`='$id';";
$conn->query($update);