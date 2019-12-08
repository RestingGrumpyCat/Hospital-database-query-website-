<!DOCTYPE html>
<html>
<?php include "dbconnect.php" ?>
<?php
$answer = $_POST['answer'];
if($answer == "firstNameA"){

        $query = "SELECT * FROM doctor ORDER BY firstName ASC";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	echo "<ol>";

	while ($row = mysqli_fetch_assoc($result)) {
                
		echo "<li>";
                echo $row["firstName"]." ".$row["lastName"]."</li>";
                }
	
	echo "<br>";
	echo "<br>";

        mysqli_free_result($result);
        echo "</ol>";

}
else if ($answer == "lastNameA"){

        $query = "SELECT * FROM doctor ORDER BY lastName ASC";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	echo "<ol>";
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo $row["firstName"]." ".$row["lastName"]."</li>";

                }
        mysqli_free_result($result);
        echo "</ol>";


}

else if ($answer == "firstNameD"){

        $query = "SELECT * FROM doctor ORDER BY firstName DESC";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	echo "<ol>";
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo $row["firstName"]." ".$row["lastName"]."</li>";

                }
        mysqli_free_result($result);
        echo "</ol>";


}
else if ($answer == "lastNameD"){

        $query = "SELECT * FROM doctor ORDER BY lastName DESC";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	echo "<ol>";
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo $row["firstName"]." ".$row["lastName"]."</li>";

                }
        mysqli_free_result($result);
        echo "</ol>";


}
?>
</html>
