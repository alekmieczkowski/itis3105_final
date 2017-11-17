<?php
#import database
include('dataBase.php');

/*
Pull all users
*/
function sql_getUsers(){

    $db = db::getInstance();
    $stm=$db->prepare("select * from users");
    $stm->execute();
    $users=$stm->fetchAll();

    return $users;
}

/*
Check if user exists in db
*/




?>