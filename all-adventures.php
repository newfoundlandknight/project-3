<?php require 'header.php'; ?><?php

// Include config file
require_once "./db/config.php";
// Define variables and initialize with empty values
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" type="text/css" />
    <link href="./css/styles_trip.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="./image/x-icon" href="./images/paddle-white_icon.png">
    <title>Adventures</title>
</head>
<body class="main">
    <!-- Load main!! -->

<?php require 'menu-bar.php';?>

<div  class='form_100 flex-c '>
<div id='tile_top' class='tile_top'>		
    <div id='tliez' class='tilez '>           
        <div class='post-content'> 
            <h1>UPCOMING ADVENTURES</h1>
            <p>At Halifax Canoe & Kayak, we proudly offer the finest selection of guided expeditions across the Maritimes. Join our certified guides and a group of fellow intrepid paddlers and feel the camaraderie that only time camping in nature can bring as youi navigate a wild Maritime river through an untouched landscape and wonder, in awe as a herd of curious caribou approach your campsite or a whale breaches besides you.</p> <p> Our team will work with you to match your experience level and desires with the adventure of your dreams. 
            </p>
            <h2>Let the adventure begin!</h2><video width="100%" loop="true" autoplay="autoplay"   id="vid" muted  id ="vid">
  <source src="./images/mountain-70462.mp4" type="video/mp4">
  
  Your browser does not support the video tag.
</video>
            <!-- Click on the tiles below for 2023 and 2024 dates and availability. -->
        </div> <!-- /post-content -->
    </div> <!-- /post -->
</div> <!-- /tile -->
<!--<div id='tile' class='tile'>		
    <div id='tliez' class='tilez '>           
        <div class='post-content'>

</div></div></div>-->
<!--<iframe width="560" height="315" src="./images/mountain-70462.mp4" frameborder="0" allowfullscreen></iframe>
      </iframe> -->

<?php
$q = "24";
//$link = mysqli_connect("localhost", "root", "","user") or die("Error connecting to database: ".mysql_error());

//****************************************
 $raw_results = mysqli_query($link,"SELECT * FROM trips ");
// print_r ($raw_results);

if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
    while($results = mysqli_fetch_array($raw_results)){
    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
    $summary_short= substr($results['summary'], 0, 210) . " ...MORE INFO"; 
     
    $date = $results['tripDate'];
    $addedDays = $results['duration'];
    $newDate = date('Y-m-d', strtotime($date. " + $addedDays days"));
    $date =  date('m/d/Y (D)', strtotime($date));
    $newDate =  date('m/d/Y (D)', strtotime($newDate));
    
    $header = $results['header'];
    $id =$results['id'];
    $image_src="./trip_images/" . $results['trip_image'];
// echo $image_src;

echo"
<div id='tile' class='tile'>		
    <div id='tliez' class='tilez '>           
        <div class='post-content'>
                <a href='trip.php?id={$id}'>
                    <div class='trip-thumb'>
                        <img alt='' src='{$image_src}'>
                    </div>
                </a>

                <div class='trip-block-info' >
                    <h1>{$header}</h1>
                    <h3>{$date} - {$newDate}    </h3>
                    <p>{$summary_short}</p>
                </div>
                <a href='trip.php?id={$id}'>
                    <div class='cna-link'><span>More Information</span></div>
                </a>
        </div> <!-- /post-content -->
    </div> <!-- /post -->
</div> <!-- /tile -->


";


}// end while
    
}
else{ // if there is no matching rows do following
    echo "No results";
}



?>

<!-- ************************************ -->

<!-- ******************************************** -->





<!-- ********************************* -->
</div>
<div></div>
    <?php 
   require 'footer.php'; 
    ?>
</body>
</html>




    