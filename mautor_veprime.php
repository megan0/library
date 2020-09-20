<?php

session_start();
    require 'db_conn.php';

    if(isset($_POST['regjisstro'])){
        $emer=$_POST['emer'];
        $pershkrim=$_POST['pershkrim'];
        $libra=$_POST['me_te_lex'];
        #$foto=$_FILES['foto']['name'];


        $target_dir = 'foto/autor/';
        $target_file = $target_dir.$emer.'.jpg';
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
                $sql= "INSERT INTO autor (emer_mb,pershkrim,librat_me_lex) VALUES (?,?,?);";
                if($stmt = $conn->prepare($sql)){
        
                    $stmt->bind_param("sss",$emer,$pershkrim,$libra);
                    if($stmt->execute()){
                        echo "sukses";
                    }
                    else{
                        echo "Ka ndodhur nje gabim ne procesim.";
                    }
        
                }
                else{
                    echo "Ka ndodhur nje gabim ne procesim.";
                }
                
            } else {
                echo "Foto nuk mund te uplodohet.";
            }
          }



       

    }


    if(isset($_POST['ndrysho'])){
        $emer=$_POST['emer'];
        $pershkrim=$_POST['pershkrim'];
        $libra=$_POST['me_te_lex'];
        $id=$_POST['id'];


        if(empty($_FILES['foto']['tmp_name']) || (!is_uploaded_file($_FILES['foto']['tmp_name']))){
          
            $sql="UPDATE autor SET emer=?, pershkrim=?, librat_me_lex=? WHERE id=$id;";
            if($stmt = $conn->prepare($sql)){
              $stmt->bind_param("sss",$emer,$pershkrim,$libra);
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
            $target_dir = 'foto/autor/';
            $target_file = $target_dir.$emer.'.jpg';
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $uploadOk = 1;
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
                    
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                        $sql="UPDATE autor SET emer=?, pershkrim=?, librat_me_lex=? WHERE id=$id;";
                        if($stmt = $conn->prepare($sql)){
                          $stmt->bind_param("sss",$emer,$pershkrim,$libra);
                          if($stmt->execute()){
                              echo "sukses";
                          }
                          else{
                              echo "gabim";
                          }
              
                   }
                }
                }
            }

    }


    if(isset($_GET['fshi'])){
        $id=$_GET['fshi'];
        $sql="DELETE FROM autor WHERE id= $id";
        
        $sql1="SELECT emer_mb FROM autor WHERE id=$id;";
        $result = $conn -> query($sql1);
        $row = $result->fetch_assoc();
        $emer=$row['emer_mb'];
        
        $target_dir = 'foto/autor/';
        $target_file = $target_dir.$emer.'.jpg';
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        $conn -> query($sql);
        header('location:menaxho_autor.php');

    }


?>