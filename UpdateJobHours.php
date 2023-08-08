<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
$JobHours_Id = mysqli_real_escape_string($conn,$_POST['JobHours_Id']);
$Company_Name = mysqli_real_escape_string($conn,$_POST['Company_Name']);
$startTime = mysqli_real_escape_string($conn,$_POST['startTime']);
$endTime = mysqli_real_escape_string($conn,$_POST['endTime']);
$totalHour = mysqli_real_escape_string($conn,$_POST['totalHour']);
$summernote = mysqli_real_escape_string($conn,$_POST['summernote']);
$msgstrip = strip_tags($summernote);		
$fewlinesmsg = mb_substr($msgstrip, 0, 60);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");

$query = "UPDATE JobHours SET User_Id='$User_Id', Full_Name='$Full_Name',Company_Name='$Company_Name',startTime='$startTime', endTime='$endTime', totalHour='$totalHour', Description='$summernote', timestamp='$timestamp' where JobHours_Id='$JobHours_Id'";
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Job Hours  Updated successfully.');window.location='ViewJobHours.php';</script>";

}

else{
	echo "<script>alert('Job Hours  not Updated successfully...!!');</script>";

}

 }
else{
	echo "unauthorized";
}







?>