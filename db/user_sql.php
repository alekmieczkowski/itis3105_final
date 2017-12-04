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

function sql_getRegisteredEventsForUser(){
    $userID=$_SESSION['userID'];

    $db = db::getInstance();
    $sql = "Select * from reg_activities where userID=".$userID;
    $stm=$db->prepare($sql);
    $stm->execute();
    $events=$stm->fetchAll();

    return $events;

}




function sql_userSignup()
{
    $db = db::getInstance();
    $stm1 = $db->prepare("insert into users (username, f_name, l_name,password,email,phone, age,member_since, isAdmin)
VALUES (?,?,?,?,?,?,?,?,?)");
    $stm1->bindValue(1, $_POST['userName']);
    $stm1->bindValue(2, $_POST['fName']);
    $stm1->bindValue(3, $_POST['lName']);
    $stm1->bindValue(4, $_POST['password']);
    $stm1->bindValue(5, $_POST['email']);
    $stm1->bindValue(6, $_POST['phoneNumber']);
    $stm1->bindValue(7, $_POST['age']);
    $stm1->bindValue(8,date("M/d/y"));
    $stm1->bindValue(9, $_POST['role']);

    $stm1->execute();
    $stm1->closeCursor();

}

/*
check if obj exists in db
Return true if it does exist, false if it does not
*/
function sql_checkIfExists($table_name, $col_name, $value){
    try{
        $db = db::getInstance();
        $sql = "SELECT * FROM ".$table_name." WHERE ".$col_name."='".$value."'";
        $stm=$db->prepare($sql);
        $stm->execute();
        
        #check for empty rows
        if($stm->rowCount() > 0)
            return true;
        else
            return false;
    }
    catch(SQLException $e){
        return false;
    }
}

/*
User Ajax calls
*/

if(isset($_GET['action']))
{

    #check email
    if($_GET['action'] == "checkEmail"){

        #if email exists
        if(sql_checkIfExists("users", "email", $_GET['value'])){
           echo false;
        }
        else
            echo true;

    }
    
    #check username
    if($_GET['action'] == "checkUsername"){

        #if email exists
        if(sql_checkIfExists("users", "username", $_GET['value'])){
           echo false;
        }
        else
            echo true;

    }

    
}


?>