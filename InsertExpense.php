<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
$ExpenseCategory_Type = mysqli_real_escape_string($conn,$_POST['ExpenseCategory_Type']);
$Expense_Category = mysqli_real_escape_string($conn,$_POST['Expense_Category']);
$Amount = mysqli_real_escape_string($conn,$_POST['Amount']);
$Date = mysqli_real_escape_string($conn,$_POST['Date']);
$Payment_Method = mysqli_real_escape_string($conn,$_POST['Payment_Method']);
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

		move_uploaded_file($filetmp, $destinationfile);
$query = "INSERT INTO expense (User_Id, Full_Name, ExpenseCategory_Type, Expense_Category, Payment_Method, Amount, Date, Description, Image, timestamp) VALUES ('$User_Id', '$Full_Name', '$ExpenseCategory_Type','$Expense_Category', '$Payment_Method','$Amount','$Date','$summernote', '$destinationfile','$timestamp')"; 
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Expense  Added successfully.');window.location='ViewExpense.php';</script>";

}

else{
	echo "<script>alert('Expense  not Added successfully...!!');</script>";

}
}


	else{
		
		echo "<script>alert('Error : Image format not supported. Data not inserted...!!'); </script>";


	}

	
	
}
 }
else{
	echo "unauthorized";
}







?>