<?php
//$current_dir = basename(dirname(__FILE__));
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/16/2017
 * Time: 7:19 PM
 */

//require_once ('../header.php');
require_once ('../db/dataBase.php');

if (isset($_POST['username'])&&isset($_POST['password']))
{

    $stm=$dbs->prepare("select * from users");
    $stm->execute();
    $users=$stm->fetchAll();


    foreach ($users  as $user)
    {
        if ($user['username']==$_POST['username'])
        {
            echo "wow";
        }

    }

}




?>

<html>
<form action="" method="post">

    <input type="text" name="username" placeholder="Username" ><br>



    <input type="text" name="password" placeholder="Password" ><br>

    <input type="submit" value="Login"><br>
    <input type="checkbox" >Remember Me
</form>


</html>

