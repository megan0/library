<!doctype html>
<html lang="en">
  <head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js\jquery-3.4.1.min.js"></script>

  </head>

  <body>
      <?php 
        include 'header.php';
        require_once 'db_conn.php';

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
                    <input type="text" name="emri" id='emri' required/><br/>
                    <label class="control-label col-sm-4 l">Mbiemri</label>
                    <input type="text" name="mbiemri" id='mbiemri' required/><br/>
                    <label class="control-label col-sm-4 l">Username:</label>
                    <input type="text" name="username" id='username' required/><p id='usrn'></p><br/>
                    <label class="control-label col-sm-4 l">Password:</label>
                    <input type="password" name="pass" id='pass1' required/><br/>
                    <label class="control-label col-sm-4 l">Konfirmo passwordin:</label>
                    <input type="password" name="passkonf" id='pass2' required/><span id='pconf'></span><br/><br/>
                    <input type="submit" id="butt" value="Regjistrohu" class="btn btn-primary active "/>

                    <span id='response'></span>

                    <div class="container signin">
                      <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
                    </div>
                </form>
            </div>
          </div>
        </div>

    </div>

    <?php
      include 'footer.php';
    ?>


    <script>
      var emri,mbiemri,username,pas1,pas2;
      var username_check,password_check, regjistrohu;
      var username_status=0,password_status=0;

      $(document).ready(function(){
        $("#emri").change(function(){
          emri = $(this).val();
        });
      });

      $(document).ready(function(){
        $("#mbiemri").change(function(){
          mbiemri = $(this).val();
        });
      });

      $(document).ready(function(){
        $("#username").keypress(function(){
          username = $(this).val();
          if (username!=''){
            $.ajax({
              url: 'signup_veprime.php',
              type: 'post',
              data:{'username_check': 1,
              'username': username},
              success: function(response){
                if(response=='taken'){
                  username_status=0;
                  $("#usrn").text("Ju lutem zgjidhni nje username tjeter!");
                }
                else{
                  username_status=1;
                  $("#usrn").text("Username eshte i lire.");
                }
              }
            });
          }
        });
      });

      $(document).ready(function(){
        $("#pass1").change(function(){
          pas1 = $(this).val();
        });
      });

      $(document).ready(function(){
        $("#pass2").change(function(){
          pas2 = $(this).val();
          if (pas2!=pas1){
              password_status=0;
              $("#pconf").text("Kujdes! Passwordet nuk perputhen.");
            }
          else{
            $("#pconf").text("Korrekt.");
              password_status=1;
            }
            
        });
      });


        $(document).ready(function(){
        $("#butt").click(function(){
          if(username_status==0 || password_status==0){
            $("#response").text("Ju lutem vendosni te dhenat sic duhet.");
          }
          else{
            $.ajax({
              url: 'signup_veprime.php',
              type: 'post',
              data:{'regjistrohu': 1,
              'emri': emri,
              'mbiemri': mbiemri,
              'username': username,
              'pass1': pas1},
              success: function(response){
                if(response=='sukses'){
                  $("#response").text("Ju u regjistruat.");
                  $("#emri").val("");
                  $("#mbiemri").val("");
                  $("#username").val("");
                  $("#pass1").val("");
                  $("#pass2").val("");
                }
               
              }
            });
          }
        });
      });
        console.log("abc",emri,mbiemri,username);


    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>