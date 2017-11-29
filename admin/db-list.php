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
                            foreach($table_col as $col){
                                echo '<th><input type="text" class="form-control" placeholder="'.$col.'" disabled></th>';
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
                            echo '<td>'.$row[$table_col[$x]].'</td>';
                         }
                         echo '</tr>';

                     }
                    ?>
                </tbody>
            </table>
        </div>


<script>
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/

</script>