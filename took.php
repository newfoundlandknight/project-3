<?php
 session_start();




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



$_SESSION["img_txt"] = "this is the some text";
$cookie_name = "img_txt";
$cookie_value = "this is the some  text";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API examples</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
<style>
    #mydiv {
  position: absolute;
   z-index:  1;
  background-color: #f1f1f1;
  background-color: #2196F3;
  text-align: center;
 /* top:0 px;
 right: 60 px; */
  border: 2px solid #030000;
  border-radius: 5px 5px 5px 5px;
 
}
#norm {
  text-align: left;
  background-color: #f1f1f1;
  /* font-size: 22px; */
  padding: 10px;
  border-radius: 0px;
}
#mydivmain {
  text-align: center;
  background-color: #f1f1f1;
  /* font-size: 22px; */
  padding: 10px;
  border-radius: 0px;
}
#mydivmain2 {
  text-align: center;
  background-color: #f1f1f1;
  border-radius: 0px;
  padding: 10px;
}
#mydivbottom {
  background-color: #2196F3;
  color: #fff;  
  border-radius: 0 0 5px 5px;
  height:35px;
  padding: 10px;
}

#mydivheader {
  padding: 10px;
  cursor: move;
  background-color: #2196F3;
  color: #fff;  border-radius: 5px 5px 0 0;
}    
        
        
    </style>
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
    
    <div id="mydiv">
        <div id="mydivheader">Click here to move</div>
        <div id="mydivmain">fillinjg</div>
        <div id="norm"><?php include "var_dump.php"; ?></div>
        <div id="mydivmain2" class="mydivmain">fillinjg</div>
        
        <div id  ="mydivbottom"> </div>
    </div>
    <div class="form"><details>
    <summary>Example of clipping path.<div class ="h7">OCEAN</div></summary> 
         <pre style="color:black; font-size: 14px;">    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700);
      .h7{
        font-size: 9.0em;
        text-transform: uppercase;
        font-family: 'Open Sans Pro', sans-serif;
        background: url(https://24.media.tumblr.com/tumblr_m87dri70zh1qzla33o1_500.gif);
        background: url(https://i.pinimg.com/originals/93/e2/f1/93e2f16470df49a18b8dc46546cdee57.gif);
        background-size: cover;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
      }</pre> 
        </details>

<?php 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



  //if  (!isset($_SESSION['title'])) {echo "not set";} else {echo "set";}
  //if  (empty($_SESSION['title'])) {echo "empty";} else {echo $_SESSION['title'];}
?>
    <div id ="iframe">Seems iframe elements do not like to share $_SESSION variables, cookies passed the info "this is the some text" instead.            
        <iframe name ="iframe_a" src="blur.php" width="100%" height="300" style="border:none;"></iframe>
    </div>
  
        <div name="users1" class="users1 stick " >
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
  
 
        <script>localStorage.setItem('test2', 'new value');</script>
    <!-- Script -->
    <!-- <script>localStorage.setItem('test2', 'testing 1');</script>
    <script>localStorage.setItem('tuna', 'fish');</script> -->
    <script src="./js/script.js"></script>
    </div><!--  form class -->
    

    
</div><!-- end of form_100 -->
    <?php require 'footer.php'; ?>
</body>
</html>