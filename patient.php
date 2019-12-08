<?php 

 include "dbconnect.php";

 $query="select * from patient;";

 $result = mysqli_query($connection,$query);
 if (!$result) {
 die("databases query about getting patinet info failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" .$row["OHIP"]."'>".$row["firstName"]." ".$row["lastName"]."</option>";

 }
 mysqli_free_result($result);
?>






?>
