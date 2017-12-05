<?php


$current_dir = basename(dirname(__FILE__));
$current_file = basename(__FILE__);
include("../header.php");


$id = $_GET['id'];


#if data submitted
if(isset($_POST['add'])){
    
    if($id == "users"){

        if(!isset($_POST['role'])){
            $_POST['role'] = 0;
        }
        #add user
        sql_userSignup();
        header("Location: adminHome.php");
    }
    else if($id== "events"){
        #add events
        $target_dir = "images/";
        
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        $upload_path ="../images/".basename($_FILES['image']["name"]);                                   
        move_uploaded_file($_FILES['image']["tmp_name"], '../'.$target_file);
        $_POST['image']= $target_dir.$_POST['image'];
        echo "In Events add";
        sql_addEvent();
        header("Location: adminHome.php");
    }
}
?>

<!--Insert Navbar-->
<?php include("../navbar.php");?>


    <div class="container">
        <!--Header-->
        <div class="row row-top">
            <div class="col-md-12 text-center">
                <h1>Add <?php echo $id?></h1>
            </div>
        </div>
        <!--Layout-->
        <form action="" method="POST">
            <div class="row">
                <!--Layout: Events-->
                <?php if($id == "events"):?>
                    <!--Event Name-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Event Name</h2>
                        <input type="text" class="input-box" name="a_name" required>
                    </div>

                    <!--Description-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Event Description</h2>
                        <input type="text" class="input-box" name="description" required>
                    </div>

                    <!--Price-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Price</h2>
                        <input type="number" class="input-box" name="price" required>
                    </div>

                    <!--Min Age-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Age</h2>
                        <input type="number" class="input-box" name="age" required>
                    </div>

                    <!--Min Age-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Date</h2>
                        <input type="date" class="input-box" name="date" required>
                    </div>

                    <!--Location-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Location</h2>
                        <input type="text" class="input-box" name="location" required>
                    </div>

                    <!--Image-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Image</h2>
                        <input type="file" class="input-box" style="width:100%" name="image" required>
                    </div>
                <?php endif;?>

                <!--Layout: Users-->
                <?php if($id == "users"):?>
                    <!--User Name-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>User Name</h2>
                        <input type="text" class="input-box" name="userName" required>
                    </div>

                    <!--f_name-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>First Name</h2>
                        <input type="text" class="input-box" name="fName" required>
                    </div>

                    <!--l_name-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Last Name</h2>
                        <input type="text" class="input-box" name="lName" required>
                    </div>

                    <!--password-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Password</h2>
                        <input type="password" class="input-box" name="password" required>
                    </div>

                    <!--email-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Email</h2>
                        <input type="email" class="input-box" name="email" required>
                    </div>

                    <!--phone-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Phone #</h2>
                        <input type="number" class="input-box" name="phoneNumber" required>
                    </div>

                    <!--age-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Age</h2>
                        <input type="number" class="input-box" name="age" required>
                    </div>
                    <!--Admin?-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>Admin?</h2>
                        <input type="checkbox" name="role" value="1">
                    </div>

                <?php endif;?>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="submit"  class="submit-button" name="add" value="add">
                </div>
            </div>

        </form>
    </div>


    

<!--Insert Footer-->
<?php include("../footer.php");?>