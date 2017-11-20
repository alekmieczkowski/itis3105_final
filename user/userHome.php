<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/19/2017
 * Time: 9:34 PM
 */
$current_dir = basename(dirname(__FILE__));
include("../header.php");
//include_once ("signin.php");

//register for an event
if (isset($_POST['regActivity']))
{
    sql_registerEvent(2,$_POST['regActivity']);
}

$events=sql_getEvents();

foreach ($events as $event)
{

    echo $event['a_name'];
}


?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css"/>
</head>
<body>
<div id="table">


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
</body>
</html>

