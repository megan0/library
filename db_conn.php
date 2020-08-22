<?php
$servername   = "localhost";
$database = "librari";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);

$test ="test";
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>