<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/21/2017
 * Time: 1:22 PM
 *
 */

$current_dir = basename(dirname(__FILE__));
include("../header.php");

if (isset($_POST['edit']))
{
sql_editEvent();
}
?>

<form action="" method="post">


<html>
<h3>Event Name </h3>
<input type="text" name="name" required>

<h3>Description </h3>
<input type="text" name="description" >

<h3>Event Price </h3>
<input type="text" name="price" >

<h3>Minimum Age </h3>
<input type="text" name="age" >

<h3>Event Date </h3>
<input type="date" name="date">

<h3>Location </h3>
<input type="text" name="location">

<h3>Image </h3>
<input type="text" name="image"><br><br>

<input type="submit" name="edit" value="submit">
</form>

</html>
