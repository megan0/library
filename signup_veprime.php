<?php

session_start();

include 'db_conn.php';


if(isset($_POST['username_check'])){
    $username = $_POST['username'];
  	$sql = "SELECT * FROM users WHERE username='$username'";
  	$results = $conn->query($sql);
  	if ($result->num_rows > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
}

if(isset($_POST['regjistrohu'])){
    $emri=$_POST['emri'];
    $mbiemri=$_POST['mbiemri'];
    $username = $_POST['username'];
    $password=$_POST['pass1'];

    $p_hash=password_hash($password, PASSWORD_DEFAULT);

    $sql= "INSERT INTO perdorues (username,pass,emer,mbiemer) VALUES (?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$username,$p_hash,$emri,$mbiemri);
    if($stmt->execute()){
        echo'sukses';
    }
    else{
        echo 'error';
    }



    $stmt->close();
    exit();
}



?>