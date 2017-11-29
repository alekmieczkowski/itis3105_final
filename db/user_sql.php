<?php
#import database
include_once('dataBase.php');

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

//get events in json format
function sql_getEventsJson(){
    
        $db = db::getInstance();
        $stm=$db->prepare("select * from activities");
        $stm->execute();
        return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    }

function sql_userSignup()
{
    $db = db::getInstance();
    $stm1 = $db->prepare("insert into users (username, f_name, l_name,password,email,phone, age, isAdmin)
VALUES (?,?,?,?,?,?,?,?)");
    $stm1->bindValue(1, $_POST['userName']);
    $stm1->bindValue(2, $_POST['fName']);
    $stm1->bindValue(3, $_POST['lName']);
    $stm1->bindValue(4, $_POST['password']);
    $stm1->bindValue(5, $_POST['email']);
    $stm1->bindValue(6, $_POST['phoneNumber']);
    $stm1->bindValue(7, $_POST['age']);
    $stm1->bindValue(8, $_POST['role']);

    $stm1->execute();
    $stm1->closeCursor();

}


/*
Check if user exists in db
*/




?>