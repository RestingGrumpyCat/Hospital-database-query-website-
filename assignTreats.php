<?php
 include "dbconnect.php";

 $OHIP=$_POST['patient'];
 $license=$_POST['doctor'];
 $preventDuplicate="ALTER TABLE treats ADD UNIQUE(`docLicense`, `patientOHIP`);";
 if (!mysqli_query($connection,$preventDuplicate)) {
        die ("Error! ". mysqli_error($connection));
 } 
  
 $query="insert into treats (docLicense, patientOHIP) values ('$license', $OHIP);";
 if (!mysqli_query($connection,$query)) {
 	die ("Error while trying to add new treatment". mysqli_error($connection));
 } else {
 	header('Location: main.php'); 
 	exit;
 }


?>
