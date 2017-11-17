<?php
#import database
include('dataBase.php');

/*

users can:

- User will receive an email once they register 
- Add Users
- Deactivate Users
- Manage Users


*/


/*
Get All Users
*/
function sql_getUsers(){

    $db = db::getInstance();
    $stm=$db->prepare("select * from users");
    $stm->execute();
    $users=$stm->fetchAll();

    return $users;
}

?>