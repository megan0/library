<?php
  session_start();
  require 'db_conn.php';

  if(isset($_POST['llogarit'])){
     $id=$_POST['id'];
     $perq=$_POST['perqindje'];

     $sql="SELECT cmim FROM liber WHERE id=$id";
     $result = $conn -> query($sql);

     while($row = $result->fetch_assoc()){
         $cmimi_vj=$row['cmim'];
     }

     $cmim_u=$cmimi_vj-($cmimi_vj*$perq/100);

     echo $cmim_u;

  }


  if(isset($_POST['ulje'])){

    $id=$_POST['id'];
    $cmim=$_POST['cmimi'];
    $perq=$_POST['perqindje'];

    if($perq!=NULL){
      $sql="INSERT INTO ulje (id,cmim,perqindje) VALUES (?,?,?)";
      if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("iii",$id,$cmim,$perq);
        if($stmt->execute()){
          echo "sukses";
      }
      else{
          echo "gabim";
      }
    }
    else{
      echo "Gabim!".$conn->error;
    }

    }
    else{
      $sql="INSERT INTO ulje (id,cmim) VALUES (?,?)";
      if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("ii",$id,$cmim);
        if($stmt->execute()){
          echo "sukses";
      }
      else{
          echo "gabim";
      }
    }
    else{
      echo "Gabim!";
    }
    }


  }


  if(isset($_GET['fshi'])){
    $id=$_GET['fshi'];
    $sql="DELETE FROM ulje WHERE id= $id";
    
    $conn -> query($sql);
    header('location:ulje.php');

}
?>