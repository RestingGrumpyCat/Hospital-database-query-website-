<?php include "dbconnect.php" ?>

<?php
     	$query = "select * from hospital";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row["Code"]."'>".$row["Name"]." in ".$row["City"]."</option>";
        }
	mysqli_free_result($result);
?>



