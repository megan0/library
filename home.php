<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="project.css">
   </head>

   <body>
      <?php 
      include 'header.php';
      ?>
      
      <div class='container text-center'>
         <div class='row'>
            <div class='col-md-12'>
               <h2 class='h2'>Botime te reja</h2>
            </div>
         </div>

         <div class='row'>
            <div class='col-md-6'>
               <img src='foto/three-comrades.jpg'  width=300 height=300>
            </div>
            <div class='col-md-6'>
               <img src='foto/arch-of-triumph.jpg'  width=300 height=300>
            </div>
         </div>
      </div>

      <br>

      <div class='container text-center'>
         <div class='row'>
            <div class='col-md-12'>
               <h2 class='h2'>Gjej librin tend</h2>
            </div>
         </div>
            
         <div class='row'>
            <div class='col-md-6'>
               <h3 class='h3'>Ne Oferte</h3>
            
            <div class='row'>
                  <div class='col-md-5'>
                     <img src='foto/alkimisti.jpg'  width=200 height=200>
                  </div>
                  <div class='col-md-5'>
                     <img src='foto/brida.jpg'  width=200 height=200>
                  </div>
                  <div class='col-md-5'>
                     <img src='foto/veronika.jpg'  width=200 height=200>
                  </div>
                  <div class='col-md-5'>
                     <img src='foto/komedia.jpg'  width=200 height=200>
                  </div>
            </div>
         </div>
            
            <div class='col-md-6'>
               <h3 class='h3'>Me te pelqyerat</h3>
               <div class='row'>
                  <div class='col-md-6'>
                     <img src='foto/krim.jpg'  width=200 height=300>
                  </div>
                  <div class='col-md-6'>
                     <img src='foto/idjoti.jpg'  width=200 height=300>
                  </div>
               </div>
            </div>
      </div>

      <br>

      <div class='container text-center'>
         <div class='row'>
            <div class='col-md-12'>
               <h2 class='h2'>Sugjerime</h2>
            </div>
         </div>
         <div class='row'>
            <div class="carousel slide" data-ride="carousel" data-interval=3000>
               <ul class="carousel-indicators">
                  <li data-target="#" data-slide-to="0" class="active"></li>
                  <li data-target="#" data-slide-to="1"></li>
                  <li data-target="#" data-slide-to="2"></li>
               </ul>


            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="foto/c1.jpg"   width="1100" height="500">
               </div>
               <div class="carousel-item">
                  <img src="foto/c2.jpg"  width="1100" height="500">
               </div>
               <div class="carousel-item">
                  <img src="foto/c3.jpg"  width="1100" height="500">
               </div>
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