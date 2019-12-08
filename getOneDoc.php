
<?php
 $whichDoc=$_POST["pickadoc"];
 
 $query="select * from doctor where lastName = '$whichDoc'";
 $result = mysqli_query($connection, $query);
 if (!$result) {
 	die("databases query on obtain doctor info failed. ");
 }
 while ($row = mysqli_fetch_assoc($result)) {
	
	echo "<div align = 'justify' margin = '35'>";	
	echo "<font size = '3'>";
	echo "<li>" ."First Name:  ".$row["firstName"]."</li>";
 	echo "<li>" ."Last Name:   ".$row["lastName"]."</li>";
	echo "<li>" ."Specialty:   ".$row["specialty"]."</li>";
	echo "<li>" ."License Number:   ".$row["licenseNum"]."</li>";
 	echo "<li>" ."License Obtained Date:   ".$row["dateLicensed"]."</li>";
	echo "</font>"; 
	echo "</div>";
}
 mysqli_free_result($result);
?>
