<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 11/16/2017
 * Time: 7:19 PM
 */

require_once ('../db/dataBase.php');

if (isset($_POST['firstName']))
{
    if ($_POST['password']==$_POST['confirmPassword']) {


        $stm1 = $dbs->prepare("insert into users (username, f_name, l_name,password,email,phone, age, isAdmin)
VALUES (?,?,?,?,?,?,?,?)");
        $stm1->bindValue(1, $_POST['userName']);
        $stm1->bindValue(2, $_POST['fName']);
        $stm1->bindValue(3, $_POST['lName']);
        $stm1->bindValue(4, $_POST['password']);
        $stm1->bindValue(5, $_POST['email']);
        $stm1->bindValue(6, $_POST['phoneNumber']);
        $stm1->bindValue(7, $_POST['age']);
        $stm1->bindValue(8, $_POST['role']);

        $stm1->execute();
        $stm1->closeCursor();

        echo "wow";
    }
    else
    {

    }
}


?>

<form action="" method="post">
    <input type="text" placeholder="First Name" name="ftName" required><br>
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
