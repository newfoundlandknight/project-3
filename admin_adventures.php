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
            <h2>Let the adventure begin!</h2>
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
//

//****************************************
 $raw_results = mysqli_query($link,"SELECT * FROM trips ");
// print_r ($raw_results);

if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
    while($results = mysqli_fetch_array($raw_results)){
    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
    $summary_short= substr($results['summary'], 0, 210) . " ...MORE INFO"; 
    $summary =$results['summary'];
    $date = $results['tripDate'];
    $addedDays = $results['duration'];
    $newDate = date('Y-m-d', strtotime($date. " + $addedDays days"));
    $date =  date('m/d/Y (D)', strtotime($date));
    $newDate =  date('m/d/Y (D)', strtotime($newDate));
    
    $header = $results['header'];
    $id =$results['id'];
    $image_src="./trip_images/" . $results['trip_image'];
    $maxSeats= $results['maxSeats'];
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
                    <h1>{$header} - {$id}</h1>
                    <h3>{$date} - {$newDate}    </h3>
                    <p>{$summary}</p>
                    
                </div>
                    <div class='cna-link'><input type='submit' value='edit' onclick='updateTrp(\"{$header}\" , \"{$id}\");'>   <input type='submit' value='delete' onclick='lt(\"{$header}\" , \"{$id}\");'></div>
                    <div class='cna-link'><span>".checkBooking($header)." out of {$maxSeats} filled</span> </div>
                
        </div> <!-- /post-content -->
    </div> <!-- /post -->
</div> <!-- /tile -->


";


}// end while
    
}
else{ // if there is no matching rows do following
    echo "No results";
}


$bookingId =1;
function checkBooking ($qq){
    $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($link2 === false)
    {// Check connection
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $raw = mysqli_query($link2,"SELECT * FROM bookings WHERE tripName = '". $qq ."'");

    if(mysqli_num_rows($raw) == 0)
    { 
        $tr = "0";
    } 
    else 
    {
        $tr = mysqli_num_rows($raw);
    } 
          return $tr ; 
        // while($results = mysqli_fetch_array($raw)){     }
}
// Define variables and initialize with empty values


?>

<!-- ********************************* -->
</div>
<div></div>
    <?php 
   require 'footer.php'; 
    ?>
<script>function lt($tripDel,$Id) {
    // alert ($tripDel);
// confirm("Are you sure you want to delete " + $tripDel +"!\nEither OK or Cancel.");
 
if (confirm("Are you sure you want to delete " + $tripDel +" "+ $Id  + " !\nEither OK or Cancel.")) {
  window.location.href = "trip_del.php?id=" +$Id;
} else {
  alert ("Close one!!");
}
}
function updateTrp($tripDel,$Id) {
    // alert ($tripDel);
// confirm("Are you sure you want to delete " + $tripDel +"!\nEither OK or Cancel.");
 
if (confirm("Are you sure you want to edit " + $tripDel +" "+ $Id  + " !\nEither OK or Cancel.")) {
  window.location.href = "trip_updater.php?id=" +$Id;
} else {
  alert ("Close one!!");
}
}
</script>



</body>
</html>




    