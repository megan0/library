<!doctype html>
<html lang="en">
  <head>
    <title>Autor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="project.css">
    <script src="js\jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php
    session_start();

    if((!isset($_SESSION["loggedin"])) || (!$_SESSION["loggedin"] === true) || ($_SESSION["roli"]!=0)){
      header("location: home.php");
      exit;
    }

    include 'header.php';
    include 'db_conn.php';


  ?>


<div class="container text-center">
      <div class="row">
        <div class='col-md-12'>
          <h2 class='h2'>Regjistro nje autor te ri per librarine:</h2>
        </div>
      </div>

      <div class="row">
        <div class='col-md-8'>
          <div class='form-group'>
            <form>
              <label class="control-label col-sm-4 l">Foto:</label>
              <input type="file" name="foto" id="foto" required><br>
              <label class="control-label col-sm-4 l">Emri/Mbiemri(i plote):</label>
              <input type='text' name='emer_mb' id='emer_mb' required/><br/>
              <label class="control-label col-sm-4 l">Pershkrim:</label>
              <textarea name='pershkrim' id='pershkrim' cols='23' rows='3' required></textarea></br>
              <label class="control-label col-sm-4 l">Librat me te lexuar (Ju lutem shkruani titujt e plote dhe ndajini ata me presje nga njeri-tjetri):</label>
              <textarea name='me_te_lex' id='me_te_lex' cols='23' rows='3' required></textarea></br>
              <input type='button' name='regjistro' value="Regjistro" id='regjistro' class="btn btn-primary active "/><br/>
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
    var emri,pershkrim,me_te_lex,foto,ok=1;
       var fd = new FormData();                  
    
    $(document).ready(function(){
        $("#foto").change(function(){
          foto = $(this).prop('files')[0];
          fd.append('foto',foto);
        });
      });
    $(document).ready(function(){
        $("#emer_mb").change(function(){
          emri = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#pershkrim").change(function(){
          pershkrim = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#me_te_lex").change(function(){
          me_te_lex = $(this).val();
        });
      });
      $(document).ready(function(){
        $("#regjistro").click(function(){
          fd.append('regjisstro',ok);
          fd.append('emer',emri);
          fd.append('pershkrim',pershkrim);
          fd.append('me_te_lex',me_te_lex);
          $.ajax({
              url: 'mautor_veprime.php',
              type: 'post',
              data: fd,
              processData: false,
              contentType: false,
              success: function(response){
                if(response=='sukses'){
                  $("#pergj").text("Autori u regjistrua. Shihni:").append("<a href='edit.php'>ketu</a>");
                  $("#emer_mb").val("");
                  $("#me_te_lex").val("");
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