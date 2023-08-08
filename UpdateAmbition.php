<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
$Amb_Id = mysqli_real_escape_string($conn,$_POST['Amb_Id']);
$Ambition_Name = mysqli_real_escape_string($conn,$_POST['Ambition_Name']);
$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
$Target_Date = mysqli_real_escape_string($conn,$_POST['Target_Date']);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");

$query = "UPDATE Ambition SET User_Id='$User_Id', Full_Name='$Full_Name',Ambition_Name='$Ambition_Name', Amount='$Amount', Target_Date='$Target_Date', timestamp='$timestamp' where Amb_Id='$Amb_Id'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Ambition Updated successfully.');window.location='ViewAmbition.php';</script>";

}

else{
	echo "<script>alert('Ambition not Updated successfully...!!');</script>";

}

 }
else{
	echo "unauthorized";
}







?>