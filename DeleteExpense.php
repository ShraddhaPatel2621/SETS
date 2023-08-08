<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$Expense_Id = $_POST['Expense_Id'];
$query = "DELETE from Expense where Expense_Id='$Expense_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Expense Details Deleted successfully.');window.location='ViewExpense.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Expense are not Deleted successfully.');window.location='ViewExpense.php';</script>";

	mysqli_close($conn);

}
}

?>