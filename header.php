<?php 
require_once("session.php");

#Setup CSS/JS Imports for different folders

if($current_dir == "admin"){
    #admin section
    $test = "Hello";
}
else if($current_dir == "user"){
    #user section
    
    //include sql stuff for user
    include("db/user_sql.php");
}

?>

