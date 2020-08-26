<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
require_once "db_conn.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $_SESSION["username_err"] = "Please enter username.";
        header("location:login.php");
    } else{
        $username = ($_POST["username"]);
    }

    if(empty($_POST["pass"])){
        $_SESSION["password_err"] = "Please enter your password.";
        header("location:login.php");
    } else{
        $password = ($_POST["pass"]);
    }

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password,roli FROM perdorues WHERE username = ? ";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($id, $username, $hashed_password ,$roli);
                    if($stmt->fetch()){
                        if(password_verify ( $password , $hashed_password )){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["roli"] = $roli;                            
                            header("location: home.php");

                        } else{
                            // Password gabim
                            $_SESSION["password_err"] = array("Password gabim.");
                            header("location:signin.php");
                        }
                    }
                } else{
                    $_SESSION["username_err"] = array("Username gabim.");
                    header("location:signin.php");
                }
            } else{
                //Gabim ne query
                $_SESSION["sql_err"] =array("Oops gabim gjate procedimit.");
                header("location:signin.php");
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}


?>
