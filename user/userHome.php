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
        
        <!--Profile-->

        <div class="col-md-3  col-md-offset-2 col-xs-12 text-center profile-div">
            <?php include("profile.php");?>
            
        </div>



        <!--User Events List-->
        <div class="col-md-6">
            <?php include("events_list.php");?>
        </div>
            
        

    </div>
</div>
<?php include("../footer.php"); ?>


