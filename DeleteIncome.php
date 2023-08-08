<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$Income_Id = $_POST['Income_Id'];
$query = "DELETE from income where Income_Id='$Income_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Income Details Deleted successfully.');window.location='ViewIncome.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Income are not Deleted successfully.');window.location='ViewIncome.php';</script>";

	mysqli_close($conn);

}
}

?>