<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$IncomeCat_Id = $_POST['IncomeCat_Id'];
$query = "DELETE from income_category where IncomeCat_Id='$IncomeCat_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Income Category Details Deleted successfully.');window.location='ViewIncomeCategory.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Income Category are not Deleted successfully.');window.location='ViewIncomeCategory.php';</script>";

	mysqli_close($conn);

}
}

?>