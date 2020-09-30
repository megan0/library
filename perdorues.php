<!doctype html>
<html lang="en">
  <head>
    <title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php 
        session_start();

        if((!isset($_SESSION["loggedin"])) || (!$_SESSION["loggedin"] === true) || ($_SESSION["roli"]!=1)){
          header("location: home.php");
          exit;
      }

        include 'header.php';
        include 'db_conn.php';
        $id=$_SESSION["id"];
        $sql="SELECT emer,mbiemer FROM perdorues WHERE id=$id";
        $result = $conn->query($sql);
            if ($result->num_rows == 1){
              $row = $result->fetch_assoc();
              ?>
    <div class='container'>
      <div class='row'>
        <?php
                  echo "<h2 class='h2'>Pershendetje ".$row["emer"]." ".$row["mbiemer"]."! Mos humbisni të rejat e fundit!</h2>";
                } 
        ?>
      </div>
     
      <div class='row text-center'>
        <div class='col-md-6 '>
           <h6 class='h3' style="background-color:#F8F9FA">Librat tuaj te prefereuar:</h6>
        </div>
        <div class='col-md-6 '>
          <h6 class='h3'style="background-color:#F8F9FA" >Autoret tuaj te preferuar:</h6>
        </div>
      </div>
      <div class='row '>

        <div class='col-md-6 text-center '>
            
           <?php
           $librat_e_preferuar= array();
            $sql6="SELECT * FROM liber JOIN preferenca ON liber.id=preferenca.id_libri AND preferenca.id_lex=$id ";
            $result6 = $conn->query($sql6);
            if ($result6->num_rows <1){
              echo "<h6>Shtoni librat qe pelqeni ne listen e preferencave tuaja per sugjerime me te mira!</h6>";
            }
            else{
              
              while(($row6 = $result6->fetch_assoc())){
                echo "<a href='liber.php?liber=".$row6['id']."'><img src='foto/liber/".$row6['titull'].".jpg' class=' img img-thumbnail pt-4 m-3' width=150 height=150></a>";
                array_push($librat_e_preferuar,$row6['id']);
              }
            }
           ?>
          
        </div>

        <div class='col-md-6 text-center'>
          <?php
            $autoret_e_preferuar=array();
            $sqla="SELECT * FROM autor JOIN apreferenca ON autor.id=apreferenca.id_autor AND apreferenca.id_lex=$id ";
            $resulta = $conn->query($sqla);
            if ($resulta->num_rows <1){
              echo "<h6>Shtoni autoret qe pelqeni ne listen e preferencave tuaja per sugjerime me te mira!</h6>";
            }
            else{
              
              while(($rowa = $resulta->fetch_assoc()) ){
                echo "<a href='autor.php?autor=".$rowa['id']."'><img src='foto/autor/".$rowa['emer_mb'].".jpg' class=' img img-thumbnail pt-4 m-3' width=150 height=150></a>";
                array_push($autoret_e_preferuar,$rowa['id']);
              }
            }
          ?>
           
        </div>

      </div>

      <div class='row'>
        <h3 class='h3'>Ndoshta mund te pelqeje edhe</h3>
      </div>
      <div class='row'>
        <div class='col-md-12 '>
          <?php
            $sugjerime= array();
            for($i=0;$i<sizeof($autoret_e_preferuar);$i++){
              $am=$autoret_e_preferuar[$i];
              $sql5="SELECT * FROM liber WHERE liber.autor=$am AND liber.id NOT IN (SELECT id_libri FROM preferenca WHERE id_lex=$id) ";

              $result5 = $conn->query($sql5);
              if ($result5->num_rows >=1){
                while(($row5 = $result5->fetch_assoc())){
                  array_push($sugjerime,$row5['id']);
                }
              }
            }

            for($j=0;$j<sizeof($sugjerime);$j++){
              $s=$sugjerime[$j];
              $sql_titull="SELECT titull FROM liber WHERE id=$s";
              $result_titull = $conn->query($sql_titull);
              $row_t = $result_titull->fetch_assoc();
              echo "<a href='liber.php?liber=".$s."'><img src='foto/liber/".$row_t['titull'].".jpg' class=' img img-thumbnail pt-4 m-3' width=150 height=150></a>";
            }
          ?>
        </div>
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