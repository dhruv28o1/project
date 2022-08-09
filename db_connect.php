<?php
error_reporting();
$servername = "localhost";
$username = "root";
$password = "";
$db="admission_db";//change database name

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}