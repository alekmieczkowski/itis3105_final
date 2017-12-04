<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/16/2017
 * Time: 7:19 PM
 */

$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
include("../header.php");




if (isset($_POST['fName']))
{
    if ($_POST['password']!=$_POST['confirmPassword'])
    {
        echo '<html> User name and confirm user name do not match</html>';

    }
    elseif ($_POST['age']<18)
    {
        echo '<html> Age must be above 18</html>';
    }
    else
    {
        $wow="wow";
        $db = db::getInstance();
        $stm1 = $db->prepare("insert into users (username, f_name, l_name,password,email,phone, age, member_since, image,isAdmin)
VALUES (?,?,?,?,?,?,?,?,'img/default.png',?)");
        $stm1->bindValue(1, $_POST['userName']);
        $stm1->bindValue(2, $_POST['fName']);
        $stm1->bindValue(3, $_POST['lName']);
        $stm1->bindValue(4, $_POST['password']);
        $stm1->bindValue(5, $_POST['email']);
        $stm1->bindValue(6, $_POST['phoneNumber']);
        $stm1->bindValue(7, $_POST['age']);
        $stm1->bindValue(8, date("M/d/y"));
        $stm1->bindValue(9, $_POST['role']);

        $stm1->execute();
        $stm1->closeCursor();

     //   sql_userSignup();

    }




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
    <input type="email" placeholder="Email Address" name="email"required><br>
    <input type="radio" name="role" value="1"required>Admin
    <input type="radio" name="role" value="0"required>User<br>


    <input type="submit" value="Sign Up22">


</form>

</html>
