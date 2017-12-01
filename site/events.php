<?php
#Events display page. Links events to event detail page

$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
require_once ('../header.php');
include("../db/event_sql.php");
//get events
$events = sql_getEvents();
include ("../db/user_sql.php");




    if (isset($_POST['register']))
    {


        //sql_registerEvent($_SESSION['userID'],$_POST['register']);
        //sql_registerEvent($_SESSION['userID'],$_POST['register']);
        sql_registerEvent($_SESSION['userID'],$_POST['register22']);

    }


$registeredEvents=sql_getRegisteredEventsForUser();
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

                <?php foreach ($events as $event):?>


            <div class="container-fliud">
            <div class=" row wrapper">
                <div class="col-md-6">
                      <img class="center-block event-img" src="img/logo.png" />	
                </div>
                <div class="details col-md-6">

                    <form action="" method="post">


                        <input type="hidden" value="<?php echo $event['activityID']?>" name="register22">


                    <h3 class="product-title event-name"><?php echo $event['a_name']?></h3>
                    <h5 class="sizes event-date">Event Date: <strong><?php echo $event['a_date']?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Ages: <strong><?php echo $event['min_age']?>+</strong>
                    </h5>
                    <p class="product-description event-description"><?php echo $event['description']?></p>
                    <h4 class="price event-price">Event Price: <span><?php echo $event['price']?>$</span></h4>
                    <div class="action">



                        <?php
                        $flag=0;

                        //checck throught registered events
                        foreach ($registeredEvents as $registeredEvent):

                            if ($registeredEvent['actID']==$event['activityID'])
                            {

                                echo '<button class="event-button" name="register" type="submit" value="<?php echo $event[\'activityID\']?> " disabled>Register</button>';
                                $flag=1;
                            }

                            if ($flag==1)
                            {
                                break;
                            }



                            endforeach;

                        if ($flag==0)
                        {

                            echo '<button class="event-button" name="register" type="submit" >Register</button>';


                        }

                        ?>


                    </div>

                    </form>


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