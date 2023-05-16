<?php 
require 'header.php'; 
require_once "./db/config.php";// Include config file
$q=$_GET['id'];
//$q = "24";
//$link = mysqli_connect("localhost", "root", "","user") or die("Error connecting to database: ".mysql_error());
//****************************************
$raw_results = mysqli_query($link,"SELECT * FROM trips WHERE id = ". $q );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" type="text/css" />
    <link href="./css/styles_trip.css" rel="stylesheet" type="text/css" />
    <style>
    /* .flex-c {display: block;
        width: 600px;
       margin: auto;} */
    #wrapper{
        width: 100px;
        border: 1px solid #ccc;
    }
    #one {
    width:1%;
    height:20px;
    /* min-width: 16px; */
    background-color: blue;
    padding: 0px 5px 0px 5px;
    }
    #one::after { 
    
    
    }
    .button {
      border-radius: 4px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 200px;
      transition: 0.5s;
      cursor: pointer;
      margin: 5px;
    }
    
    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }
    
    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }
    

    .button:hover span {
      padding-right: 20px;
    }
    
    .button:hover span:after {
      opacity: 1;
      right: 0;
    }
    
    .button:hover span:before {
      opacity: 1;
      left: 0;
    }
    </style>
    <link rel="icon" type="./image/x-icon" href="./images/paddle-white_icon.png">
   
</head>
<body>
<?php 

require 'menu-bar.php';
?>



<?php 

if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
    while($results = mysqli_fetch_array($raw_results)){
    //  puts data from database into array, while it's valid it does the loop
    
$summary_short= substr($results['summary'], 0, 99) . " ...MORE INFO"; 
$tripCost= $results['tripCost'];
$tripCost=number_format((float)$tripCost, 2, '.', '');
$gst= $results['tripCost'] * .15;
$gst=number_format((float)$gst, 2, '.', '');
$totalCost= $tripCost + $gst; 
$totalCost=number_format((float)$totalCost, 2, '.', '');
$skillLevel=$results['skillLevel'];
$distance=$results['distance'];
$riverClass=$results['riverClass'];
$googlemaps=$results['googleMaps'];
$header = $results['header'];
$id =$results['id'];
$image_src="./trip_images/" . $results['trip_image'];
$summary=$results['summary'];


$date = $results['tripDate'];
$addedDays = $results['duration']-1;
$newDate = date('Y-m-d', strtotime($date. " + $addedDays days"));

$newDate2 =  date('l F jS  Y ', strtotime($newDate));
$date =  date('l F jS  Y ', strtotime($date));
$newDate =  date('m/d/Y', strtotime($newDate));
$date2 =  date('m/d/Y', strtotime($date));
// date('(m/d/Y (D)', strtotime($newDate));
 echo "<title>$header</title>";

?>


<div id="full_wrap" class='flex-c '>
    <div id='left_col' class='flex_100'>		
        <div id='tliez' class='tilez '>           
            <div class='post-content'> 
                <h1><?php echo $header ?></h1>
                <!-- <p>At Halifax Canoe & Kayak             </p> -->
                <h2>Let the adventure begin!</h2>
                <!-- Click on the tiles below for 2023 and 2024 dates and availability. -->
            </div> <!-- /post-content -->
        </div> <!-- /post -->
    </div> <!-- /tile -->

      
    <?php


$trip ="
<div id='tile' class='tile2'>	
    <div id='post-9631' class='tilez '>
        <div class='post-content'>
            <div class='trip-thumb'>
                <a href='#'><img alt='' src='{$image_src}'></a>
            </div>

            <div class='trip-block-info' >
                <h1>{$header}</h1>
                <h3> DATE: {$date} - {$newDate2}    </h3>
                <p>{$summary}</p>
            </div>
        
        </div> <!-- /post-content -->
    </div> <!-- /post -->
</div><!-- /tile -->
";

echo  $trip;
?>
<!-- html could go here -->
<?php
    }// end while

}// end if
else{ // else if there is no matching rows do following
    echo "No results";
} //end else
?>

<!-- // side boxes -->
    <div id='tile_top' class='tile3'>		
        <div id='tliez' class='tilez '>
            <div class='post-content'> 
            <h1>TRIP INFO</h1>
                <div id="trip-dates">
                    <div>
                        <!-- <h2>Dates</h2>       {} - {$newDate}                  -->
                        <div class="slide"><?=$date?></div>
                        <div class="full"><?=$newDate2?></div>
                        <!-- <h2>Cost</h2> -->
                        <div>$<?=$tripCost." + $".$gst. " GST<br> $".$totalCost    ?> CAD </div>      
                        <form action="booking.php" method="post">
                             <input type="hidden" id="tripId" name="tripId" value="<?=$id?>">
                              <input type="hidden" id="tripName" name="tripName" value="<?= $header?>">
                            
                             
                            <!--<button type="submit">BOOK TRIP</button> -->
                            <!--<button class="btn-3"><span>BOOK TRIP</span></button>-->
                            <button class="button btn-3"><span>BOOK TRIP</span></button>
                        </form>
                    </div>
                </div><!-- end trip dates -->  
                <br>  
            </div> <!-- /post-content -->           
            <div class='post-content'> 
                <h1>TRIP DETAILS</h1>
                <p></p>
                    <table>
                        <tr>
                            <td>Start</td>
                            <td><?=$date2?></td>
                        </tr>
                        <tr>
                            <td>End:</td>
                            <td><?=$newDate?></td>
                        </tr>
                        <tr>
                            <td>Days:</td>
                            <td><?=$addedDays?></td>
                        </tr>
                        <tr>
                            <td>Skill level:</td>
                            <td> <div id ="wrapper"><div id ="one"><?=$skillLevel?></div></div>       </td>
                        </tr>
                        <tr>
                            <td>Distance</td>
                            <td><?=$distance?></td>
                        </tr>
                        <tr>
                            <td>River class</td>
                            <td><?=$riverClass?></td>
                        </tr>
                        
              
                    </table>
<?php
if (strlen($googlemaps) < 10) { 
$googlemaps = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5548394.334363702!2d-57.93856492806963!3d47.232685122378705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1683810716392!5m2!1sen!2sca";}
?>

                    <iframe src="<?=$googlemaps?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
            </div> <!-- /post-content -->
        </div> <!-- /post -->
    </div> <!-- tile -->
</div><!-- full_wrap -->
<?php
   require 'footer.php'; 
?>
<script>
function chart($per) {
    document.getElementById("one").style.width = $per;
    // alert ($per);
    $per =parseFloat($per) ;
    // alert ($per);

if ($per >= 75) {
    document.getElementById("one").style.backgroundColor = "red";
    document.getElementById("one").style.color = "white";
    document.getElementById("one").style.textAlign = 'right';
    exit();
}
else if ($per < 74 && $per >=31) {
    document.getElementById("one").style.backgroundColor = "yellow";
    document.getElementById("one").style.color = "red";
     document.getElementById("one").style.textAlign = 'right';
    

} else if ($per <= 30) {
    document.getElementById("one").style.backgroundColor = "green";
    document.getElementById("one").style.color = "black";
    document.getElementById("one").style.textAlign = 'right';
}

// alert(greeting);
}


function fot(num,$max) {
    return new Intl.NumberFormat('default', {
    style: 'percent',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
    }).format(num / 1);
}

$max ="5";
$given = <?=$skillLevel?>;
$per =$given/$max;

chart (fot($per,$max));
    // chart(100,1);
    </script>
</body>
</html>

