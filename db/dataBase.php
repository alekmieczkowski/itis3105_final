<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 9/29/2017
 * Time: 5:38 PM
 */
$dsn='mysql:host=localhost;dbname=summer_camp';
$username='root';
$password='';

try {


    $dbs = new PDO($dsn, $username, $password);

    $dbs->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbs->setAttribute(PDO:: ATTR_EMULATE_PREPARES,false);




}

catch (PDOException $exceptionex)
{
    $error=$exceptionex->getMessage();

    echo "database name is incorrect";

}
?>

