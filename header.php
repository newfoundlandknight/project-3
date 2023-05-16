<?php
session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// Check if the user is logged in, if not then redirect him to login page
if ( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true 
) {
  header("location: db/login.php");
    exit;
} 

// if(isset($_SESSION["login_time_stamp"]))
// {
//     if(time()-$_SESSION["login_time_stamp"] >60) 
//     {   $_SESSION["timeout"] =time();
//         session_unset();
//         session_destroy();
//         header("Location:db/login.php");
//         exit;
// // echo $_SESSION["login_time_stamp"];
// // echo time()-$_SESSION["login_time_stamp"];

//     }
// }
// else
// {
//     //header("Location:login.php");
// }
// $_SESSION["login_time_stamp"] = time();
