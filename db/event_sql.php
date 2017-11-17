<?php
#import database
include('dataBase.php');

/*
Admin SQL queries

- Add an event 
- Delete an event 
- Register/unregister for an event
- View events 
- View registered events
- Users can choose from different times and locations for a certain event

*/


/*
Get all Events
*/
function sql_getEvents(){

    $db = db::getInstance();
    $stm=$db->prepare("select * from activities");
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;
}

/*
Delete Event
*/
function sql_delEvent($eventID){
    $db = db::getInstance();
    $sql = "Delete from activities where activityID=".$eventID;
    $stm=$db->prepare($sql);
    $stm->execute();

    return true;
}











?>