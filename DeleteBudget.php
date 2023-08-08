<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$Budget_Id = $_POST['Budget_Id'];
$query = "DELETE from Budget where Budget_Id='$Budget_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Budget Details Deleted successfully.');window.location='ViewBudget.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Budget are not Deleted successfully.');window.location='ViewBudget.php';</script>";

	mysqli_close($conn);

}
}

?>