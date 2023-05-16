<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
 
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
  font-size: 12px;
}

th {text-align: left; }
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
// Include config file
require_once "./db/config.php";






// $link = mysqli_connect("localhost", "id20552514_jack", "Jack_lanphear_1966","id20552514_user") or die("Error connecting to database: ".mysql_error());
//echo $q;

 echo "<table>
<tr>
<th>ID</th>
<th>Username</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>


</tr>";
//****************************************
 $raw_results = mysqli_query($link,"SELECT * FROM users WHERE id = '". $q . "'");
//print_r ($raw_results);

if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
    while($results = mysqli_fetch_array($raw_results)){
    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
    
      echo "<tr>";
  echo "<td>" . $results['id'] . "</td>";
  echo "<td>" . $results['userName'] . "</td>";
  echo "<td>" . $results['firstName'] . "</td>";
  echo "<td>" . $results['lastName'] . "</td>";
  echo "<td>" . $results['email'] . "</td>";
//   echo "<td>" . $results['password'] . "</td>";
  echo "</tr>";
  echo "<th colspan='5'>HASH - password</th><tr><td colspan='5'>". $results['password'] . "</td></tr>";
  echo "<th colspan='5'>Created on</th><tr><td colspan='5'>". $results['created_at'] . "</td>";
        // echo "<p><h3>".$results['firstName']."</h3>".$results['lastName']."</p>";
        // posts results gotten from database(title and text) you can also show id ($results['id'])
    }
    
}
else{ // if there is no matching rows do following
    echo "No results";
}




//   echo "<tr>";
//   echo "<td>" . $result['FirstName'] . "</td>";
//   echo "<td>" . $row['LastName'] . "</td>";

//   echo "</tr>";

// echo "</table>";

?>
</body>
</html>