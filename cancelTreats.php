<?php
 include "dbconnect.php";

 $OHIP=$_POST['patient'];
 $license=$_POST['doctor'];

 $query="delete from treats where docLicense = '$license' and patientOHIP=$OHIP;";

 if (!mysqli_query($connection,$query)) {
        die ("Error while trying to add new treatment". mysqli_error($connection));
 } else {
	header('Location: main.php');
        exit;
 }


?>



