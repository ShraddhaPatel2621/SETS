<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){ 
$ExpenseCategory_Type = mysqli_real_escape_string($conn,$_POST['ExpenseCategory_Type']);
$Expense_Category = mysqli_real_escape_string($conn,$_POST['Expense_Category']);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");


$query = "INSERT INTO Expense_Category (User_Id, Full_Name, ExpenseCategory_Type, Expense_Category, timestamp) VALUES ('$User_Id', '$Full_Name', '$ExpenseCategory_Type','$Expense_Category','$timestamp')"; 
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Expense Category Added successfully.');window.location='ViewExpenseCategory.php';</script>";

}

else{
	echo "<script>alert('Expense Category not Added successfully...!!');</script>";

}


}
else{
	echo "unauthorized";
}







?>