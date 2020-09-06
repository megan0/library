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
      

    




?>