<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
$IncomeCat_Id=mysqli_real_escape_string($conn,$_POST['IncomeCat_Id']);	
$Income_Category = mysqli_real_escape_string($conn,$_POST['Income_Category']);
$User_Id = mysqli_real_escape_string($conn,$_POST['User_Id']);	
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$Full_Name= $First_Name. " " .$Last_Name;
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");


							   $query = "UPDATE income_category SET User_Id='$User_Id', Full_Name='$Full_Name',Income_Category='$Income_Category', timestamp='$timestamp' where IncomeCat_Id='$IncomeCat_Id'";
                               mysqli_query($conn, "set names 'utf8'");
								if(mysqli_query($conn,$query)){


									echo "<script>alert('Income Category Updated successfully.');window.location='ViewIncomeCategory.php';</script>";

							   	}

								else{
									echo "<script>alert('Income Category not Updated successfully...!!');window.location='ViewIncomeCategory.php';</script>";

								}
							
}

		?>