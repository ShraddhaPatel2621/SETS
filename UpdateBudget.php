<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){

$Budget_Id = mysqli_real_escape_string($conn,$_POST['Budget_Id']);
$BudgetCat_Type = mysqli_real_escape_string($conn,$_POST['BudgetCat_Type']);
$Budget_Item = mysqli_real_escape_string($conn,$_POST['Budget_Item']);
$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
$Date = mysqli_real_escape_string($conn,$_POST['Date']);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");


echo $query = "UPDATE budget SET User_Id='$User_Id', Full_Name='$Full_Name',BudgetCat_Type='$BudgetCat_Type',Budget_Item='$Budget_Item', Amount='$Amount', Date='$Date', timestamp='$timestamp' where Budget_Id='$Budget_Id'";
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Budget Updated successfully.');window.location='ViewBudget.php';</script>";

}

else{
	echo "<script>alert('Budget not Updated successfully...!!');</script>";

}


}
else{
	echo "unauthorized";
}







?>