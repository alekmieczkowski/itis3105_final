<?
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
    header("Location: ../login.php");
}

#run disconnect
if(isset($_GET['disconnect'])){
    session_disconnect();
}
