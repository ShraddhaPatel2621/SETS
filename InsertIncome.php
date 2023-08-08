<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){

$Income_Category = mysqli_real_escape_string($conn,$_POST['Income_Category']);
$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
$Date = mysqli_real_escape_string($conn,$_POST['Date']);
$summernote = mysqli_real_escape_string($conn,$_POST['summernote']);
$Payment_Method = mysqli_real_escape_string($conn,$_POST['Payment_Method']);
$msgstrip = strip_tags($summernote);		
$fewlinesmsg = mb_substr($msgstrip, 0, 60);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");

$query = "INSERT INTO income (User_Id, Full_Name, Income_Category, Amount, Payment_Method, Date, Description, timestamp) VALUES ('$User_Id', '$Full_Name','$Income_Category','$Amount', '$Payment_Method','$Date','$summernote','$timestamp')"; 
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Income  Added successfully.');window.location='ViewIncome.php';</script>";

}

else{
	echo "<script>alert('Income  not Added successfully...!!');</script>";

}

 }
else{
	echo "unauthorized";
}







?>