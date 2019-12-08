<?php

 include "dbconnect.php";
 
 $query="select firstName, lastName from doctor where licenseNum not in (select docLicense from treats);";
 $result = mysqli_query($connection,$query);
 if (!$result) {
 	die("databases query failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
	echo $row['firstName']." ".$row['lastName'];
	echo "<br>";
}
 mysqli_free_result($result);

 
?>
