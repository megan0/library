<?php
session_start();
    require 'db_conn.php';



  if(isset($_POST['regjisstro'])){
      $titull= $_POST['titull'];
      $zhanri=$_POST['zhanri'];
      $autor=$_POST['autor'];
      $viti=$_POST['viti'];
      $sh_bot=$_POST['sh_bot'];
      $cmim=$_POST['cmim'];
      $pershkrim=$_POST['pershkrim'];

        $target_dir = 'foto/liber/';
        $target_file = $target_dir.$titull.'.jpg';
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;


        $check = getimagesize($_FILES['foto']['tmp_name']);
            if($check !== false) {
                $uploadOk = 1;
            } 
            else {
                $uploadOk = 0;
            }

            if($imageFileType !='jpg'){
                $uploadOk = 0;
            }


            if ($uploadOk == 0) {
                echo "Foto nuk mund te uplodohet.";
            }
            else {
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

                    $sql1= "SELECT id from autor where emer_mb=?;";
                    if($stmt = $conn->prepare($sql1)){

                        $stmt->bind_param("s",$autor);
                        if($stmt->execute()){
                            $stmt->store_result();
                            if($stmt->num_rows > 0){                    

                            $stmt->bind_result($id_autor);
                            if($stmt->fetch()){

                                $sql= "INSERT INTO liber (titull,zhanri,autor,viti,shtepi_botuese,cmim,pershkrim) VALUES (?,?,?,?,?,?,?);";
                                if($stmt1 = $conn->prepare($sql)){
                                    $stmt1->bind_param("ssiisis",$titull,$zhanri,$id_autor,$viti,$sh_bot,$cmim,$pershkrim);
                                    if($stmt1->execute()){
                                        echo "sukses";
                                    }
                                    else{
                                        echo "Ka ndodhur nje gabim ne procesim.";
                                    }


                                }


                            }
                        }
                        else{
                            echo "Autori nuk gjendet. Ju lutem kontrolloni te dhenat ose regjistroni fillimisht autorin.";
                        }
                        }
                        else{
                            echo "Ka ndodhur nje gabim ne procesim.";
                        }
                        
                    }
                }
                else {
                    echo "Foto nuk mund te uplodohet.";
                }
            }

  

    }


    if(isset($_POST['ndrysho'])){
      $titull= $_POST['titull'];
      $zhanri=$_POST['zhanri'];
      $autor=$_POST['autor'];
      $viti=$_POST['viti'];
      $sh_bot=$_POST['sh_bot'];
      $cmim=$_POST['cmim'];
      $pershkrim=$_POST['pershkrim'];
      $id=$_POST['id'];


      $sqltit="SELECT titull FROM liber WHERE id=$id;";
      $result = $conn -> query($sqltit);
      $row = $result->fetch_assoc();
      $titull_vj=$row['titull'];

      $target_dir = 'foto/liber/';
      $target_file_new = $target_dir.$titull.'.jpg';
      $target_file = $target_dir.$titull_vj.'.jpg';
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk = 1;

      if(empty($_FILES['foto']['tmp_name']) || (!is_uploaded_file($_FILES['foto']['tmp_name']))){
          
          $sql="UPDATE liber SET titull=?, zhanri=?, autor=?, viti=?, shtepi_botuese=?, cmim=?, pershkrim=? WHERE id=$id;";
          if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssiisis",$titull,$zhanri,$autor,$viti,$sh_bot,$cmim,$pershkrim);
            if (file_exists($target_file)) {
                rename($target_file, $target_file_new);
            }
            if($stmt->execute()){
                echo "sukses";
            }
            else{
                echo 'Gabim!';
            }

          }
          else{
            echo 'Gabimm!';
        }


      }
      else{
        
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $check = getimagesize($_FILES['foto']['tmp_name']);
            if($check !== false) {
                $uploadOk = 1;
            } 
            else {
                $uploadOk = 0;
            }

            if($imageFileType !='jpg'){
                $uploadOk = 0;
            }


            if ($uploadOk == 0) {
                echo "Foto nuk mund te uplodohet.";
            } 
            else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file_new)) {
                    $sql="UPDATE liber set titull=?,zhanri=?,autor=?,viti=?,shtepi_botuese=?,cmim=?,pershkrim=? where id=$id";
                    if($stmt = $conn->prepare($sql)){
                      $stmt->bind_param("ssiisis",$titull,$zhanri,$autor,$viti,$sh_bot,$cmim,$pershkrim);
                      if($stmt->execute()){
                          echo "sukses";
                      }
                      else{
                          echo "gabim";
                      }
          
                    }
                    else{ echo "Gabim!";}

               echo "sukses";

            }
            else {echo "Gabim!";}
            }
        }
      
    }

    if(isset($_GET['fshi'])){
        $id=$_GET['fshi'];
        $sql="DELETE FROM liber WHERE id= $id";
        
        $sql1="SELECT titull FROM liber WHERE id=$id;";
        $result = $conn -> query($sql1);
        $row = $result->fetch_assoc();
        $titull=$row['titull'];
        
        $target_dir = 'foto/liber/';
        $target_file = $target_dir.$titull.'.jpg';
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        $conn -> query($sql);
        header('location:menaxho_liber.php');

    }



    




?>