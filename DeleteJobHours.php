<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$JobHours_Id = $_POST['JobHours_Id'];
$query = "DELETE from JobHours where JobHours_Id='$JobHours_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Job Hours Details Deleted successfully.');window.location='ViewJobHours.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Job Hours are not Deleted successfully.');window.location='ViewJobHours.php';</script>";

	mysqli_close($conn);
}
}

?>