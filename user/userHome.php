<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/19/2017
 * Time: 9:34 PM
 */
$current_dir = basename(dirname(__FILE__));
$current_file = dirname(__FILE__);
include("../header.php");

$name=$_SESSION['userID'];

//=======

#start session if its not on
if(!isset($_SESSION))
    session_start();



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
        

    </div>
    <div class="row">
        
        <!--Profile Stuff-->
        <div class="col-md-3  col-md-offset-2 col-xs-12 text-center profile-div">
            <div class="col-xs-12 text-center">
                <h2>Profile</h2>
            </div>
            <!--Profile Image-->
            <div class="media">
                <!--email-->
                

                    <img class="media-object dp img-circle center-block" src="img/email.png" style="width: 200px;height:200px;">
              
                <!--Mail Button/ Labels-->
                <div class="media-body">
                    <h4 class="media-heading">Welcome <?php echo $_SESSION['f_name'] ?></h4>
                    <a href="#"><span><img class="email" src="img/email.png"/></span></a>
                    <span class="label label-default">Member Since<?php echo " " .$_SESSION['member_since']?></span>
                </div>
            </div>
        </div>




        <div class="col-md-6">
            <?php include("events_list.php");?>
        </div>
            
        

    </div>
</div>
<?php include("../footer.php"); ?>


