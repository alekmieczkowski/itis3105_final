<?php
#if update is set
if (isset($_POST['update'])){
    #define associative array for sql call and add userID 
    $data["id"] = 'userID';
    $data["userID"] = $_SESSION['userID'];
    #diry way of doin' it
    $col_names = ["username","f_name","l_name", "password", "email", "phone", "age","image"];
    
    #check for values to update
    foreach($col_names as $col_name){

        #if image upload
        if($col_name == "image" && isset($_FILES[$col_name]) && count($_FILES[$col_name]['error']) == 1){
            $target_dir = "img/";
            
            $target_file = $target_dir . basename($_FILES[$col_name]["name"]);                                        
            move_uploaded_file($_FILES[$col_name]["tmp_name"], $target_file);       
        
        #all other fields
            #data = {col_name => col_value}
            $data[$col_name] = $target_file;
                
            #update session
            $_SESSION[$col_name] = $target_file;
        }
        #if val is not empty
        else if(!empty($_POST[$col_name])){

            
            
                #data = {col_name => col_value}
                $data[$col_name] = $_POST[$col_name];
                
                #update session
                $_SESSION[$col_name] = $_POST[$col_name];
            
        }
        
    }
    #set table name
    $table_name = "users";

    #update db
    sql_updateTable(serialize($data), $table_name);
    
    #update session
    

    //header("Refresh:0");
}
?>

<style>
.visible {
    visibility: visible;
    opacity: 1;
    transition: opacity 2s linear;
}
.hidden {
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s 2s, opacity 2s linear;
}

div#update > form > div > input{
    background-color:#ffca68;
    border:2px solid #ffca68;
    border-radius:2px;
}

div#update > form > div > input[type="submit"]{
    color: #7e4412;
    margin-top:20px;
}


::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #7e4412;
  }
  ::-moz-placeholder { /* Firefox 19+ */
    color: #7e4412;
  }
  :-ms-input-placeholder { /* IE 10+ */
    color: #7e4412;
  }
  :-moz-placeholder { /* Firefox 18- */
    color: #7e4412;
  }

</style>

<div class="col-xs-12 text-center">
    <h2>Profile</h2>
</div>

<!--Profile Image-->
<div class="media">
    <!--email-->
    <img class="media-object dp img-circle center-block" src="<?php echo $_SESSION['image'];?>" style="width: 200px;height:200px;">
     
    <!--Mail Button/ Labels-->
        <div class="media-body">
            <h4 class="media-heading">Welcome <?php echo $_SESSION['f_name'] ?></h4>
            <a id="showUpdate" href="#"><span><img class="email" src="img/gear-icon.png"/></span></a>
            <span class="label label-default">Member Since<?php echo " " .$_SESSION['member_since']?></span>
        </div>
</div>

<!--Update User Form-->
<div class="row"  id="update">
    <form action="" name="update" method="POST" enctype="multipart/form-data">

        <div class="col-md-6 col-sm-12">
            <h3>Email</h3>
            <input type="email" name="email" placeholder="<?php echo $_SESSION['email'];?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <h3>First Name</h3>
            <input type="text" name= "f_name" placeholder="<?php echo $_SESSION['f_name'];?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <h3>Last Name</h3>
            <input type="text" name="l_name" placeholder="<?php echo $_SESSION['l_name'];?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <h3>Phone</h3>
            <input type="number" name="phone" placeholder="<?php echo $_SESSION['phone'];?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <h3>Age</h3>
            <input type="number" name="age" placeholder="<?php echo $_SESSION['age'];?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <h3>Profile Picture</h3>
            <input type="file" name="image"  id="image"  style="width:100%;"/>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <input type="submit" name="update" value="Update">
        </div>
    </form>
</div>