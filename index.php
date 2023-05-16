<?php
 session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true

) {    
    //echo '<pre>';
    //var_dump($_SESSION);
    //echo '</pre>';
    //echo '<pre>';
    //var_dump($_POST);
    //echo '</pre>';
    header("location:all-adventures.php");
    exit;
}
else {
header("location: ./db/login.php");
}
?>