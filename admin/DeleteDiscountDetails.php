<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'Admin'){
require("../DB/dbconn.php");			

$DiscountDetail_Id = $_POST['DiscountDetail_Id'];



$query = "DELETE from discount_detail where DiscountDetail_Id='$DiscountDetail_Id'";





			if (mysqli_query($conn , $query)) {

				

				echo "<script>alert('Discount Details Deleted successfully.');window.location='../admin/ViewDiscountDetails.php';</script>";


				mysqli_close($conn);



			

			} else {

				

				echo "<script>alert('Discount Details are not Deleted successfully.');window.location='../admin/ViewDiscountDetails.php';</script>";


				mysqli_close($conn);

			}

	
	}						

		?>