
<?php

include "dbconnect.php";

$url=$_POST['url'];
$image=$_POST['image'];
$query="select * from doctor where lastName='$image';";
$result = mysqli_query($connection, $query);


if (!$result) {
 die("databases query on doctor image failed. ");
 }

$row = mysqli_fetch_assoc($result);
if(is_null($row['docimage'])){


	$query2="update doctor set docimage = '$url' where lastName='$image';";

 	$result2 = mysqli_query($connection, $query2);
 	if (!$result2) {
        	die("databases query failed. ");
 	}
	include "addImage2.php"; 

}

else{
	echo "Sorry this doctor already has a picture,";
    	echo("<script>window.location.href = '$url';</script>");
	exit;

}

?>
