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
      

    




?>