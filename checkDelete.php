<?php

include "dbconnect.php";

$delete=$_POST["licenseNum"];

$query1="SELECT * FROM treats WHERE docLicense= '$delete'"; 
$result = mysqli_query($connection, $query1);

if(mysqli_num_rows($result)!=0){
  
  echo "This doctor is currently treating a patient. Are you sure you want to delete this doctor?";
  echo "<br>";
  echo "<form action ='deleteDoc.php' method='post'>";
  echo "If yes, please repeat this doctor's license number.";
  echo "<input type='text' name='number'>";
  echo "<br>";
  echo " <input type='submit' value='Yes, I am sure I want to delete this doctor'>";
  echo "<br>";
  echo "</form>";
}
else{

  $query2="DELETE FROM doctor WHERE licenseNum = '$delete';";
 

  if (!mysqli_query($connection,$query2)) {
 	die ("Error while trying to delete the doctor". mysqli_error($connection));
  } 
  else {
     	header('Location: main.php'); 
 	exit;
 }
}

?>
