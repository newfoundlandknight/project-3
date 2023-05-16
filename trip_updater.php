<?php
session_start();
// Include config file
require_once "./db/config.php";// Check if the user is logged in, if not then redirect him to login page

if ( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ) 
    {
    header("location: db/login.php");
    exit;
    } 
    else {
        if ($_SESSION["lvl_DB"]<5){
echo ("NOPE");
        } else {
            // echo("go ahead");
        }
    }

//****************************************



if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
else {
//   $q=$_GET['id'];
//   $results = mysqli_query($link,"SELECT * FROM trips WHERE id = ". $q );
//   $results =$raw_results ;
}
  
  $q=$_GET['id'];
  $results = mysqli_query($link,"SELECT * FROM trips WHERE id = ". $q );
// Define variables and initialize with empty values
// echo "Returned rows are: " . mysqli_num_rows($results);
$results= mysqli_fetch_assoc($results);
    
$summary_short= substr($results['summary'], 0, 99) . " ...MORE INFO"; 
$tripCost2= $results['tripCost'];
$tripCost=number_format((float)$tripCost2, 2, '.', '');
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
$image_src_bare=$results['trip_image'];
$image_src="./trip_images/" . $results['trip_image'];
$summary=$results['summary'];
$maxSeats= $results['maxSeats'];
$duration =$results['duration'];

$date = $results['tripDate'];
$addedDays = $results['duration']-1;
$newDate = date('Y-m-d', strtotime($date. " + $addedDays days"));
$calDate =  date('Y-m-d', strtotime($date));    //"yyyy-MM-dd"
$newDate2 =  date('l F jS  Y ', strtotime($newDate));
$date =  date('l F jS  Y ', strtotime($date));
$newDate =  date('m/d/Y', strtotime($newDate));
$date2 =  date('m/d/Y', strtotime($date));
// date('(m/d/Y (D)', strtotime($newDate));
 echo "<title>$header</title>";
 
 
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
}  
 
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
    <title>Trip Admin</title>
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
 
    form{
        height: 100%;
        max-width: 550px;
        color:black;
        text-align: left;
    
        top:100px;
        background-color: rgba(255,255,255,0.13);
        margin: 0 auto;
        /* backdrop-filter: blur(10px); */
        border: 2px solid rgba(255,255,255,0.1);
        /*box-shadow: 0 0 40px rgba(8,7,16,0.6);*/
        padding: 5px 35px;
    }
    #trip_add label {
        width:100%;
        color:black;
         text-align: left;
    }
    </style>
</head>
<body>
<?php 
require 'menu-bar.php';



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
    <div id='left_col' class='flex_50'>		
        <div id='tliez' class='tilez '>           
            <div class='post-content'> 
                <form action="trip_alter.php" id ="trip_add" enctype="multipart/form-data" method="POST">

                    <label for="header">Trip name:</label><br>
                    <input type="text" id="header" name="header" value="<?=$header?>" required><br>
                    <input type = "hidden" id ="id" name = "id" value="<?=$id?>"
                
                    <label for="tripDate">Trip date:</label><br>
                    <input type="date" id="tripDate" name="tripDate" value="<?=$calDate?>" required><br>
                
                    <label for="duration">Trip duration:</label><br>
                    <input type="text" id="duration" name="duration" value="<?=$duration?>" required><br>
                
                    <label for="summary">Trip summary:</label><br>
                    <textarea id="summary" name="summary" rows="10" required ><?=$summary?></textarea><br>
            
                    <label for="trip_image">Trip image:</label>Due to security issues, you must reselect the original file OR upload a new file.<br>
                    <input type="file" id="trip_image" name="trip_image" accept="image/*" style="width:270px" required><?=$image_src_bare?><br>
                
                    <label for="tripCost">Trip cost:</label><br>
                    <input type="text" id="tripCost" name="tripCost" value="<?=$tripCost2?>" required><br>
                
                    <label for="skillLevel">Trip skill level:</label><br>
                    <input type="text" id="skillLevel" name="skillLevel" value="<?=$skillLevel?>" required><br>
                
                    <label for="distance">Trip distance:</label><br>
                    <input type="text" id="distance" name="distance" value="<?=$distance?>" required><br>
                
                    <label for="riverClass">River class:</label><br>
                    <input type="text" id="riverClass" name="riverClass" value="<?=$riverClass?>" required><br>
                    
                    <label for="maxSeats">No of available seats</label><br>
                    <input type="text" id="maxSeats" name="maxSeats" value="<?=$maxSeats?>" required><br>
                
                    <label for="googleMaps">Google maps:</label><br>
                    <textarea  type="text" id="googleMaps" name="googleMaps" value=""  rows="10" required><?=$googlemaps?></textarea>Instructions: Please fill out all fields.<br>
                    
                    <input type="submit" value="Submit"><br>
                   
                    <br><br>
                </form>
            </div> <!-- /post-content -->
        </div> <!-- /post -->
    </div> <!-- /tile -->
    
    
    
    <div id='left_col' class='flex_50'>		
     <?php   {{
     



//the short trip info***********************************************************************

echo"
<div id='tile' class='tile'>		
    <div id='tliez' class='tilez '>           
        <div class='post-content'>
                 <a href='trip.php?id={$id}'></a>
                    <div class='trip-thumb'>
                        <img alt='' src='{$image_src}'>
                    </div>
                

                <div class='trip-block-info' >
                    <h1>{$header} - {$id}</h1>
                    <h3>{$date} - {$newDate}    </h3>
                    <p>{$summary_short}</p>
                    
                </div>
                    <div class='cna-link'><input type='submit' value='edit' onclick='updateTrp(\"{$header}\" , \"{$id}\");'></div>
                    <div class='cna-link'><input type='submit' value='delete' onclick='lt(\"{$header}\" , \"{$id}\");'></div>
                    <div class='cna-link'><span>".checkBooking($header)." out of {$maxSeats} filled</span> </div>
                
        </div> <!-- /post-content -->
    </div> <!-- /post -->
</div> <!-- /tile -->

 </div> <!-- /tile -->
";
   
      

//*********************************************************************


$trip ="
<div id='tile' class='tile2'>
    <div id='post-9631' class='tilez '>
        <div class='post-content'>
            <div class='trip-thumb'>
                <a href='#'></a><img alt='' src='{$image_src}'>
            </div>

            <div class='trip-block-info' >
                <h1>{$header}</h1>
                <h3> DATE: {$date} - {$newDate}    </h3>
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
    // exit();
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