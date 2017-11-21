<?php
//get all events
$events=sql_getEvents();
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

                </tr>

            <?php foreach ($events as $event ):?>

                <tr>

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
                            <input type="submit" value="Register">

                        </form>
                    </th>
                </tr>

                <?php endforeach;?>




            </table>

            
        </div>