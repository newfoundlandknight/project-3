<?php require 'header.php'; ?><?php

// Include config file
require_once "./db/config.php";
$link2=$link;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" type="text/css" />
    <link href="./css/styles_trip.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="./image/x-icon" href="/images/paddle-white_icon.png">
    <title>Adventures</title>
</head>
<body class="main">

<?php require 'menu-bar.php';?>

<div  class='form_100 flex-c '>
<div id='tile_top' class='tile_top'>		
    <div id='tliez' class='tilez '>           
        <div class='post-content'> 
            <h1>TRIP ADMIN</h1>
            <p>You can edit or delete any trip from this page.<br>you can also lookup any bookings 
            </p>
            <h2>Record DELETED!!</h2>
            <!-- Click on the tiles below for 2023 and 2024 dates and availability. -->
        </div> <!-- /post-content -->
    </div> <!-- /post -->
</div> <!-- /tile -->


<?php
$qq = $_GET['id'];
//

//****************************************
 $raw_results = mysqli_query($link,"DELETE FROM trips WHERE id = '". $qq ."'");
 print_r ($raw_results);


?>

<!-- ********************************* -->
</div>
<div></div>
    <?php 
   require 'footer.php'; 
    ?>



</body>
</html>