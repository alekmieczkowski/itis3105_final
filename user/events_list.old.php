<?php
//get all events
$events=sql_getEvents();


$userEvents=sql_getRegisteredEventsForUser();
//$user=$_SESSION['userID'];

if (isset($_POST['registeredEvents']))
{
header('Location: show_registered_events.php');
}
?>

<div id="table" class="col-md-5  col-md-offset-0 col-xs-6 col-xs-offset-2">
            <table >
                <tr>
                    <th>Image</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Min. Age</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Register</th>

                </tr>

            <?php foreach ($events as $event ):?>




                <tr>
                    <th>



                    </th>

                    <th>
                        <?php echo $event['a_name']?>
                    </th>
                    <th>
                        <?php echo $event['description']?>
                    </th>
                    <th>
                        <?php echo $event['price']?>
                    </th>
                    <th>
                        <?php echo $event['min_age']?>
                    </th>
                    <th>
                        <?php echo $event['a_date']?>
                    </th>
                    <th>
                        <?php echo $event['a_name']?>
                    </th>

                    <th>




                    <form action="" method="post">
                              <input type="hidden" name="regActivity" value="<?php echo $event['activityID']?>">
                        <?php
                        $flag=0;

                        #check through registered courses
                        foreach ($userEvents as $userEvent):

                            if ($userEvent['actID']==$event['activityID']) {


                                echo "<input type='submit' value='Register' disabled >";
                                $flag = 1;
                            }
                        if ($flag==1)
                        {   break;}


                        endforeach;

                        if ($flag==0)
                        {
                            echo "<input type='submit' value='Register' >";
                        }
                        ?>


                        </form>





                    </th>


                </tr>



                <?php endforeach; ?>




            </table>

    <form action="" method="post">

        <input type="submit" name="registeredEvents" value="Show registered events">
    </form>

            
        </div>