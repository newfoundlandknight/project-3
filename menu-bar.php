<header>
    <!-- nav logo title and hamburger -->
    <div class="top">  
        <nav class="menu">

<?php 


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  && isset($_SESSION["lvl_DB"])=== true && $_SESSION["lvl_DB"] === 5) {
echo '  <div class="admin2">Admin Menu</div>
        <a href="blank.php" ">BLANK</a> 
        <a id="admin" href="index.php">home</a>
        <a href="admin.php">Admin</a>   
        <a href="took.php">API</a> 
        <a href ="crop.php">IMAGE CROP</a>
        <a href="admin_add.php">TRIP ADD</a>
        <a href ="admin_booking.php">BOOKING ADMIN</a>
        <a href ="admin_adventures.php">TRIP ADMIN</a>
          <br>   <div class="admin2">User Menu</div>
        ';
}
    ?>                  
    <a href="index.php" class="item_menu">HOME</a>
    <a href="rentals.php" class="item_menu">RENTALS</a>
    <a href="all-adventures.php" class="item_menu">TOURS</a>
    <a href="contact.php" class="item_menu">CONTACT US</a>
    <a href="./db/logout.php">LOGOUT</a>
                
</nav>    
<a href="#" class="menu_icon"><img id ="burger" src="./images/hamburger.png" height ="50"></a>    
                      
</div> 
    <!-- <span class="username"><?php echo  "User:<br>" . $_SESSION["username_DB"];   ?> </span> -->
    <h1>Halifax Canoe & Kayak</h1>
    <div><img src="./images/paddle-white.png" height ="50"></div>

</header>

