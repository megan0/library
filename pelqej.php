<?php

session_start();
require 'db_conn.php';

if(isset($_POST['unlike'])){
    $id=$_POST['id_lex'];
    $lib=$_POST['id_libri'];

    $sql="DELETE FROM preferenca WHERE id_lex=$id AND id_libri=$lib";
    if($conn -> query($sql)){
        echo "sukses";
    }
    else{echo "Gabim";}

    
}

if(isset($_POST['like'])){
    $id=$_POST['id_lex'];
    $lib=$_POST['id_libri'];

    $sql="INSERT INTO preferenca VALUES ($id,$lib)";
    if($conn -> query($sql)){
        echo "sukses";

    }
    else{echo "Gabim".$conn->error;
    }

    
}

if(isset($_POST['unlikea'])){
    $id=$_POST['id_lex'];
    $autor=$_POST['id_autori'];

    $sql="DELETE FROM apreferenca WHERE id_lex=$id AND id_autor=$autor";
    if($conn -> query($sql)){
        echo "sukses";
    }
    else{echo "Gabim";}

    
}

if(isset($_POST['likea'])){
    $id=$_POST['id_lex'];
    $autor=$_POST['id_autori'];

    $sql="INSERT INTO apreferenca VALUES ($id,$autor)";
    if($conn -> query($sql)){
        echo "sukses";

    }
    else{echo "Gabim".$conn->error;
    }

    
}

?>
