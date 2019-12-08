<?php 
 include "dbconnect.php";

 $OHIP=$_POST['OHIP'];

 $query1="SELECT * FROM treats WHERE patientOHIP=$OHIP;";

 $result1=mysqli_query($connection,$query1);
 if(mysqli_num_rows($result1)==0){
	echo "Error: OHIP number does not exist!";
	mysqli_free_result($result1);

 }
 else{
 $query2="SELECT patient.firstName AS pfname, patient.lastName AS plname, doctor.firstName AS dfname,  doctor.lastName AS dlname from patient, doctor, treats WHERE  doctor.licenseNum=treats.docLicense AND doctor.licenseNum in (SELECT treats.docLicense FROM treats WHERE treats.patientOHIP=$OHIP) AND patient.OHIP=treats.patientOHIP AND patient.OHIP=$OHIP;";

 $result2 = mysqli_query($connection,$query2);
 if (!$result2) {
 	die("databases query about patient information failed.");
 }
 while ($row = mysqli_fetch_assoc($result2)) {
	echo "Patient Name: ".$row['pfname']." ".$row['plname']." ";
	echo "<br>";
	echo "Doctor: ".$row['dfname']." ".$row['dlname']." ";
	echo "<br>";
 }
 mysqli_free_result($result2);
 }


?>
