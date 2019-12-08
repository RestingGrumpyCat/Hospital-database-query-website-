
<?php

include "dbconnect.php";

$date=$_POST['licenseDate'];

$query="SELECT * FROM doctor WHERE dateLicensed < '$date' ";
$result = mysqli_query($connection,$query);
if (!$result) {
	die("databases query 'doctor who were licensed before certain date' failed.");
}

echo "<ol>";

while ($row = mysqli_fetch_assoc($result)) {
	echo "<li>";
 	echo $row['firstName']."     ".$row['lastName'];
 
	echo "</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>
