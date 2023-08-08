<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'Admin'){
require("../DB/dbconn.php");			

$Blog_Id = $_POST['Blog_Id'];



$query = "DELETE from blog where Blog_Id='$Blog_Id'";





			if (mysqli_query($conn , $query)) {

				

				echo "<script>alert('Blog Details Deleted successfully.');window.location='../admin/ViewBlog.php';</script>";


				mysqli_close($conn);



			

			} else {

				

				echo "<script>alert('Blog Details are not Deleted successfully.');window.location='../admin/ViewBlog.php';</script>";


				mysqli_close($conn);

			}

	}						

		?>