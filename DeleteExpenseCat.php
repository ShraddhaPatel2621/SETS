<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$ExpenseCat_Id = $_POST['ExpenseCat_Id'];
$query = "DELETE from expense_category where ExpenseCat_Id='$ExpenseCat_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Expense Category Details Deleted successfully.');window.location='ViewExpenseCategory.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Expense Category are not Deleted successfully.');window.location='ViewExpenseCategory.php';</script>";

	mysqli_close($conn);

}
}

?>