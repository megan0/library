<!doctype html>
<html lang="en">
  <head>
    <title>Ndrysho Liber</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js\jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
    session_start();
    include 'db_conn.php';

    if((!isset($_SESSION["loggedin"])) || (!$_SESSION["loggedin"] === true) || ($_SESSION["roli"]!=0)){
      header("location: home.php");
      exit;
    }
    if(!isset($_GET['ndrysho'])){
      header("location: home.php");
      exit;
    }
    $id_liber=$_GET['ndrysho'];
    $sql="select * from liber where id=$id_liber";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
      header("location: home.php");
      exit;
    }
    $row = $result->fetch_assoc();
    include 'header.php';
  ?>

<div class="container">
      <div class="row">
        <div class='col-md-12'>
          <h2 class='h2'>Nryshoni te dhenat:</h2>
        </div>
      </div>

      <div class="row">
        <div class='col-md-6'>
          <div class='form-group'>

            <form >
              <input type='hidden' name='id' id='id' value='<?=$row["id"]?>'>
              <label class="control-label col-md-4 l">Foto:</label>
              <input type="file" name="foto" id="foto" ><br>
              <label class="control-label col-sm-4 l">Titull:</label>
              <input type='text' name='titull' id='titull' value='<?=$row["titull"]?>' required/><br/>
              <label class="control-label col-sm-4 l">Zhanri:</label>
              <input type='text' name='zhanri' id='zhanri' value='<?=$row["zhanri"]?>'required/><br/>
              <label class="control-label col-sm-4 l">Autor:</label>
              <input type='text' name='autor' id='autor' value='<?=$row["autor"]?>' required/><br/>
              <label class="control-label col-sm-4 l">Viti:</label>
              <input type='number' name='viti' id='viti' value='<?=$row["viti"]?>' required/><br/>
              <label class="control-label col-sm-4 l">Shtepia Botuese:</label>
              <input type='text' name='sh_botuese' id='sh_botuese' value='<?=$row["shtepi_botuese"]?>' required/><br/>
              <label class="control-label col-sm-4 l">Cmim:</label>
              <input type='number' name='cmim' id='cmim' value='<?=$row["cmim"]?>' required/><br/>
              <label class="control-label col-sm-4 l">Pershkrim:</label>
              <textarea name='pershkrim' id='pershkrim' cols='23' rows='3'  required><?=$row["pershkrim"]?></textarea></br>
              <input type='button' name='ndrysho' id='ndrysho' value="Ndrysho" id='regjistro' class="btn btn-primary active "/><br/>
              <span id='pergj'></span>
            </form>
          </div>
        </div>
      </div>
  </div>



  <?php
    include 'footer.php';
  ?>


<script>
    var titull,zhanri,autor,viti,sh_bot,cmim,pershkrim,id,foto;
    var fd = new FormData();  
   
    
    $(document).ready(function(){
        $("#foto").change(function(){
          foto = $(this).prop('files')[0];
        });
      });
    $(document).ready(function(){
        $("#titull").change(function(){
          titull = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#zhanri").change(function(){
           zhanri= $(this).val();
        });
      });
      $(document).ready(function(){
        $("#autor").change(function(){
          autor = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#viti").change(function(){
          viti = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#sh_botuese").change(function(){
          sh_bot = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#cmim").change(function(){
          cmim = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#pershkrim").change(function(){
          pershkrim = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#ndrysho").click(function(){
          id = $('#id').val();
          pershkrim = $('#pershkrim').val();
          titull = $("#titull").val();
          zhanri= $("#zhanri").val();
          viti = $('#viti').val();
          sh_bot = $("#sh_botuese").val();
          cmim = $('#cmim').val();
          pershkrim = $("#pershkrim").val();
          autor = $("#autor").val();
          
          fd.append('ndrysho', 1);
          fd.append('titull', titull);
          fd.append('zhanri', zhanri);
          fd.append('autor', autor);
          fd.append('viti', viti);
          fd.append('sh_bot',sh_bot);
          fd.append('cmim', cmim);
          fd.append('id', id);
          fd.append('pershkrim', pershkrim);
          fd.append('foto',foto);

          $.ajax({
              url: 'mliber_veprime.php',
              type: 'post',
              data: fd,
              processData: false,
              contentType: false,
              success: function(response){
                if(response=='sukses'){
                  $("#pergj").text("Ky botim u ndryshua. Shihni:").append("<a href='edit.php'>ketu</a>");
                  $("#titull").val("");
                  $("#zhanri").val("");
                  $("#autor").val("");
                  $("#viti").val("");
                  $("#sh_botuese").val("");
                  $("#cmim").val("");
                  $("#pershkrim").val("");
                  $("#foto").val("");
                }
               else{
                $("#pergj").text(response);
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