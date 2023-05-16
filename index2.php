<?php
 session_start();
// echo '<pre>';
//var_dump($_SESSION);
// echo '</pre>';
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


//do we have a session? If so jump to problem.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
 && isset($_SESSION["run"]) && $_SESSION["run"] === true
) {
    echo "loggedin and run";
   header("location: problem.php");
    exit;
}
// if no session than create one
// blank all the variables
$title = "";
$firstName = "";
$lastName = "";
$role = "";
$emailType="";

// now we check to this if a form has posted data
if (isset($_POST['title']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['role'])  ) {
    if (!empty($_POST['title']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['role'])
    
    ) 
    // now we set the variables from the post
    {
        $title = $_POST["title"];        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $role = $_POST['role'];
       if (isset($_POST['emailtype'])){ $emailType = $_POST['emailType'];}
    }
}

// Verify credentials DISABLED FOR THIS PROJECT
if ($firstName != "" && $role != "") {
    // if ($username == "jack" && $password == "jack13") {
        if (1==1) {
//big time cheat here!!!!!!!!!
            if(!isset($_COOKIE["PHPSESSID"]))
            {
            session_start();
            }
        $_SESSION["loggedin"] = true;
        $_SESSION['title'] = $title;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['role'] = $role;
        $_SESSION["run"] = true;
        // if ($_SESSION['role'] ="ceo") {exit;}

        // we set emailType depending on the returned session role.
        if ($_SESSION['role'] =="admin") {$_SESSION['emailType'] ="newAccount";
            header("location: problem.php");
        }

        if ($_SESSION['role'] =="manager") {$_SESSION['emailType'] ="lostPassword";
            header("location: problem.php");
        }

        if ($_SESSION['role'] =="ceo") {$_SESSION['emailType'] ="Needs help";
            header("location: problem.php");
        }

        

        // header("location: dashboard.php");
    } else {
        echo "<h1>Oops! Something went wrong. Please try again</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Project 2 IT SUPPORT</title>
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
<body>
<?php include 'menu-bar.php';?>

    <div id ="main" class="form_100">
        
            <div class ="form">
             <h3 >IT SUPPORT login</h3>
                <form method="post" action="index2.php">
                    <select name="title">
                        <option value="Mr." selected>Mr.</option>    
                        <option value="Mrs.">Mrs.</option>
                        <option value="Miss">Miss</option>
                        <option value="Master">Master</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                        <option value="other">other</option>
                    </select>

                    <input type="text" name="firstName" placeholder="First Name" value ="tuna" required style="width:170px;">
                    <input type="text" name="lastName" placeholder="Last Name" value="fish" required style="width:170px;">

                    <select name="role" required>
                        <option value="admin" selected>Admin</option>    
                        <option value="manager">manager</option>
                        <option value="ceo">CEO</option>
                    </select>
                    <!-- <input type="text" name="role" placeholder="Role" value ="admin" required> -->
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
    </div>
    <?php
require 'footer.php';
?>
</body></html>