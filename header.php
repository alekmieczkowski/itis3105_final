<?php 
require_once("session.php");
?>




<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Camp Niners</title>
  <meta name="description" content="Camp Niners">
  <meta name="author" content="SitePoint">


<!--Setup File Imports for different folders-->
<?php

#global#

#bootstrap
echo '<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">';
#font - Passion one
echo '<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">';

#global css
echo '<link rel="stylesheet" type="text/css" href="../assets/css/global.css">';
#Page Specific#
if($current_dir == "admin"){
    #admin section
    $test = "Hello";

    //include sql stuff for admin
    include("db/admin_sql.php");
    
}
else if($current_dir == "user"){
    #user section
    
    //user css
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/user.css">';
    //include sql stuff for user
    include("db/user_sql.php");


}
else if($current_dir == "site"){
    #site section
    
    //include css
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/site.css">';
}
?>

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>