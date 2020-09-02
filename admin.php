<!doctype html>
<html lang="en">
  <head>
    <title>Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <style>
      #but{
        font-family: 'Ubuntu', sans-serif;
        font-style: italic;
        font-size: 20px;
        padding: 40px ;
        background-color: rgb(233, 228, 224);
        color:gray;

      }
    </style>


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

<br>
<br>
    <div class='container'>
      <div class='row'>
        <div class='col-md-2'>
          <img src='foto/admin.png' alt='foto profili' width=100 height=100>
        </div>

        <div class='col-md-4 '>
          <?php
            
            $id=$_SESSION["id"];
            $sql = "SELECT emer,mbiemer FROM perdorues WHERE id =$id";
            $result = $conn->query($sql);
            if ($result->num_rows == 1){
              $row = $result->fetch_assoc();
              echo "<h2 class='h2'>".$row["emer"]." ".$row["mbiemer"]."</h2>";
            } 

          ?>
        </div>
      </div>
      <br><br>
      <div class='row'>
          <div class='col-md-4 '>
            <a href="menaxho_liber.php" class=" btn btn-secondary " id="but">Menaxho Liber</a>
          </div>
          <div class='col-md-4 '>
            <a href="menaxho_autor.php" class="btn btn-secondary" id="but">Menaxho Autor</a>
          </div>
          <div class='col-md-4 '>
            <a href="ulje.php" class="btn btn-secondary" id="but">Apliko Ulje</a>
          </div>

      </div>
    </div>
 <br>
 <br>   


    <?php
      include 'footer.php';
    ?>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>