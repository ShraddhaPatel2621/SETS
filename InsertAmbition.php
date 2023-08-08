<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){

$Ambition_Name = mysqli_real_escape_string($conn,$_POST['Ambition_Name']);
$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
$Target_Date = mysqli_real_escape_string($conn,$_POST['Target_Date']);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");

$query = "INSERT INTO ambition (User_Id, Full_Name, Ambition_Name, Amount, Target_Date, timestamp) VALUES ('$User_Id', '$Full_Name','$Ambition_Name','$Amount','$Target_Date','$timestamp')"; 
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Ambition Added successfully.');window.location='ViewAmbition.php';</script>";

}

else{
	echo "<script>alert('Ambition not Added successfully...!!');</script>";

}

 }
else{
	echo "unauthorized";
}







?>