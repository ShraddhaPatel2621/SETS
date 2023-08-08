<?php
require("DB/dbconn.php");
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){		
$Amb_Id = $_POST['Amb_Id'];
$query = "DELETE from Ambition where Amb_Id='$Amb_Id'";

if (mysqli_query($conn , $query)) {
	echo "<script>alert('Ambition Details Deleted successfully.');window.location='ViewAmbition.php';</script>";
	mysqli_close($conn);

} else {

	echo "<script>alert('Ambition are not Deleted successfully.');window.location='ViewAmbition.php';</script>";

	mysqli_close($conn);

}
}

?>