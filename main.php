<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Hospital Database</title>
	
	<! ––include the css file for styling ––>

 	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<! ––insert a picture ––>

<h1 align="middle"><img src="https://library.kissclipart.com/20181125/toe/kissclipart-group-of-doctors-clipart-physician-clip-art-e3e3c956bd8f2b61.png" alt="Invalid" style="width:128px;height:78px;" align="middle">&nbsp;Hospital Database</h1>

<br>

<! –– display all the doctor names by an order selected ––>
<h3 align="middle">Display the names of all doctors with an order selected</h3>

<form action="getDocNameWithOrder.php" method="post" align="middle">

	
	<! ––allow user to select the order of displaying names ––>
	<p>
        Order by first name | Ascending <input type="radio" name="answer" value="firstNameA"/><br>
        Order by last name | Aescending <input type="radio" name="answer" value="lastNameA"/><br>
        Order by first name | Descending <input type="radio" name="answer" value="firstNameD"/><br>
        Order by last name | Descending <input type="radio" name="answer" value="lastNameD"/><br>
	</p>
	<input type="submit" value="submit" /><br>

</form>



<br>

<! ––View a doctor's info by his/her last name––>

<h3 align="middle">If you want to view the information of any specific doctor, please select here</h3>

<form action="" method="post" align="middle">

<select name="pickadoc" id="pickadoc"> 
 <option value="1">Select Here</option>

<?php
include "getDocNameNoOrder.php";
?>

</select>
<input type = "submit" value = "OK"/>

</form>
<br>
<?php
 if (isset($_POST['pickadoc'])) {
 include "dbconnect.php";
 include "getOneDoc.php";
 }
?>
<br>

<h3 align="middle">If you enter a certain date, we can display all the doctors who were licensed before the given date</h3>
<form action="getDocByDate.php" method="post" align="middle">
	
	<! ––Set input type to date and set max and min of the date ––>

	<input type ="date" name="licenseDate" value="1998-02-02" min="1800-01-01" max="2020-01-01"/>
	<input type="submit" value="submit" /><br>

</form>

<br>

<! ––Add a new doctor ––>

<h3 align="middle">Add a new doctor to the hospital</h3>

<form action="addNewDoc.php" method="post" align="middle">

	<! ––ask for all of the info to insert into the table ––>
	<p>
	What is the first name of this doctor?  <input type="text" name="firstName"/><br>
	What is	the last name of this doctor? 	<input type="text" name="lastName"/><br>
	What is	the license number of this doctor? 	<input type="text" name="licenseNum"/><br>
	When is the date this doctor got licensed? <input type="date" name="dateLicensed"/><br>
	What is	the specialty of this doctor?  	<input type="text" name="specialty"/><br>
	Which hospital does this doctor works at? <select name="hospital">
	</p>
	<?php include "hospital.php" ?> 
	</select>
	<br>
	<br>
	<input type="submit" value="Click here to add this new doctor"/>
</form>

<br>


<! ––delete a doctor ––>

<h3 align="middle">Delete an existing doctor</h3>


<form action="checkDelete.php" method="post" align="middle">
	<p>
	Please enter the license number of the doctor you want to delete:  <input type="text" name="licenseNum"/><br>
	<br>
	<div><input type="submit" value="Click here to delete this doctor"/></div>
	<br></p>

</form>


<br>

<! ––update a hospital name ––>

<h3 align="middle">Update a hospital's name here</h3>
<form action="updateHos.php" method="post" align="middle">
	<p>
	Select a hospital to update:
	<select name="hosCode">
	<?php include "hospital.php"?>
	</select>
	What name do you want to change to?
	<input type="text" name="hosName"/><br>
	<br>
	<input type="submit" value="Click here to confirm updating">
	</p>
</form>
<br>
<! ––list all the head doctors ––>

<h3 align="middle">Information about all the head doctors</h3>
<p>
<form align="middle">
	<?php include "headDocInfo.php" ?>
</form>
</p>
<br>
<! ––look for patient by OHIP number ––>

<h3 align="middle">You can select a patient by entering his/her OHIP number here.</h3>

<form action="findPatientByOhip.php" method="post" align="middle">
	<input type="text" name="OHIP"/>
	<input type="submit" value="Click here to confirm"/>
</form>

<br>

<! ––show treats table info ––>

<h3 align="middle">Show which doctor is treating which patients</h3>

<form action="" method="post" align="middle">

	<select name="displayPatients" id="displayPatients">
 	<option value="1">Select Here</option>

	<?php
	include "getDocNameNoOrder.php";
	?>

	</select>
	<input type = "submit" value = "OK"/>

</form>
<br>
<br>

<! –-after the user select, load the php file to display all the patients treated by the selected doc ––>
<?php if (isset($_POST['displayPatients'])) {
include "dbconnect.php";
include "displayPatients.php";
}?>
<br>

<! ––assign treatment ––>

<h3 align="middle">If you want to assign a doctor to treat a patient, please select here: </h3> 
<p align="middle">Note that if the doctor is already treating the patient, your entry would fail.</p>
<br>
<form action="assignTreats.php" method="post" align="middle">
	<p>Please select the patient here:  </p>
 	<select name="patient" id="patient">
 		<! ––use php file to load options displayed as patient names ––>
		<?php include"patient.php" ?>
 	</select>
 
 	<br>
 	<p>Please select the doctor here: </p>
 	<select name="doctor" id="doctor"> 
		<! ––use php file to load options displayed as doctor names ––>
 		<?php include"docLicenseNum.php" ?>
 	</select>
 	<br>
	<br>
 	<div><input type = "submit" value = "confirm"/></div>

</form>

<br>

<! ––cancle treatment ––>
<h3 align="middle">If you want to cancel treatment for a patient, please select here: </h3>
<br>
<form action="cancelTreats.php" method="post" align="middle">
	 <p>Please select the patient here:</p>
	 <select name="patient" id="patient">
	 	<?php include"patient.php" ?>
	 </select>

	 <br>
	 <p>Please select the doctor here:</p>
	 <select name="doctor" id="doctor">
		 <?php include"docLicenseNum.php" ?>
	 </select>
	 <br>
	 <br>
	 <div ><input type = "submit" value = "confirm"/></div>

</form>
<br>

<! ––doctor who treats no one at the time––>
<h3 align="middle">Here is a list of doctors who are seeing no patients, feel free to book an appointment with them. </h3>
<form align="middle">
	<p><?php include"DocWithNoPatient.php" ?></p>
</form>

<br>
<h3 align="middle">Add doctor images</h3>

<form action="" method="post" align="middle">

	<p>Please select the name of the doctor and enter the url of the picture you want to upload:</p>
	<br>
	<select name="image" id="image">
 	<option value="1">Select Here</option>

	<?php
	include "getDocNameNoOrder.php";
	?>

	</select>&nbsp; 
	<input type='text' value='url' name='url'>	
	<input type = "submit" value = "OK"/>

</form>
<br>
<?php
 if (isset($_POST['image'])) {
 include "dbconnect.php";
 include "addImage.php";
 }
?>
<br>

<h1><img src="https://www.netclipart.com/pp/m/335-3354511_old-man-on-hospital-bed-with-doctor-cartoon.png" alt="link lost" ></h1>

</body>
</html>

