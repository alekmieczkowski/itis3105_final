<?php
#Data from db
$table = $table_name;
$data = $table_data;

#getting table col names
$table_col = sql_getColNames($table);

?>

<p><?php 

?></p>
<div class="panel panel-primary  table-responsive filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><img class="filter-img" src="img/filter.gif"/></button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <!--Adding columns based on cols in db-->
                        <?php
                            $count = 0;
                            foreach($table_col as $col){
                                switch($count){
                                    case 0: echo '<th><input type="text" class="form-control" placeholder="ID" disabled></th>'; break;
                                    default: echo '<th><input type="text" class="form-control" placeholder="'.$col.'" disabled></th>'; break;
                                }
                                
                                $count++;
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <!--populating table-->
                    <?php

                     #for each row
                     foreach($data as $row){
                         echo '<tr>';
                         #add row items
                         for($x = 0; $x < count($table_col); $x++){

                            #if at isActive col
                            if($table_col[$x] == 'isAdmin' || $table_col[$x] == 'isAdmin'){

                                $result = '<td width="70px"><b>';
                                
                              

                                #if active check is enabled (puts in checkbox)
                                if($active_check){

                                    #checks  if active and adds active flag if it is.
                                    if($row[$table_col[$x]] == true)
                                        $result.="YES";
                                    else
                                        $result.="NO";
                                }

                                $result.='</b></td>';
                                
                                #return result
                                echo $result;

                            }
                            #if at any other col
                            else{
                                echo '<td>'.$row[$table_col[$x]].'</td>';
                            }
                         }
                         
                         # edit button 
                         $row_s = htmlentities(serialize($row));
                         $col_s = htmlentities(serialize($table_col));
                         echo '<td><form method="post" action="db-edit.php">';
                         echo '<input type="submit" class="edit-button" value="Edit"/>';
                         #sends serialized row data
                         echo '<input type="hidden" name="row" value="'.$row_s.'"/>';
                         #sends column names
                         echo '<input type="hidden" name="col_names" value="'.$col_s.'"/>';
                         #sends table name
                         echo '<input type="hidden" name="table_name" value="'.$table_name.'"/>';

                         echo '</form></td>';

                         #end row
                         echo '</tr>';

                     }
                     #reset active check after execution
                     $active_check = false;
                    ?>
                </tbody>
            </table>
        </div>


<script>
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/

</script>