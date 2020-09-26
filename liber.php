<!doctype html>
<html lang="en">
  <head>
    <title>Liber</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php
    session_start();
    include 'db_conn.php';
    if(!isset($_GET['liber'])){
      header("location: home.php");
      exit;
    }
    $id=$_GET['liber'];
    $sql="SELECT * FROM liber WHERE id=$id";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
      header("location: home.php");
      exit;
    }
    $row = $result->fetch_assoc();
    include 'header.php';
  ?>
  <div class='container'>
    <div class='row'>
      <img src='foto/liber/<?=$row["titull"]?>.jpg' width=200 height=200 />
      <h3 ><?= $row['titull']?></h3>
      <?php
        $id_autor=$row['autor'];
        $sql1="SELECT * FROM autor WHERE id=$id_autor";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();

      ?>
      <h3><?= $row1['emer_mb']?></h3>
      <h3 class='h3'><?= $row['zhanri']?></h3>
      <h3 class='h3'><?= $row['viti']?></h3>
      <h3 class='h3'><?= $row['shtepi_botuese']?></h3>
      <h3 class='h3'><?= $row['cmim']?></h3>
      <p><?= $row['pershkrim']?></p>



      

    </div>
  </div>



  <?php
    include 'footer.php';
  ?>

      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>