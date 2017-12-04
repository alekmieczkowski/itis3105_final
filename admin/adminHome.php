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
    header("Location: ../user/signin.php");
}



?>

<style>
    .hidden {
  display: none;
  -webkit-transition: display .5s ease;
  -moz-transition: display .5s ease;
  -o-transition: display .5s ease;
}

.active {
  transition: display .5s ease;
  -webkit-transition: display .5s ease;
  -moz-transition: display .5s ease;
  -o-transition: display .5s ease;
}
</style>


<div class="container-fluid">

    <!--Insert Navbar-->
    <?php include("../navbar.php");?>



    <div class="row row-top">
        <!--Header-->
        <div class="col-md-12 text-center">
            <h1>Admin Panel</h1>
        </div>
</div>
    <div class="row panel-row center-block">

        <!--side panel-->
        <div class="col-md-3 table-responsive panel-side" >
            <h2 class="text-center" style="color:white">Databases</h2>
           <input class="db-button" type="submit" name="events" value="Events">
           <input class="db-button" type="submit" name="users" value="Users">
        </div>

        <!--Blank Spacing panel-->
        <div class="col-md-1"></div>

        <!--Data panel-->
        <div class="col-md-8 panel-main">
            <!--Events Management-->
            <?php 
            $table_name="activities";
            $table_data= sql_getEvents();
            $table_id="events";
            
            include("db-list.php");
            ?>

            <!--User Management-->
            <?php 
            $table_name="users";
            $table_id="users";
            //adds a checkbox as last col in db
            $active_check = true;
            $table_data= sql_getUsers();
            include("db-list.php");
            ?>

            <!--Registered Activities Management-->
            <?php 
            #$table_name="reg_activities";
            #$table_data= sql_getUsers();
            
            #include("db-list.php");
            ?>
        </div>
        


    </div>
</div>
<?php include("../footer.php"); ?>


