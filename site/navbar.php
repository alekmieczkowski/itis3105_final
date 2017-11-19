


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav navbar-right">
        <!--Login/logout button-->

            <?php
            #Check to put signup or login button in navbar

            function login_button(){
                if(isset($_SESSION)){
                    #if session exists give logout
                    echo '<li><form action="">
                            <button name="disconnect" type="submit" value="disconnect">Sign Out</button>
                          </form></li>';
                }
                else{
                    #if session does not exist add Signin button
                    echo '<li><form action="../user/logIn.php">
                            <button name="logIn" type="submit" value="LogIn">LogIn</button>
                          </form></li>
                
                          <li><form action="../user/signUp.php" >
                            <button name="logIn" type="submit" value="LogIn">SignUp</button>
                          </form></li>';
                }
            }
            login_button();
            ?>

        <li>
            <a class="nav-choice" href="#">Events</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>