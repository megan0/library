<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    session_unset();
    session_destroy();
    header("location:home.php");
    exit();
}else header("location:home.php");
?>