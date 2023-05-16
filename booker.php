<?php require 'header.php'; 

// error_reporting(E_ALL);

// echo $_POST["first"];
//var_dump($_POST);
// Include config file
require_once "./db/config.php";// Check if the user is logged in, if not then redirect him to login page
function ti($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data= addslashes($data);
    //echo $data. "<br>";
    return $data;
  }
    
if ( !isset($_POST)) 
{
  header("location: db/login.php");
exit;
} 
else    
{
    $first   = ti($_POST["first"]);
    $middle = ti($_POST["middle"]);
    $last = ti($_POST["last"]);
    $suffix = ti($_POST["suffix"]);
    // $trip_image = $target_dir.$file_name;
    $addr_line1 = ti($_POST["addr_line1"]);
    $addr_line2 = ti($_POST["addr_line2"]);
    $city = ti($_POST["city"]);
    $state = ti($_POST["state"]);
    $postal = ti($_POST["postal"]);
    $country = ti($_POST["country"]);
    $email = ti($_POST["q5_email"]);
    $area = ti($_POST["area"]);
    $phone = ti($_POST["phone"]);
    $tripId = ti($_POST["tripId"]);
    $tripName = ti($_POST["tripName"]);
    $q=$tripId;
    //****************************************
$raw_results = mysqli_query($link,"SELECT * FROM trips WHERE id = ". $q );
}   


if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop	
    while($results = mysqli_fetch_array($raw_results)){    
        $summary_short= substr($results['summary'], 0, 99) . " ...MORE INFO"; 
        $tripCost= $results['tripCost'];
        $gst= $results['tripCost'] * .15;
        $totalCost= $tripCost + $gst; 
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
        $date2 =  date('m/d/Y (D)', strtotime($date));
        $newDate2 =  date('l F jS  Y ', strtotime($newDate));
        $date =  date('l F jS  Y ', strtotime($date));
        $newDate =  date('m/d/Y (D)', strtotime($newDate));
        
    }}








if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  } else 
  {
        
   $sql = "INSERT INTO `bookings` (`id`, `first`, `middle`, `last`, `suffix`, `addr_line1`, `addr_line2`, `city`, `state`, `postal`, `country`, `email`, `area`, `phone`, `tripId`, `tripName`) VALUES (NULL, '$first', '$middle', '$last', '$suffix', '$addr_line1', '$addr_line2', '$city', '$state', '$postal', '$country', '$email', '$area', '$phone', '$tripId', '$tripName'      )";
        

        if (mysqli_query($link, $sql)) {
            $recStat= '<h2>record created successfully</h2>';
        
        } else {echo  $sql .   mysqli_error($link);}

            mysqli_close($link); 
    } //end of link
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
}
#one::after { 


}
</style>
<title><?=$header?></title>
</head>
<body>
<?php require 'menu-bar.php';?>

<div id="full_wrap" class='flex-c '>
    <div id='left_col' class='flex_100'>		
        <div id='tliez' class='tilez '>           
            <div class='post-content'> 
                <h1><?php echo $header ?></h1>
                <h2>Let the adventure begin!</h2>
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


<!-- // side boxes -->
    <div id='tile_top' class='tile3'>		
        <div id='tliez' class='tilez '>
            <div class='post-content'> 
            <h1>TRIP INFO</h1>
                <div class="trip-dates">
                    <div>
                        <!-- <h2>Dates</h2>       {} - {$newDate}                  -->
                        <div class="slide"><?=$date?></div>
                        <div class="full"><?=$newDate2?></div>
                        <!-- <h2>Cost</h2> -->
                        <div>$<?=$tripCost." + $".$gst. " GST = $".$totalCost    ?> CAD </div>      
                        
                            
                             
                            <button type="text">BOOKED</button>      
                        
                    </div>
                </div><!-- end trip dates -->  
                <br>  
            </div> <!-- /post-content -->           
            <div class='post-content'> 
                <h1>TRIP DETAILS</h1>
                <p></p>
                    <table>
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
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
    <?php
  
if (strlen($googlemaps) < 10) { 
    //   echo strlen($googlemaps);


    $googlemaps = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5548394.334363702!2d-57.93856492806963!3d47.232685122378705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1683810716392!5m2!1sen!2sca";}

?>

                    <iframe src="<?=$googlemaps?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
            </div> <!-- /post-content -->
        </div> <!-- /post -->
    </div> <!-- tile -->
</div><!-- full_wrap --> 
    <?php require 'footer.php'; ?>
    <script>
function chart($per) {
    document.getElementById("one").style.width = $per;
    // alert ($per);
    $per =parseFloat($per) ;
    // alert ($per);

    if ($per >= 75) {
        document.getElementById("one").style.backgroundColor = "red";
        document.getElementById("one").style.color = "white";
        exit();
    }
    else if ($per < 74 && $per >=31) {
        document.getElementById("one").style.backgroundColor = "yellow";
        document.getElementById("one").style.color = "red";

    } else if ($per <= 30) {
        document.getElementById("one").style.backgroundColor = "green";
        document.getElementById("one").style.color = "black";
    }
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
</script>
</body>
</html>
