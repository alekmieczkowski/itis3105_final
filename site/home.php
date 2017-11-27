
<?php
$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
require_once ('../header.php');
?>
<!--Body Start-->

<!--Insert Navbar-->
<?php include("../navbar.php");?>

<!--Start of main page container-->
<div class="container-fluid">

    <div class="row row-header">
        <div class="col-sm-2 col-md-3 col-lg-3"></div>
        <div id="arc-wrapper" class="col-sm-8 col-md-6 col-lg-6 text-center">
            <h3 id="header" class="font-primary">Camp Niners</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-3 col-lg-3"></div>
        <div  class="col-sm-8 col-md-6 col-lg-6 text-center">
            <img class="logo" src="img/logo.png"/>
        </div>
    </div>


</div> <!--End Conitainer Fluid-->

<!--Body End-->
<?php require_once ("../footer.php");?>