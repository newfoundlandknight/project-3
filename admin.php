<?php
 //session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// if ( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true 
// ) {
//     header("location: db/login.php");
//     exit;
// } 
require 'header.php';

require 'db/config.php';


        // Prepare a select statement
        $sql = "SELECT * FROM users";
// Check connection

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }
  
  $sql = "SELECT id, firstname, lastname FROM users";
  $result = $link->query($sql);
  

  //$link->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <script>
// setTimeout(function(){
//    window.location.reload();
// }, 61001);
// setTimeout(function(){
//    alert("Hello! I am an alert box!!10 secs ");
// }, 50000);

        function showUser(str) {
        if (str == "") { // if str is nothing throw nothing
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else { // otherwise we are gonna fetch something
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }
        }
    </script>
</head>
<body>
<?php include 'menu-bar.php';?>
<div class="form_100">
    <div class="form admin">
<h2>Admin Page<h2>
    <form >
<div name="users1" class="users1" >
  <!-- <option value="">Select a person:</option> -->
 <h3>Click on the user for more info. (XMLHttpRequest)</h3>


        <?php 
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<div onclick='showUser(" .$row["id"].")''>id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "</div>";
            }
          } else {
            echo "0 results";
          }
        ?>  </div>
</form>
        <br><div id="txtHint"><b>Person info will be listed here...</b></div>
        <?php //require 'var_dump.php'; ?>
    </div>
</div>

    <?php require 'footer.php'; ?>
</body>
</html>