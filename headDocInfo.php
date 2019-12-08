<?php
 include "dbconnect.php";

$query="select hospital.Name, hospital.headStartDate, doctor.firstName, doctor.lastName from hospital, doctor where headDocID=licenseNum order by Name ASC;";
$result = mysqli_query($connection,$query);
if (!$result) {
die("databases query about head doctor failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
	
        echo "<ul>";
	echo "<p>";
	echo $row['Name']."&emsp;".$row['firstName']." ".$row['lastName']."&emsp;".$row['headStartDate'];
	echo "</p>";
	echo "<br>";
	echo "</ul>";
	
}
mysqli_free_result($result);



?>
