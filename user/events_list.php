<?php

//get all events
//$events=sql_getEvents();



if (isset($_POST['delete']))
{
    sql_delEvent($_POST['delete']);
}
$userEvents=sql_getRegisteredEventsForUser2();

?>
<div class="row">
    <?php 
        #for each event get all necesarry data
        foreach( $userEvents as $event):
            $regID=$event['regID'];
        $e_id = $event['activityID'];
        $e_name = $event['a_name'];
        $e_desc = $event['description'];
        //$e_price = $event['price'];
        //$e_age = $event['min_age'];
        $e_date = $event['a_date'];
        //$e_loc = $event['location'];
        $e_img = $event['image'];
        
        #convert date
        $date = str_replace('-','/',substr($e_date,0,10));

        ?>
        <!--Event Item-->
        <div class="col-lg-3 col-md-4 col-xs-2 event-item">
            <h3 class="event-name text-center"><?php echo $e_name ?></h3>
            <h4 class="event-date text-center"><?php echo $date?></h4>


            <img class="event-img center-block" src="../db/img/<?php echo $e_img?>"/>
            <div class="event-buttons text-center">
                <form action="" method="post">


                <a class="event-button" href="../site/event.php?eventID=<?php echo $e_id; ?>">Details</a>

                    <input type="hidden" name="delete" value="<?php echo $regID?>">
                    <input class="event-button event-remove" type="submit" value="Delete">
                </form>
            </div>
        </div>

    <?php endforeach; ?>
</div>