<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
$Expense_Id=mysqli_real_escape_string($conn,$_POST['Expense_Id']);
$ExpenseCategory_Type = mysqli_real_escape_string($conn,$_POST['ExpenseCategory_Type']);
$Expense_Category = mysqli_real_escape_string($conn,$_POST['Expense_Category']);
$Payment_Method = mysqli_real_escape_string($conn,$_POST['Payment_Method']);
$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
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
if($_FILES["fileToUpload"]["name"] != ''){
	
	
	$files = $_FILES['fileToUpload'];

	$filename = $files['name'];

	$fileerror = $files['error'];

	$filetmp = $files['tmp_name'];

	$fileext = explode('.',$filename);

	$filecheck = strtolower(end($fileext));

	
	$fileextstored = array('png', 'jpg', 'jpeg');

	if (in_array($filecheck,$fileextstored)) {

		$destinationfile ='uploads/'.$filename;

							   $query = "UPDATE expense SET User_Id='$User_Id', Full_Name='$Full_Name',Expense_Category='$Expense_Category',ExpenseCategory_Type='$ExpenseCategory_Type', Payment_Method='$Payment_Method', Amount='$Amount', Date='$Date', Description='$summernote', Image='$destinationfile', timestamp='$timestamp' where Expense_Id='$Expense_Id'";
                               mysqli_query($conn, "set names 'utf8'");
								if(mysqli_query($conn,$query)){


									echo "<script>alert('Expense Updated successfully.');window.location='ViewExpense.php';</script>";

							   	}

								else{
									echo "<script>alert('Expense not Updated successfully...!!');window.location='ViewExpense.php';</script>";

								}
								}


	else{
		
		echo "<script>alert('Error : Image format not supported. Data not inserted...!!'); </script>";


	}

	
	
}
							
}

		?>