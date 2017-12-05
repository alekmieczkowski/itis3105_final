<?php
$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
require_once ('../header.php');
include("../db/event_sql.php");

#get event ID
$eventID=$_GET['eventID'];

$event=sql_getEvent($eventID);

echo $eventID;


?>
<!--include navbar-->
<?php include("../navbar.php");?>

<div class="container-fliud">
            <div class=" row wrapper">
                <div class="col-md-6">
                      <img class="center-block event-img" src="../<?php echo $event['image']?>" />	
                </div>
                <div class="details col-md-6">

                    <form action="" method="post">

                     

                        <input type="hidden" value="<?php echo $event['activityID']?>" name="register22">


                    <h3 class="product-title event-name"><?php echo $event['a_name']?></h3>
                    <h5 class="sizes event-date">Event Date: <strong><?php echo str_replace('-','/',substr($event['a_date'],0,10));?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Ages: <strong><?php echo $event['min_age']?>+</strong>
                    </h5>
                    <p class="product-description event-description"><?php echo $event['description']?></p>
                    <h4 class="price event-price">Event Price: <b>$<?php echo $event['price']?></b></h4>
                </div>
            </div>
</div>

<!--include Footer-->
<?php require_once ("../footer.php");?>