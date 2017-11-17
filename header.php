<?php 
require_once("session.php");

#Setup CSS/JS Imports for different folders

if($current_dir == "admin"){
    #admin section
    $test = "Hello";

    //include sql stuff for admin
    include("db/admin_sql.php");
    
}
else if($current_dir == "user"){
    #user section
    
    //include sql stuff for user
    include("db/user_sql.php");
}

?>

