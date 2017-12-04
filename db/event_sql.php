<?php
#import database
include_once('dataBase.php');

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

function sql_getEvent($eventID){

    $db = db::getInstance();
    $stm=$db->prepare("select * from activities WHERE activityID=?");
    $stm->bindValue(1,$eventID);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;
}

/*
Get Event image
*/
function sql_getEventImage($eventID){
    
        $db = db::getInstance();
        $stm=$db->prepare("select image from activities where activityID=".$eventID);
        $stm->execute();
        $event_img=$stm->fetch();
        header('Content-type: image/jpg');
        return $event_img;
    }

/*
Delete Event
*/
function sql_delEvent($eventID){
    $db = db::getInstance();
    $sql = "Delete from reg_activities where regID=$eventID";
    $stm=$db->prepare($sql);
    $stm->execute();

    return true;
}

/*
Register for event
*/

function sql_registerEvent($userID, $eventID){
    $db = db::getInstance();
    $sql = "Insert into reg_activities (userID, actID) VALUES(".$userID.",".$eventID.")";
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
function sql_getUserEvents(){
    $userID=3;
    
    $db = db::getInstance();
    $sql = "Select * from reg_activities where userID=".$userID;
    $stm=$db->prepare($sql);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;

}


function sql_getRegisteredEventsForUser2(){
    $userID=$_SESSION['userID'];


    $db = db::getInstance();
    $sql = "Select * from reg_activities join activities on actID=activityID where userID=".$userID;
    $stm=$db->prepare($sql);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;

}


function sql_getEvents22(){

    $db = db::getInstance();
    $stm=$db->prepare("select * from activities");
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


/*
Get any table column names
*/
function sql_getColNames($table_name){

    $db = db::getInstance();

    #get col names
    $rs = $db->query('SELECT * FROM '.$table_name.' LIMIT 0');


    #initiate columns array
    $columns;
    
        #add all col names to array
        for ($i = 0; $i < $rs->columnCount(); $i++) {
            $col = $rs->getColumnMeta($i);
            $columns[] = $col['name'];
        }
    
        #return array
        return $columns;
    }

function sql_editEvent(){

    $db=db::getInstance();
    $stm1=$db->prepare('update activities set a_name=?, description=?, price=?,min_age=?, a_date=?, location=?, image=? WHERE activityID=?');
    $stm1->bindValue(1,$_POST['name']);
    $stm1->bindValue(2,$_POST['description']);
    $stm1->bindValue(3,$_POST['price']);
    $stm1->bindValue(4,$_POST['age']);
    $stm1->bindValue(5,$_POST['date']);
    $stm1->bindValue(6,$_POST['location']);
    $stm1->bindValue(7,$_POST['image']);
    $stm1->bindValue(8,1);
    $stm1->execute();


}




#image render
if(isset($_GET['imageBlob'])){
    header('Content-type: image/jpg');
    echo $data['myImage'];
}







/*updates any table with data supplied from array. 
DATA ALWAYS CONTAINS ID 
*/
function sql_updateTable($data_s, $table_name){
    $db=db::getInstance();
    #Sql String
    $sql="update ".$table_name." set";
    
    #deserialize Data
    $data = unserialize($data_s);

    #Get keys from associative data arr
    $data_names = array_keys($data);

    #row names that have value to update
    $filtered_data = null;
    #iterate through each value
    for($x = 2; $x < count($data); $x++){
        
        #add data to string
        $sql.= " ".$data_names[$x]."=?,";

    }
    #remove last comma and add Where statement
    $sql = substr($sql, 0, -1);
    #add where clause
    $sql.=" WHERE ".$data["id"]."=?";

    echo $sql;
    echo " || Data: ".print_r($data);
    //echo "|| Data_S: ".print_r($data_s);
    #prepare sql statemnet
    $stm1=$db->prepare($sql);

    #apply bind for each value
    
    for($x = 0; $x < count($data)-2; $x++){
        
        #bind value
        //echo 'BINDED VALUE: '.$data[$data_names[$x+2]];
        $stm1->bindValue($x+1,$data[$data_names[$x+2]]);

    }
    echo "Data: ".$data["id"]." DataID: ".$data[$data["id"]];
    #bind ID
    $stm1->bindValue($x+1,$data[$data["id"]]);

    #execute query
    $stm1->execute();
}
?>