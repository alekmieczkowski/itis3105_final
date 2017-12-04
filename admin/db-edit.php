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
$table_name = $_POST['table_name'];
$updates = null;
//echo "ROW: ".print_r($row);
//echo "COL NAMES: ".print_r($col_names);
#if edit is called
if (isset($_POST['edit']))
{
    #create array with all inputs. Add ID to first line
    $updates["id"] = $col_names[0];
    
    echo "ID NAME: ".$col_names[0]." ID: ".$row[$col_names[0]]." COL NAMES: ";
#set ID
$updates[$col_names[0]] = $row[$col_names[0]];
    #loop through each col check if theres update needed 
    foreach($col_names as $name){
        //echo "Colname: ".$name."   "; 
        //echo "ColVal: ".$_POST[$name]."   "; 
        #if submitted value is not empty add written in values to array
        if(!empty($_POST[$name]) || $_POST[$name]=='0' ){
            #array { col_name => col_value}
            $updates[$name] = $_POST[$name];
            //echo "ColVal Saved: ".$updates[$name] ."   "; 
        }

    }
    
    //echo "|| UPDATES: ".print_r($updates);
    #sends off data to update function
    sql_updateTable(serialize($updates), $table_name);
    //header("Location: ../admin/adminHome.php");

   // $msg = "Update Succesfull!";
}
?>
<!--Insert Navbar-->
<?php include("../navbar.php");?>

<style>
    .submit-button{
        position:relative;
        margin:auto;
        margin-bottom:20px;
        padding:10px;
        border: 4px solid #eba123;
        border-radius:6px;
        background-color:#ffca68;
        font-size:20px;
    }

    .submit-button:hover{
        background-color:#eba123;
    }
</style>

<div class="container-fluid">
    <div class="row row-top">
        <!--Header-->
        <div class="col-md-12 text-center">
            <h1>Edit Object</h1>
        </div>
    </div>
     <!--Spacing-->
    <div class="col-md-3"></div>
    <!--Edit box-->
    <div class="col-md-8" >
        <!--Start form-->
        <form action="" method="post">
            <div class="row center-block">
                <!--Render Out Inputs-->
                <?php
                #iterate through every item in arrays
                for($iterator = 0; $iterator < count($col_names); $iterator++){
                    #add cols every 3 inputs
                    if($iterator == 0){
                        echo '<div class="col-md-6 col-xs-12">';
                    }
                    #if after 3rd item
                    elseif($iterator % 4 == 0){
                        echo '</div><div class="col-md-6 col-xs-12">';

                    }
                    
                    #echo inputs and stuff
                    echo '<h2>'.$col_names[$iterator].'</h2>';
                    //echo '      '.gettype($row[$iterator]);
                    #if bool and bypasses userID
                    if($col_names[$iterator]=="isAdmin" || $col_names[$iterator] == "isActive")
                    {
                        echo '<input type="hidden" name="'.$col_names[$iterator].'" value="0">';
                        echo '<input type="checkbox" name="'.$col_names[$iterator].'" value="1"'.($row[$iterator]==1 ? 'checked' : '').'><br>';
                        
                    }
                    #everything else
                    else{
                        echo '<input type="text" class="input-box" placeholder="'.$row[$iterator].'" name="'.$col_names[$iterator].'"><br>';
                    }
                    
                    
                    
                }
                echo '</div>';
                ?>
            <div class="col-md-6 col-xs-12">
                <input type="submit"  class="submit-button" name="edit" value="Update">
                <input type="hidden"  name="row" value="<?php echo htmlentities(serialize($row));?>">
                <input type="hidden"  name="col_names" value="<?php echo htmlentities(serialize($col_names));?>">
                <input type="hidden"  name="table_name" value="<?php echo $table_name?>">
            </div>

        </form>
    </div>
</div>





            <!--Include Footer-->
            <?php include("../footer.php"); ?>
