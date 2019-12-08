<?php
 include "dbconnect.php";

 $code=$_POST['hosCode'];
 $name=$_POST['hosName'];
 

 $query="UPDATE hospital SET Name='$name' WHERE Code = '$code';";
 if (!mysqli_query($connection,$query)) {
	 die ("Error while updating hospital name". mysqli_error($connection));
 } else {
	ob_start();
 	header('Location: main.php');
	exit;
	ob_end_flush();
 
}





?>
