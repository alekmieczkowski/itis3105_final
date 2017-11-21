<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/19/2017
 * Time: 9:34 PM
 */
$current_dir = basename(dirname(__FILE__));
include("../header.php");


//register for an event
if (isset($_POST['regActivity']))
{
    sql_registerEvent(2,$_POST['regActivity']);
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
                <a href="#">
                    <img class="media-object dp img-circle center-block" src="img/email.png" style="width: 200px;height:200px;">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">User Name</h4>
                    <span><img class="email" src="img/email.png"/></span>
                    <span class="label label-default">Member Since XX/XX/XX</span>
                </div>
            </div>
        </div>

        


        
            <?php include("events_list.old.php");?>
        
    </div>
</div>
<?php include("../footer.php"); ?>


