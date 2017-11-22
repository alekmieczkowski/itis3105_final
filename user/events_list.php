<?php

//get all events
$events=sql_getEvents();



?>
<div class="row">
    <?php 
        #for each event get all necesarry data
        foreach( $events as $event): 
        $e_id = $event['activityID'];
        $e_name = $event['a_name'];
        //$e_desc = $event['description'];
        //$e_price = $event['price'];
        //$e_age = $event['min_age'];
        $e_date = $event['a_date'];
        //$e_loc = $event['location'];
        $e_img = $event['image'];
        
        #convert date
        $date = str_replace('-','/',substr($e_date,0,10));

        ?>
        <!--Event Item-->
        <div class="col-lg-2 col-md-3 col-sm-3 event-item center-block">
            <h3 class="event-name text-center"><?php echo $e_name ?></h3>
            <h4 class="event-date text-center"><?php echo $date?></h4>
            <img class="event-img center-block" src="../db/img/<?php echo $e_img?>"/>
            <div class="event-buttons text-center">
                <a class="event-button" href="../site/event.php?eventID=<?php echo $e_id; ?>">Details</a>
                <a class="event-button event-remove" href="?delete=<?php echo $e_id; ?>">Remove</a>
            </div>
        </div>

    <?php endforeach; ?>
</div>