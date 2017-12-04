<?php

//get all events
//$events=sql_getEvents();



if (isset($_POST['delete']))
{
    sql_delEvent($_POST['delete']);
}
$userEvents=sql_getRegisteredEventsForUser();

?>
<div class="row">
    <div class="col-xs-12 text-center">
        <h2>Registered Events <?echo $_SESSION['userID']?></h2>
    </div>
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
        $imm="../";

        
        #convert date
        $date = str_replace('-','/',substr($e_date,0,10));

        ?>
        <!--Event Item-->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 event-item">
            <h3 class="event-name text-center"><?php echo $e_name ?></h3>

            <h4 class="event-date text-center"><?php echo $date?></h4>


            <img class="event-img center-block" src="<?php echo $imm.$e_img?>" width="200" height="150"/>
            <div class="event-buttons text-center">
                <form action=""  method="POST" enctype='multipart/form-data'>


                <!--<a class="event-button" href="../site/event.php?eventID=<?php echo $e_id; ?>">Details</a>-->

                    <input type="hidden" name="delete" value="<?php echo $regID?>">
                    <input class="event-button event-remove" type="submit" value="Delete">
                </form>
            </div>
        </div>

    <?php endforeach; ?>
</div>