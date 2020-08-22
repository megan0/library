<!doctype html>
<html lang="en">
  <head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
      <?php 
        include 'header.php';
        include 'db_conn.php';

      ?> 
      <br/>
    <div class="container text-center">
        <div class="row">
            <div class='col-md-12'>
                <h2 class='h2'>Mire se vini!<br> Ju lutem plotesoni te dhenat e meposhtme per tu regjistruar:</h2>
            </div>
        </div>
        <br/>
        <div class="row">
          <div class='col-md-8'>
            <div class='form-group'>
                <form action="signup_veprime.php" method="post" enctype="multipart/form-data">
                    <label class="control-label col-sm-4 l">Emri:</label>
                    <input type="text" name="emri"  required/><br/>
                    <label class="control-label col-sm-4 l">Mbiemri</label>
                    <input type="text" name="mbiemri" required/><br/>
                    <label class="control-label col-sm-4 l">Username:</label>
                    <input type="text" name="username" required/><br/>
                    <label class="control-label col-sm-4 l">Password:</label>
                    <input type="password" name="pass" required/><br/>
                    <label class="control-label col-sm-4 l">Konfirmo passwordin:</label>
                    <input type="password" name="passkonf" required/><br/><br/>
                    <input type="submit" id="butt" value="Regjistrohu" class="btn btn-primary active "/>
                </form>
            </div>
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