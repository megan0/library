<?php
include 'db_conn.php';


if(isset($_POST['username_check'])){
    $username = $_POST['username'];
  	$sql = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
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

    $sql= mysqli_prepare($conn,"INSERT INTO perdorues (username,pass,emer,mbiemer) VALUES (?,?,?,?);");
    mysqli_stmt_bind_param($sql, "ssss",$username,$p_hash,$emri,$mbiemri,);
    if(mysqli_stmt_execute($sql)){
        echo'sukses';
    }
    else{
        echo 'error';
    }



    mysqli_stmt_close($sql);
    exit();
}



?>