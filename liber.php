<!doctype html>
<html lang="en">
  <head>
    <title>Liber</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js\jquery-3.4.1.min.js"></script>
    <style>
     
    </style>
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
      
      <img src='foto/liber/<?=$row["titull"]?>.jpg' class=" img img-thumbnail pt-4 m-3" width=250 height=250 />
      
      <div class="col-5 pt-4 mt-5 text-center">
        <h4 >"<?= $row['titull']?>"</h4>
        <?php
          $id_autor=$row['autor'];
          $sql1="SELECT * FROM autor WHERE id=$id_autor";
          $result1 = $conn->query($sql1);
          $row1 = $result1->fetch_assoc();
          $sql_ulje="SELECT * FROM ulje WHERE id=$id";
          $result_ulje = $conn->query($sql_ulje);
          $row_ulje = $result_ulje->fetch_assoc();

        ?>
        <h4><?= $row1['emer_mb']?></h4>
        <?php
          if($result_ulje->num_rows == 0){
              echo "<h6 class=''>".$row['cmim']."L</h6>";
          }
          else{
            echo "<h6 class=''>".$row_ulje['cmim']."L</h6>";
          }
        ?>
        <?php
          if((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"] === true) && ($_SESSION["roli"]===1)){
            $id_lexuesi=$_SESSION["id"];
            $sql7="SELECT * FROM preferenca WHERE id_lex=$id_lexuesi AND id_libri=$id";
            $result7 = $conn->query($sql7);
            if ($result7->num_rows == 1){
              echo "<button id='but_liked' name='but_liked' class='btn btn-secondary'>";
              echo "<span id='like'>&#9829;</span>";
              echo "</button>";

            }
            else{
              echo "<button id='but_not_liked' name='but_not_liked' class='btn btn-secondary'>";
              echo "<span id='like'>&#9825;</span>";
              echo "</button>";
            }
          }
        ?>
        <span id='p'></span>

      </div>
      <div class='row text-center'>
        <table class="table table-bordered table-light" style="background-color:#F8F9FA">
         <tr>
          <td>Pershkrim:</td>
          <td ><p class="col-8 pt-4 mb-4 text-left"><?= $row['pershkrim']?></p></td>
         </tr>
         <tr>
          <td>Zhanri:</td>
          <td><h6 class="col-8 pt-4 mb-4"><?= $row['zhanri']?></h6></td>
         </tr>
         <tr>
          <td>Viti:</td>
          <td><h6 class="col-8 pt-4 mb-4"><?= $row['viti']?></h6></td>
         </tr>
         <tr>
          <td>Shtepia Botuese:</td>
          <td><h6 class="col-8 pt-4 mb-4"'><?= $row['shtepi_botuese']?></h6></td>
         </tr>
        </table>
      </div>
      </div>
      

  </div>



  <?php
    include 'footer.php';
  ?>

  <script>
     var id_lex=<?=$id_lexuesi?>, id_libri=<?=$id?>;
    $(document).ready(function(){
        $("#but_liked").click(function(){
          $.ajax({
              url: 'pelqej.php',
              type: 'post',
              data: {
                'unlike':1,
                'id_lex':id_lex,
                'id_libri':id_libri
              },
              success: function(response){
                if(response=='sukses'){
                  window.location.reload();
                }
               else{
                $("#p").text(response);
                }
              }
            });
        });
      });

      $(document).ready(function(){
        $("#but_not_liked").click(function(){
          $.ajax({
              url: 'pelqej.php',
              type: 'post',
              data: {
                'like':1,
                'id_lex':id_lex,
                'id_libri':id_libri
              },
              success: function(response){
                if(response=='sukses'){
                  window.location.reload();
                }
               else{
                $("#p").text(response);
                }
              }
            });
        });
      });

  </script>

      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>