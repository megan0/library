<!--header-->

<div>
   <nav class="navbar navbar-expand-sm bg-light navbar-light">
       <a class="navbar-brand" href="home.php"><img src='foto/logo.jpg'  width=180 height=80></a>
       <ul class="navbar-nav collapse navbar-collapse justify-content-end">
            <li class="nav-item">
            <?php
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        if($_SESSION["roli"] === 0){
                            echo("<a class='nav-link' href='admin.php'>Profili Admin</a>");
                        }
                        if($_SESSION["roli"] === 1){
                            echo("<a class='nav-link' href='perdorues.php'>Profil</a>");
                        }
                    }
                    else{
                        echo'<a class="nav-link nav1" href="signup.php">SignUp</a>';
                    }
            ?>
            </li>
            <li class="nav-item">
            <?php
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        echo'<a class="nav-link nav1" href="signout.php">SignOut</a>';
                    }
                    else{
                        echo'<a class="nav-link nav1" href="signin.php">SignIn</a>';
                    }
            ?>

            </li>
        </ul>
   </nav>
</div>
