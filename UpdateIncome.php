<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
	$Income_Id=mysqli_real_escape_string($conn,$_POST['Income_Id']);
	$Income_Category = mysqli_real_escape_string($conn,$_POST['Income_Category']);
	$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
	$Payment_Method = mysqli_real_escape_string($conn,$_POST['Payment_Method']);
	$Date = mysqli_real_escape_string($conn,$_POST['Date']);
	$summernote = mysqli_real_escape_string($conn,$_POST['summernote']);
	$msgstrip = strip_tags($summernote);		
	$fewlinesmsg = mb_substr($msgstrip, 0, 60);	
	$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
	$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
	$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
	$Full_Name= $First_Name. " " .$Last_Name;
	$timestamp = date_default_timezone_set('US/Central'); 
	$timestamp = date("Y-m-d H:i:s");


	$query = "UPDATE income SET User_Id='$User_Id', Full_Name='$Full_Name',Income_Category='$Income_Category', Amount='$Amount', Payment_Method='$Payment_Method',Date='$Date', Description='$summernote', timestamp='$timestamp' where Income_Id='$Income_Id'";
	mysqli_query($conn, "set names 'utf8'");
	if(mysqli_query($conn,$query)){


		echo "<script>alert('Income Updated successfully.');window.location='ViewIncome.php';</script>";

	}

	else{
		echo "<script>alert('Income not Updated successfully...!!');window.location='ViewIncome.php';</script>";

	}
	
}

?>