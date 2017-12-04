<?php


include '../db/event_sql.php';

#get event ID
$eventID=$_GET['eventID'];

$event=sql_getEvent($eventID);

echo $eventID;
foreach ($event as $ev)
{
    echo $ev['a_name'];
    echo $ev['description'];
    echo $ev['price'];
    echo $ev['min_age'];
    echo $ev['a_date'];
    echo $ev['location'];
    echo $ev['image'];
}

?>