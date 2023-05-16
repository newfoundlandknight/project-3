 <?php 
 $cookie_name = "img_txt";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
   // echo "Cookie '" . $cookie_name . "' is set!<br>";
   // echo "Value is: " . $_COOKIE[$cookie_name];
}
    //$text = $_POST["img_txt"]
    ?>
    <!DOCTYPE html>
<html>
<head>   
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }

.bg-image {
  /* The image used */
  background-image: url("https://adventuresnl.ca/wp-content/uploads/2019/02/ANL-W6-BG2.jpg");
  
  /* Add the blur effect */
  filter: blur(12px);
  -webkit-filter: blur(1px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.55); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  max-height: 250px;
  margin: 0px;
  text-align: center;
}

.blur {
  filter: blur(0px);
  -webkit-filter: blur(0px);
   text-decoration: underline;
      color: rgb(86, 119, 238);
      text-shadow: -1px -1px 0 #fff,1px -1px 0 #fff,-1px 1px 0 #f1f1f1,1px 1px 0 #fff; 
      font-size:.86em;
}
#demo{
  filter: blur(0px);
  -webkit-filter: blur(0px);
   text-decoration: underline;
      color: rgb(86, 119, 238);
      /* text-shadow: -1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000; */
      font-size:.86em;
}



</style>
</head>
<body>

<div id = "bg-image1" class="bg-image"></div>
<div id = "bg-text" class="bg-text">
  <h1 style="font-size:50px"><?php echo  $_COOKIE[$cookie_name];?></h1><br>

  <h3>Blurred Background</h3>
    <div id ="super" Class ="blur">super blurry</div>
    <div id ="blurry" Class ="blur">blurry</div>
    <div id ="barely" Class ="blur">barely blurry</div>
      <div>
          <input type="range" id="opacity" name="opacity" min ="0" max="11" value="5.5">
          <label for="opacity">opacity</label>
      <div id="demo" class="blur">5</div>
      </div>
    



</div>

<script>

  document.getElementById("super").addEventListener('click', function() {
    document.getElementById("bg-image1").style.webkitFilter = "blur(12px)";
  });
  document.getElementById("blurry").addEventListener('click', function() {
    document.getElementById("bg-image1").style.webkitFilter = "blur(5px)";
  });
  document.getElementById("barely").addEventListener('click', function() {
    document.getElementById("bg-image1").style.webkitFilter = "blur(2px)";
  });


  document.getElementById("opacity").addEventListener('click', function() {
    var x = document.getElementById("opacity").value;
    document.getElementById("demo").innerHTML =x;
    document.getElementById("bg-text").style.backgroundColor = 'rgba(0, 0, 0,' + (x/11) +')';
  
  
  });


  function removeHandler() {
    document.getElementById("super").removeEventListener("clcik", myFunction);
  }
  </script>
</body>
</html>