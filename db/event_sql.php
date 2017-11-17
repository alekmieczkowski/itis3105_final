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

/*
Register for event
*/

function sql_registerEvent($userID, $eventID){
    $db = db::getInstance();
    $sql = "Insert into reg_activities (userID, regID) VALUES(".$userID.",".$eventID.")";
    $stm=$db->prepare($sql);
    $stm->execute();

    return true;
}

/*
Unregister for event
*/

function sql_unregisterEvent($regID){
    $db = db::getInstance();
    $sql = "Delete from reg_activities where regID=".$regID;
    $stm=$db->prepare($sql);
    $stm->execute();

    return true;
}

/*
Get All registered Events
*/
function sql_getRegisteredEvents(){

    $db = db::getInstance();
    $sql = "Select * from reg_activities";
    $stm=$db->prepare($sql);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;

}

/*
Get Registered Events by User ID
*/
function sql_getUserEvents($userID){
    
    $db = db::getInstance();
    $sql = "Select * from reg_activities where userID=".$userID;
    $stm=$db->prepare($sql);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;

}

/*
Get all dates for certain event, and order by date
*/
function sql_getSameEvents($eventName){
    $db = db::getInstance();
    $sql = "Select * from activities where a_name=".$eventName."ORDER BY a_date";
    $stm=$db->prepare($sql);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;
}











?>