<?php 
require 'header.php'; 
$image = "trip_images/Copy.jpg";

if(isset($_GET['image']))
{  $image = $_GET['image'];
  list( $old_width,$old_height ) = getimagesize( $image );
 $qw =  1200 /$old_width *100 ;

  // echo $image;
  $filename = $image;
  $picture =$image; # picture fileNAME here. not address
  $max=900;    # maximum size of 1 side of the picture.
  /*
  here you can insert any specific "if-else",
  or "switch" type of detector of what type of picture this is.
  in this example i'll use standard JPG
  */
  
  $src_img=ImagecreateFromJpeg($picture);
  
  $oh = imagesy($src_img);  # original height
  $ow = imagesx($src_img);  # original width
  
  $new_h = $oh;
  $new_w = $ow;
  
  if($oh > $max || $ow > $max){
          $r = $oh/$ow;
          $new_h = ($oh > $ow) ? $max : $max*$r;
          $new_w = $new_h/$r;
  }
  // note TrueColor does 256 and not.. 8
  $dst_img = ImageCreateTrueColor($new_w,$new_h);
  
  ImageCopyResized($dst_img, $src_img, 0,0,0,0, $new_w, $new_h, ImageSX($src_img), ImageSY($src_img));
  $picture2 = "trip_images/Copy900.jpg";
  $picture2= rtrim($image,".jpg")."_900.jpg";
  ImageJpeg($dst_img, $picture2);
}
else 
{
 $image = "trip_images/Copy.jpg";
   list( $old_width,$old_height ) = getimagesize( $image );
 $qw =  1200 /$old_width *100 ;
}


  // echo $qw;
  $qw=100; 
  // echo  $old_width. " ". $old_height;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/styles.css" rel="stylesheet" type="text/css" />
  <title>Image Cropper</title>
  <style>
    body {
      zoom: <?=$qw?>%;
      margin:0px;
      padding:0px;
        
    }
    #wrap {

      text-align: center;  
      color:white;
      margin:auto;
      width:<?=$old_width+15?>px;
      height:<?=$old_height+15?>px;
    }
    #crop_resize_wrapper {
      position:absolute;
      margin-left:100px;
      margin-top:20px;
      margin:auto;
      width:<?=$old_width?>px
      /*width:800px;*/
      height:<?=$old_height?>px;
      overflow: hidden;
      z-index: 0;   
    }
    #crop_resize_wrapper img {
      /* width:500px; */
      /*height:400px; */
      width:100%;
    }
    #crop_block {
      background-color: blue;background-color:rgba(0,0,0,0.5);
      width:800px;
      height:600px; 
      border:1px dashed white;
      position:absolute;
      top:0px;
      box-sizing:border-box;
    }
    #img_files {
        background-color: blue;background-color:rgba(0,0,0,0.5);
     width: 50%;
    
    float: left;
    padding: 10px;
    border: 2px solid white;
        
    }
  </style>
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

</head>
<body>
<?php 
require 'menu-bar.php';
?>

<!--  -->

<div id="wrap"><div >
  <?php
// $image = "trip_images/canoe - Copy.jpg";

$fileList = scandir('trip_images');
foreach($fileList as $file) {
  // Output each file name on a new line
  // echo $file;
  // trip_images/Copy.jpg
  if ($file=="."||$file=="..")
  {} 
  else
  {   $file2=   "trip_images/".$file;
      list($width, $height, $type, $attr) = getimagesize($file2);
      echo "<span id ='img_files'>
      
      <a href=crop.php?image=trip_images/".$file.">
      <img src='trip_images/".$file."' width='100'>
      </a>"
      ."<p>".  $file. "<br> ".$attr."</p></span>" ;
      
  }
 
//  echo $file;
}
?></div><?php echo $old_width. " ". $old_height ?>
<div id="crop_resize_wrapper">
<img id="crop_image"  src ="<?=$image?>">
  <div id="crop_block">
  </div>
</div>


</div> 
<form method="post" id ="formiId" action="get_crop.php" onsubmit="return crop();">
  <input type="hidden" value="" id="top_pos" name="top_pos">
  <input type="hidden" value="" id="left_pos" name="left_pos">
  <input type="hidden" value="" id="right_pos" name="right_pos">
  <input type="hidden" value="" id="bottom_pos" name="bottom_pos">
  <input type="hidden" value="<?=$image?>" id="image" name="image">
  <input type="hidden" id ="crop_etutorialz_image" name="crop_etutorialz_image" >
</form>

  <!-- <div class ="form">    
    <div></div>
  </div> -->

  
<?php 
  // require 'footer.php'; 
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script src="./js/new.js">



</script>
<script type="text/javascript">

  $('#crop_block').dblclick(function() {
    $("#formiId").submit();
  });

  $(function() {
    $('#crop_block').draggable({ containment: 'parent' });
  });

function crop()
  {
  var posi = document.getElementById('crop_block');
  document.getElementById("top_pos").value=posi.offsetTop;
  document.getElementById("left_pos").value=posi.offsetLeft;
  document.getElementById("right_pos").value=posi.offsetWidth;
  document.getElementById("bottom_pos").value=posi.offsetHeight;
  return true;
  }
</script>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
</body>
</html>



    






