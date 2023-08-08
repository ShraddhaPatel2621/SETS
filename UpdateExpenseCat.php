<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
	$ExpenseCat_Id=mysqli_real_escape_string($conn,$_POST['ExpenseCat_Id']);	
$ExpenseCategory_Type = mysqli_real_escape_string($conn,$_POST['ExpenseCategory_Type']);
$Expense_Category = mysqli_real_escape_string($conn,$_POST['Expense_Category']);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");


							   $query = "UPDATE expense_category SET User_Id='$User_Id', Full_Name='$Full_Name', ExpenseCategory_Type='$ExpenseCategory_Type', Expense_Category='$Expense_Category', timestamp='$timestamp' where ExpenseCat_Id='$ExpenseCat_Id'";
                               mysqli_query($conn, "set names 'utf8'");
								if(mysqli_query($conn,$query)){


									echo "<script>alert('Expense Category Updated successfully.');window.location='ViewExpenseCategory.php';</script>";

							   	}

								else{
									echo "<script>alert('Expense Category not Updated successfully...!!');window.location='ViewExpenseCategory.php';</script>";

								}
							
}

		?>