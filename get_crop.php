<?php
//    $image=$_POST['image'];
//    $image2= rtrim($image,".jpg")."_old.jpg";
// echo $image, $image2;
if(isset($_POST['crop_etutorialz_image']))
{
    // "./trip_images/test.jpg";
    $image=$_POST['image'];
    $image2= rtrim($image,".jpg")."_old.jpg";
    copy($image,$image2);
    // rename($image,$image2);
$testjpg = $image;
    $y1=$_POST['top_pos'];
    $x1=$_POST['left_pos'];
    $w=$_POST['right_pos'];
    $h=$_POST['bottom_pos'];
    //   $image="trip_images/caplin_small.jpg";
    list( $old_width,$old_height ) = getimagesize( $image );
    $new_width = 800;
    $new_height = 600;
    $thumb = imagecreatetruecolor( $new_width, $new_height );
    $source = imagecreatefromjpeg($image);
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
    //imagejpeg($thumb,$image,100); 
    $im = imagecreatefromjpeg($image);
    $destination = imagecreatetruecolor($w,$h);
    imagecopyresampled($destination,$im,0,0,$x1,$y1,$w,$h,$w,$h);
    
    imagejpeg($destination,$testjpg , 100);

    header('Content-type: image/jpg');

    imagejpeg($destination );
}


   
// it will show the loaded image in the browser


// imagedestroy($img);
?>
<!--  -->
