<?php
session_start();
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
    <link rel="icon" type="./image/x-icon" href="/images/paddle-white_icon.png">
    <title>Trip Admin</title>
    <style>
form{
    height: 100%;
    max-width: 550px;


    top:100px;
    background-color: rgba(255,255,255,0.13);
    margin: 0 auto;
    /* backdrop-filter: blur(10px); */
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 5px 35px;
}
#trip_add label {
    width:100%;
}
    </style>
</head>
<body>
<?php 
require 'menu-bar.php';
?>


<form action="admin_confirm.php" id ="trip_add" enctype="multipart/form-data" method="POST">

    <label for="header">Trip name:</label><br>
    <input type="text" id="header" name="header" value="" required><br>

    <label for="tripDate">Trip date:</label><br>
    <input type="date" id="tripDate" name="tripDate" value="" required><br>

    <label for="duration">Trip duration:</label><br>
    <input type="text" id="duration" name="duration" value="" required><br>

    <label for="summary">Trip summary:</label><br>
    <textarea id="summary" name="summary" rows="10" required ></textarea><br>
<!--  -->
    <label for="trip_image">Trip image:</label><br>
   <input type="file" id="trip_image" name="trip_image"  required accept="image/*" style="width:270px"><br>

    <label for="tripCost">Trip cost:</label><br>
    <input type="text" id="tripCost" name="tripCost" value="" required><br>

    <label for="skillLevel">Trip skill level:</label><br>
    <input type="text" id="skillLevel" name="skillLevel" value="" required><br>

    <label for="distance">Trip distance:</label><br>
    <input type="text" id="distance" name="distance" value="" required><br>

    <label for="riverClass">River class:</label><br>
    <input type="text" id="riverClass" name="riverClass" value="" required><br>
    
    <label for="maxSeats">No of available seats</label><br>
    <input type="text" id="maxSeats" name="maxSeats" value="" required><br>

    <label for="googleMaps">Google maps:</label><br>
    <textarea  type="text" id="googleMaps" name="googleMaps" value=""  rows="10" required>https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5548394.334363702!2d-57.93856492806963!3d47.232685122378705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1683810716392!5m2!1sen!2sca</textarea>Instructions: Please fill out all fields.<br>
    
    <input type="submit" value="Submit"><br>
   
    <br><br>
</form>


<?php
    require 'footer.php'; 
?>
</body>
</html>