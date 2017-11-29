<?php
#start session
if (!isset($_SESSION))
{
  session_start();
}
echo 'Session userID:  '.$_SESSION['userID'];
?>