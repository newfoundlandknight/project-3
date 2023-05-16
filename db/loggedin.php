<?php
require '../header.php';
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
echo '<pre>';
//var_dump($_POST);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="../css/styles.css" rel="stylesheet" type="text/css" />
    <title>Send Email</title>
  </head>
  <body>
  <?php include '../menu-bar.php';?>
  <div class="form_100">
        <div class="form">
<?php 
?>
<a href="logout.php">logout</a>
    
</div>
</div>

<?php require '../footer.php'; ?>
</body>
</html>