<?php
 include "dbconnect.php";
 $num=$_POST['number'];

 $query1="DELETE FROM doctor WHERE licenseNum = '$num';";
 $query2="DELETE FROM treats WHERE docLicense = '$num';";

  if (!mysqli_query($connection,$query1)) {
        die ("Error while trying to delete the doctor". mysqli_error($connection));
  }
  else {
	if(!mysqli_query($connection,$query2)){
		die("Error deleting the patient this doctor is treating".mysqli_error($connection));
	}	
	else{
        	ob_start();
		header('Location: main.php');
        	exit;
		ob_end_flush();
	}
    }



?>
