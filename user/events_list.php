<?php

//get all events
$events=sql_getEvents();



?>
<div class="row">
    <?php foreach( $events as $event): 
        $e_name = $event['a_name'];
        $e_desc = $event['description'];
        $e_price = $event['price'];
        $e_age = $event['min_age'];
        $e_date = $event['a_date'];
        $e_loc = $event['location'];
        $e_img = $event['image'];
        
        #convert date
        $date = str_replace('-','/',substr($e_date,0,10));

        ?>
    <div class="col-sm-2 event-item ">
        <h3 class="event-name text-center"><?php echo $e_name ?></h3>
        <h4 class="event-date text-center"><?php echo $date?></h4>
        <img class="event-img center-block" src="../db/img/<?php echo $e_img?>"/>
        <div class="event-buttons text-center">
            <a class="event-button" href="#">Details</a>
            <a class="event-button event-remove" href="#">Remove</a>
        </div>
        


    </div>

    <?php endforeach; ?>
    </div>