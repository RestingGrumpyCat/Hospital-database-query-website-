<?php
 include 'dbconnect.php';
 $firstName = $_POST["firstName"];
 $lastName = $_POST["lastName"];
 $licenseNum = $_POST["licenseNum"];
 $dateLicensed = $_POST["dateLicensed"];
 $specialty = $_POST["specialty"];
 $hospital = $_POST["hospital"];

if($hospital == "ABC"){
  $hosCode=ABC;
}
else if ($hospital == "BBC"){
  $hosCode=BBC;
}
else if	($hospital == "DDE"){
  $hosCode=DDE;

}
else{
  echo "You have entered an invalid hospital."."<br>";
	
   }

 $query= 'INSERT INTO doctor (firstName, lastName, licenseNum, dateLicensed, specialty, hosCode) VALUES ("' . $firstName .'","' . $lastName . '","' . $licenseNum . '","' . $dateLicensed . '","' . $specialty . '","' . $hosCode . '");';


 if (!mysqli_query($connection,$query)) {
 	die ("Error while trying to add a new doctor". mysqli_error($connection));
 } else {
	ob_start();

	header("Location: main.php");
 	exit;
	ob_end_flush();

 }
?>
