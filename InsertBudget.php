<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){ 
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

 
$query = "INSERT INTO budget (User_Id, Full_Name, BudgetCat_Type, Budget_Item, Amount, Date,timestamp) VALUES ('$User_Id', '$Full_Name', '$BudgetCat_Type','$Budget_Item', '$Amount', '$Date','$timestamp')"; 
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Budget Added successfully.');window.location='ViewBudget.php';</script>";

}

else{
	echo "<script>alert('Budget not Added successfully...!!');</script>";

}


}
else{
	echo "unauthorized";
}







?>