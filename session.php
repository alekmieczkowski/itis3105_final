<?php

#start session
if (!isset($_SESSION))
{
  session_start();
}


#redirect off session
if(isset($_SESSION['fname'])&& !empty($_SESSION['fname'])) { 
    
    #if session exists, and is not empty

}

#session disconnect
function session_disconnect(){
    session_destroy();
    //refresh page
    header("Refresh:0");
    unset($_GET['disconnect']);
    header("Location: ../site/home.php");
}

#run disconnect
if(isset($_GET['disconnect'])){
    session_disconnect();

}

#run update session
if(isset($_GET['update_session'])){
    update_session();

}

function updateSession(){
    $_SESSION['userID']=$user['userID'];
    $_SESSION['f_name']=$user['f_name'];
    $_SESSION['l_name']=$user['l_name'];
    $_SESSION['username']=$user['username'];
    $_SESSION['email']=$user['email'];
    $_SESSION['phone']=$user['phone'];
    $_SESSION['age']=$user['age'];
    $_SESSION['member_since']=$user['member_since'];
    $_SESSION['isAdmin'] = $user['isAdmin'];
}
?>