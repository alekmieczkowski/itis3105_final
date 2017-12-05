<?php
$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
require_once ('../header.php');
require_once ("../db/event_sql.php");

#get event ID
$eventID=$_GET['eventID'];

$event=sql_getEvent($eventID);

foreach($event as $ev){
    $e_name = $ev["a_name"];
    $e_img = $ev["image"];
    $e_id = $ev['activityID'];
    $e_date = $ev['a_date'];
    $e_description = $ev['description'];
    $e_price = $ev['price'];
    $e_age = $ev['min_age'];
}

?>

<style>
<?php require_once ("../assets/css/events.css");?>

.event-img{
    margin-top:10px;
    margin-bottom:10px;
}
</style>
<!--include navbar-->
<?php include("../navbar.php");?>

<div class="container-fliud">
            <div class=" row wrapper">
                <div class="col-md-6">
                      <img class="center-block event-img" src="../<?php echo $e_img?>" />	
                </div>
                <div class="details col-md-6">

                    <form action="" method="post">
                    <input type="hidden" value="<?php echo $e_id?>" name="register">

                    <h3 class="product-title event-name"><?php echo $e_name?></h3>
                    <h5 class="sizes event-date">Event Date: <strong><?php echo str_replace('-','/',substr($e_date,0,10));?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Ages: <strong><?php echo $e_age?>+</strong>
                    </h5>
                    <p class="product-description event-description"><?php echo $e_description;?></p>
                    <h4 class="price event-price">Event Price: <b>$<?php echo $e_price;?></b></h4>
                </div>
            </div>
</div>

<iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBii8MRBfwNdlH5E_MgtAtBCgGOy_g8h6g
    &q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>



<!--include Footer-->
<?php require_once ("../footer.php");?>