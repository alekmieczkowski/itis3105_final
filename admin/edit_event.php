<?php

 /*
Edits Database Values for admin
*/



$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
include("../header.php");

#get Variables
$row = unserialize($_POST['row']);
$col_names = unserialize($_POST['col_names']);

#if edit is called
if (isset($_POST['edit']))
{
sql_editEvent();
$msg = "Update Succesfull!";
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
