<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/29/2017
 * Time: 11:34 AM
 */


include('../db/event_sql.php');



if (isset($_POST['regID']))
{



    sql_delEvent($_POST['regID']);
}
$registeredEvents=sql_getRegisteredEventsForUser2();

?>


<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css" />
</head>

<table >
    <tr>
        <th>Image</th>
        <th>Event Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Min. Age</th>
        <th>Location</th>
        <th>Date</th>
        <th>Delete</th>

    </tr>

    <?php foreach ($registeredEvents as $registeredEvent):?>

<tr>
    <th></th>
    <th><?php echo $registeredEvent['a_name']?></th>
    <th><?php echo $registeredEvent['description']?></th>
    <th><?php echo $registeredEvent['price']?></th>
    <th><?php echo $registeredEvent['min_age']?></th>

    <th><?php echo $registeredEvent['location']?></th>
    <th><?php echo $registeredEvent['a_date']?></th>
    <th>
        <form action="" method="post">

            <input type="hidden" name="regID" value="<?php echo $registeredEvent['regID']?>">
            <input type="submit" name="delete" value="Delete">
        </form>
    </th>




</tr>

    <?php endforeach; ?>
</table>
</html>

