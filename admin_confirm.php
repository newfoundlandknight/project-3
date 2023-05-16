<?php
session_start();
error_reporting(E_ALL);
// Include config file
require_once "./db/config.php";// Check if the user is logged in, if not then redirect him to login page
$sql = "SELECT * FROM users";

//"SELECT id, username, firstName, lastName, email, password FROM users WHERE username = ?"
// Check connection

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }
  
  $sql = "SELECT *   FROM users";
  $result = $link->query($sql);
if ( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ) 
    {
    //   header("location: db/login.php");
    exit;
    } 
    else {
        if ($_SESSION["lvl_DB"]<5){
echo ("NOPE");
        } else {
            // echo("go ahead");
        }
    }
// Define variables and initialize with empty values

// phpinfo();
require_once "./db/config.php";
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
</head>
<body>
<?php 
require 'menu-bar.php';
?>
<h1><?php
//  echo '<pre>'; var_dump($_POST); echo '</pre>'
//  print_r($_POST); 
?></h1>
<?php
//************************************* */

$raw_results = mysqli_query($link,"SELECT * FROM trips ");
// var_dump ($raw_results);

if(isset($_FILES['trip_image']['tmp_name'])) {             
    // echo "<p>".$_FILES['trip_image']['tmp_name']." => file input successfull</p>";
    fileUpload();
}
   

function fileUpload () {
$target_dir = "trip_images/";
$file_name = $_FILES['trip_image']['name'];
$file_tmp = $_FILES['trip_image']['tmp_name'];

if (move_uploaded_file($file_tmp, $target_dir.$file_name)) {
    // echo "<h1>File Upload Success</h1>";   
    return $file_tmp;         
}
else {
    echo "<h1>File Upload not successfull</h1>";
}
}


// print_r($file_tmp);
//  print_r($_FILES);
$trip_image =  $_FILES['trip_image']['name'];
$originalImagePath = "C:\\xampp\\htdocs\\project_2\\trip_images\\".$trip_image;
$newImageName = $trip_image;
$newImagePath =  "C:\\xampp\\htdocs\\project_2\\trip_images\\";
$header = ti($_POST["header"]);
$tripDate = ti($_POST["tripDate"]);
$duration = ti($_POST["duration"]);
$summary = ti($_POST["summary"]);
// $trip_image = $target_dir.$file_name;
$tripCost = ti($_POST["tripCost"]);
$skillLevel = ti($_POST["skillLevel"]);
$distance = ti($_POST["distance"]);
$riverClass = ti($_POST["riverClass"]);
$googleMaps = ti($_POST["googleMaps"]);
$maxSeats = ti($_POST["maxSeats"]);
// echo $originalImagePath, $newImageName, $newImagePath;
// resizeImage($originalImagePath, $newImageName, $newImagePath);

function ti($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
  }



//#################################################################
// CROP IMAGE ACCORDING TO PERCENTAGE
//#################################################################


  if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "INSERT INTO trips (header,tripDate,duration,summary,trip_image,tripCost,skillLevel,distance,riverClass,googleMaps,maxSeats)
  VALUES ('$header','$tripDate','$duration','$summary','$trip_image','$tripCost','$skillLevel','$distance','$riverClass','$googleMaps','$maxSeats')";
  
  if (mysqli_query($link, $sql)) {
    echo '<div class="form_100">
        <div class="form">
            <h2>New record created successfully</h2><pre><?= ;?></pre>
            <a href = "all-adventures.php">All Adventures</a>     
        </div>
</div>
    
    
    
    
    ';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
  
  mysqli_close($link);

?>

<?php
    require 'footer.php'; 
?>
</body>
</html>