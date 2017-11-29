<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/19/2017
 * Time: 9:34 PM
 */
$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
include("../header.php");
//session_start();


#redirect if not logged in
if(!isset($_SESSION['userID'])){
    header("Location: signin.php");
}



//register for an event
if (isset($_POST['regActivity']))
{
    sql_registerEvent($_SESSION['userID'],$_POST['regActivity']);

}



?>

<div class="container-fluid" >

<!--Insert Navbar-->
<?php include("../navbar.php");?>



    <div class="row row-top">
        <div class="col-xs-12 col-md-1 col-md-offset-2">
            <h2>Profile</h2>
        </div>
        <div class="col-xs-0 col-md-2 col-md-offset-4">
            <h2>Registered Events</h2>
        </div>
    </div>
    <div class="row">


        <div class="col-md-3  col-md-offset-2 col-xs-12 text-center profile-div">
            <div class="media">
                <a href="">
                    <img class="media-object dp img-circle center-block" src="img/email.png" style="width: 200px;height:200px;">
                </a>
                <div class="media-body">
<<<<<<< HEAD
                    <h4 class="media-heading">Welcome <?php echo $_SESSION['userName'] ?></h4>
                    <span><img class="email" src="img/email.png"/></span>
                    <span class="label label-default">Member Since XX/XX/XX</span>
=======
                    <h4 class="media-heading"><?php echo $_SESSION['username']?></h4>
                    <span><a href="mailto:<?php echo $_SESSION['user_email']?>"><img class="email" src="img/email.png"/></a></span>
                    <span class="label label-default">Age: <?php echo $_SESSION['age']?></span>
>>>>>>> 02b6c0beaefba3e79cae6be90111dbf139b48f0a
                </div>
            </div>
        </div>



<<<<<<< HEAD


        <?php include("events_list.old.php");?>
        
=======
        <div class="col-md-6  col-sm-12 col-xs-12">
            <?php include("events_list.php");?>
        </div>
>>>>>>> 02b6c0beaefba3e79cae6be90111dbf139b48f0a
    </div>
</div>
<?php include("../footer.php"); ?>


