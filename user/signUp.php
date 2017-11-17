<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/16/2017
 * Time: 7:19 PM
 */

$current_dir = basename(dirname(__FILE__));
include("../header.php");




if (isset($_POST['fName']))
{

    signUp();
}


?>


<html>


<form action="" method="post">
    <input type="text" placeholder="First Name" name="fName" required><br>
    <input type="text" placeholder="Last Name" name="lName" required><br>
    <input type="text" placeholder="User Name" name="userName"required><br>
    <input type="text" placeholder="Password" name="password"required><br>
    <input type="text" placeholder="Confirm Password" name="confirmPassword"required><br>
    <input type="text" placeholder="Age" name="age"required><br>
    <input type="text" placeholder="Phone Number" name="phoneNumber"required><br>
    <input type="text" placeholder="Email Address" name="email"required><br>
    <input type="radio" name="role" value="Admin"required>Admin
    <input type="radio" name="role" value="User"required>User<br>
    <input type="submit" value="Sign Up">


</form>

</html>
