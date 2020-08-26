<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      <?php 
        session_start();

        include 'header.php';

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
          header("location: home.php");
          exit;
      }
      ?> 
      <br>
      <div class="d-flex align-items-center justify-content-center flex-grow-1" >
          <div class="container text-center">
            <div class="row">
              <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="card card-signin my-5 login-card " style="height: 300px">
                  <div class="card-body">
                    <h2 class='card-title h2'>Vendosni te dhenat per te hyre:</h2>
                  <div class='form-group' style="padding: 30px 0">
                    <form action="kontrollo_signin.php" method="POST" >
                      <label class="control-label col-sm-3 ">Username:</label>
                      <input type="text" name="username" required/><br/>
                      <label class="control-label col-sm-3 ">Password:</label>
                      <input type="password" name="pass" required/><br/><br/>
                      <input type="submit" name='signin' value="SigIn" class="btn btn-primary active " />


                      <?php
                                
                                if(isset($_SESSION["password_err"])){
                                    $msg =implode($_SESSION["password_err"]) ;
                                    echo($msg);
                                }
                                    else if(isset($_SESSION["username_err"])){
                                        $msg =implode($_SESSION["username_err"]);
                                        echo($msg);
                                    }else if(isset($_SESSION["sql_err"])){
                                        $msg =implode($_SESSION["sql_err"]);
                                        echo($msg);
                                    }
                                    session_unset();

                            ?>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <br>

    <?php
      include 'footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>