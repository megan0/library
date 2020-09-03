<?php

session_start();
    require 'db_conn.php';

    if(isset($_POST['regjisstro'])){
        $emer=$_POST['emer'];
        $pershkrim=$_POST['pershkrim'];
        $libra=$_POST['me_te_lex'];

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

    }




?>