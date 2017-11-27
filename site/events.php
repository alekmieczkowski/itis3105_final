<?php
#Events display page. Links events to event detail page

$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
require_once ('../header.php');
include("../db/event_sql.php");
//get events
$events = sql_getEvents();

?>
<!--Insert Navbar-->
<?php include("../navbar.php");?>



<div class="container">

			
</div>







<div class="container">

    <!--Header-->
    <div class="row row-header">
        <div class="col-sm-2 col-md-3 col-lg-3"></div>
        <div id="arc-wrapper" class="col-sm-8 col-md-6 col-lg-6 text-center">
            <h3 id="header" class="font-primary">Camp Events</h3>
        </div>
    </div>
    <!--Row with all events outputed-->
    <div class="row">
        <?php 
            #for each event get all necesarry data
            foreach( $events as $event ): 
            $e_id = $event['activityID'];
            $e_name = $event['a_name'];
            $e_desc = $event['description'];
            $e_price = $event['price'];
            $e_age = $event['min_age'];
            $e_date = $event['a_date'];
            //$e_loc = $event['location'];
            $e_img = $event['image'];
            
            #convert date
            $date = str_replace('-','/',substr($e_date,0,10));

            ?>
            <div class="container-fliud">
            <div class=" row wrapper">
                <div class="col-md-6">
                      <img class="center-block event-img" src="img/logo.png" />	
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title event-name"><?php echo $e_name?></h3>
                    <h5 class="sizes event-date">Event Date: <strong><?php echo $date?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Ages: <strong><?php echo $e_age?>+</strong>
                    </h5>
                    <p class="product-description event-description"><?php echo $e_desc?></p>
                    <h4 class="price event-price">Event Price: <span><?php echo $e_price?>$</span></h4>
                    <div class="action">
                        <button class="event-button" type="button">Register</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<style>
<?php
include("../assets/css/events.css");
?>
</style>

<?php require_once ("../footer.php");?>