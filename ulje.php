<!doctype html>
<html lang="en">
  <head>
    <title>Ulje</title>
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
    include 'header.php';
  ?>
  <div class='container text-center'>
      <div class="row">
        <div class='col-md-12'>
          <h2 class='h2'>Aplikoni Ulje:</h2>
        </div>
      </div>

      <div class="row">
        <div class='col-md-6'>
          <div class='form-group'>

            <form>
              <label class="control-label col-sm-6 l">Zgjidhni librin ne oferte:</label>
              <select id='select'>
                <option value='0' selected>---</option>
                <?php
                  $sql="SELECT * FROM liber";
                  $result = $conn -> query($sql);
                  while($row = $result->fetch_assoc()){
                  echo "<option value=".$row['id'].">";
                  echo $row['titull'];
                  echo"</option>";
                  
                  }
                ?>
              </select></br>
              <span id='l'></span></br>
              <label class="control-label col-sm-7 l">Vendos % qe do te ulet:</label>
              <input type='number' id='perq' name='perq' required/><br>
              <label class="control-label col-sm-7 l">Cmimi i ulur:</label>
              <input type='number' id='cmimi' name='cmimi' required/><br></br>
              <input type='button' id='apliko' value='Apliko Ulje' name='apliko' class="btn btn-primary active "/>
            </form>
          </div>
        </div>
      </div>
  </div>





  <?php
    include 'footer.php';
  ?>

  <script>
    var libri,perq,cmimi;
    $(document).ready(function(){
        $("#select").change(function(){
          libri=$("#select").val();
        });
      });
      $(document).ready(function(){
        $("#perq").change(function(){
        if(libri=='0'){
          $("#l").text("Ju lutem zgjidhni nje liber!");
        }
        else{
          perq=$("#perq").val();
        //ajax
        $.ajax({
              url: 'aulje_vep.php',
              type: 'post',
              data: {'llogarit':1,
                     'perqindje':perq},
              success: function(response){
                if(response=='sukses'){
                  
                }
               else{
                $("#pergj").text(response);

               }
              }
            });
        }
      

        });
      });
  </script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>