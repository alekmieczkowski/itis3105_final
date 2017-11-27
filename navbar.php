<?php
#Check to put signup or login button in navbar

function login_button(){
    if(isset($_SESSION['userID'])){
        #role specific buttons
        if($_SESSION['isAdmin']){ #TODO: If user is admin then show link to admin page. For now set to TRUE always
          echo '<li class="font-primary"><a class="navbar-items" href="#">Admin Portal</a></li>';
      }
      else{
        echo '<li class="font-primary"><a class="navbar-items" href="../user/userHome.php">User Profile</a></li>';
      }
        #if session exists give logout
        echo '<li><form action="">
                <button name="disconnect" class="navbar-items login-button" type="submit" value="disconnect">Sign Out</button>
              </form></li>';
        
    }
    else{
        #if session does not exist add Signin button
        echo '<li><form action="../user/signin.php">
                <button name="logIn" class="navbar-items font-primary login-button" type="submit" value="LogIn">Login</button>
              </form></li>
    
              <li><form action="../user/signin.php" >
                <button name="logIn" class="navbar-items font-primary login-button" type="submit" value="LogIn">Signup</button>
              </form></li>';
              
    }
}
?>

<?php echo '<link rel="stylesheet" type="text/css" href="../assets/css/site.css">'?>

<nav class="navbar navbar-default">
  <div class="container-fluid" style="max-width:1000px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only font-primary">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../site/home.php"><img class="logo-icon" src="../site/img/logo-icon.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav navbar-right">
        
        <!--Events-->
        <?php
         $events_link = '<li class=" font-primary"><a  class="navbar-items" href="../site/events.php">Events</a></li>';
         $home_link = '<li class=" font-primary"><a  class="navbar-items" href="../site/home.php">Home</a></li>';
         if($current_file == "home.php"){
          echo $events_link;
         }
        elseif($current_file == "events.php"){
          echo $home_link;
        }
        else{
          echo $events_link;
          echo $home_link;
        }
        ?>

        <!--Login/logout button-->
        <?php login_button();?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>