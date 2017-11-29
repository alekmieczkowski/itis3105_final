<?php

$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
include("../header.php");
//session_start();
$error="";

//register an account
if (isset($_POST['fName']))
{
    if ($_POST['password']!=$_POST['confirmPassword'])
    {
        echo '<html> Password and confirm password do not match</html>';
        $error="Password and confirm password do not match";

    }
    elseif ($_POST['age']<18)
    {
        echo '<html> Age must be above 18</html>';
        $error="Age must be above 18";
    }
    else
    {

           sql_userSignup();

    }



//sign in
}

if (isset($_POST['username'])&&isset($_POST['password']))
{

    #if it is sign up
    if(isset($_POST['confirmPassword'])){
        sql_userSignup();
    }

    //sql_userSignup();
    $users = sql_getUsers();


    foreach ($users  as $user)
    {
        if ($user['username']==$_POST['username']&&$user['password']==$_POST['password'])
        {
            //check if remember me is set
            if (isset($_POST['rememberMe']))
            {
                setcookie('username',$_POST['username'],time()+31536000);
                setcookie('password',$_POST['password'],time()+31536000);

            }

            else
            {
                setcookie('username',$_POST['username'],time()-31536000);
                setcookie('password',$_POST['password'],time()-31536000);

            }

            $_SESSION['userID']=$user['userID'];
            $_SESSION['username']=$user['username'];
            $_SESSION['user_email']=$user['email'];
            $_SESSION['age']=$user['age'];
            $_SESSION['isAdmin'] = $user['isAdmin'];

            if ($user['isAdmin']==1)
            {
                header('Location: ../admin/adminHome.php');
            }
            else
            {
                header('Location: userHome.php');
            }
        }

    }


}


?>

<!--particles.js-->
<!--<div id="particles-js" style="z-index:-999!important; position:absolute; width:100%"></div>-->

<div class="login-page form-login">
    <div class="container-fluid form form-login">
        <div class="row logo-header">
            <div class="col-xs-6 text-center">
                <img class="logo "src="../site/img/logo-icon.png"/>
            </div>
            <div class="col-sm-6 text-center">
            <img class="logo-text"src="../site/img/logo-text.png"/>
            </div>
        </div>
        <!--Sign up-->
        <form class="register-form" method="post" action="">
            <div class="row">
                <div class="col-md-6 col-xs-12 .visible-sm-block, hidden-sm">
                    <input type="text" placeholder="First Name" name="fName" required><br>
                    <input type="text" placeholder="Last Name" name="lName" required><br>
                    <input type="text" placeholder="User Name" name="userName"required><br>
                </div>
                <div class="col-md-6 col-xs-12">
                    <input type="text" placeholder="Password" name="password"required><br>
                    <input type="text" placeholder="Confirm Password" name="confirmPassword"required><br>
                    <input type="text" placeholder="Age" name="age"required><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <input type="text" placeholder="Phone Number" name="phoneNumber"required><br>
                    <label  class="control control--radio">Admin
                        <input type="checkbox" name="role" id="check-admin" value="1" >
                        <div class="control__indicator"></div>
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label  class="control control--radio" >User
                    <input type="checkbox" name="role" id="check-user" value="0">
                    <div class="control__indicator"></div>
                    </label>
                </div>
                <div class="col-sm-6">
                    <input type="email" placeholder="Email Address" name="email"required><br>
                    <input type="submit"  class="submit-button" value="Sign Up">
                </div>
            </div>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>


        <!--Login-->
        <div class="row">
            <form action="" class="login-form" method="post">
                <div class="col-md-12">
                    <input type="text" name="username" placeholder="username" value="<?php if (isset($_COOKIE['username']))echo $_COOKIE['username'];?>" required/>
                </div>
                <div class="col-md-12">
                    <input type="password" name="password" placeholder="password" value="<?php if (isset($_COOKIE['password']))echo $_COOKIE['password'];?>" required/>
                </div>
                <div class="col-md-12">   
                <input type="checkbox" class="remember-checkbox"  id="rememberMe" name="rememberMe"><label for="rememberMe"><span></span>Remember Me</label><!--<p class="checkbox-text">Remember Me</p>-->
                </div>
            <div class="col-md-12">
                <button>login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </div>
            </form>
        </div>
    </div>
</div>

<?php include("../footer.php");?>
