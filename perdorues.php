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
        <!-- <div class='col-md-6 '>
           <?php
            // $sql1="SELECT * FROM liber HAVING max(id)";
            // $result1 = $conn->query($sql1);
            // if ($result1->num_rows ==1){
            //   $row1 = $result1->fetch_assoc();
            // }
          ?>
          <img src='foto/liber/$row1["titull"].jpg' class=" img img-thumbnail pt-4 m-3" width=150 height=150 />
          
          <div class="col-4 pt-1 mt-4 text-center">
            <a href="liber.php?liber=//$row1['id']?>"><p class='' >" //$row1['titull']?>"</p></a>
            <?php
              // $id_autor=$row1['autor'];
              // $sql2="SELECT * FROM autor WHERE id=$id_autor";
              // $result2 = $conn->query($sql2);
              // $row2 = $result2->fetch_assoc();

            ?>
            <a href="autor.php?autor=//$row2['id']?>"><p class='' > //$row2['emer_mb']?></p></a> 
          </div>
        </div> -->

        <div class='col-md-6 text-center '>
            
           <?php
            $sql6="SELECT * FROM liber JOIN preferenca ON liber.id=preferenca.id_libri AND preferenca.id_lex=$id ";
            $result6 = $conn->query($sql6);
            if ($result6->num_rows <1){
              echo "<h6>Shtoni librat qe pelqeni ne listen e preferencave tuaja per sugjerime me te mira!</h6>";
            }
            else{
              $i=0;
              while(($row6 = $result6->fetch_assoc()) && $i<=4){
                echo "<a href='liber.php?liber=".$row6['id']."'><img src='foto/liber/".$row6['titull'].".jpg' class=' img img-thumbnail pt-4 m-3' width=150 height=150></a>";
                $i++;
              }
            }
           ?>
          
        </div>

        <div class='col-md-6 text-center'>
          <?php
            $sqla="SELECT * FROM autor JOIN apreferenca ON autor.id=apreferenca.id_autor AND apreferenca.id_lex=$id ";
            $resulta = $conn->query($sqla);
            if ($resulta->num_rows <1){
              echo "<h6>Shtoni autoret qe pelqeni ne listen e preferencave tuaja per sugjerime me te mira!</h6>";
            }
            else{
              $j=0;
              while(($rowa = $resulta->fetch_assoc()) && $j<=4){
                echo "<a href='autor.php?autor=".$rowa['id']."'><img src='foto/autor/".$rowa['emer_mb'].".jpg' class=' img img-thumbnail pt-4 m-3' width=150 height=150></a>";
                $j++;
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
            $sql5="SELECT * FROM liber JOIN apreferenca JOIN autor ON apreferenca.id_lex=$id AND apreferenca.id_autori
                          AND liber.autor=autor.id AND liber.id NOT IN (SELECT id_libri FROM preferenca WHERE id_lex=$id) ";
            $result5 = $conn->query($sql5);
            if ($result5->num_rows >=1){
              $a=0;
              while(($row5 = $result5->fetch_assoc()) && $a<=4){
                echo "<a href='liber.php?liber=".$row5['id']."'><img src='foto/liber/".$row5['titull'].".jpg' class=' img img-thumbnail pt-4 m-3' width=150 height=150></a>";
                $a++;
              }
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