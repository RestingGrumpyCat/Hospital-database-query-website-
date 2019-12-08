<?php include "dbconnect.php" ?>

<?php
     	$query = "select * from doctor";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" .$row["licenseNum"]."'>".$row["fisrtName"]." ".$row["lastName"]."</option>";
        }
	mysqli_free_result($result);
?>






