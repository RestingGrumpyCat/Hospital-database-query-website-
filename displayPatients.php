

<?php
 $doc=$_POST["displayPatients"];
 $query="select patient.firstName, patient.lastName from patient, doctor, treats where OHIP=patientOHIP AND doctor.licenseNum= treats.docLicense AND doctor.lastName='$doc';";
 $result = mysqli_query($connection, $query);
 if (!$result) {
        die("databases query on obtaining treating info failed. ");
 }
 echo "Doctor"." ".$doc." "."is currently treating the following patients:";
 echo "<br>";
 while ($row = mysqli_fetch_assoc($result)) {
	echo $row['firstName']." ".$row['lastName'];
	echo "<br>";
}
 mysqli_free_result($result);
?>

