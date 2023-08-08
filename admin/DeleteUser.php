<?php 
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'Admin'){
require("../DB/dbconn.php");			

$SignUp_Id = $_POST['SignUp_Id'];



$query = "DELETE from signup where SignUp_Id='$SignUp_Id'";





			if (mysqli_query($conn , $query)) {

				

				echo "<script>alert('Users Details Deleted successfully.');window.location='../admin/ViewUser.php';</script>";


				mysqli_close($conn);



			

			} else {

				

				echo "<script>alert('Users Details are not Deleted successfully.');window.location='../admin/ViewUser.php';</script>";


				mysqli_close($conn);

			}

	}						

		?>