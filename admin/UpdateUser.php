<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'Admin'){
require("../DB/dbconn.php");
$SignUp_Id=mysqli_real_escape_string($conn,$_POST['SignUp_Id']);	

$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);
$User_Name = mysqli_real_escape_string($conn,$_POST['User_Name']);
$Password = mysqli_real_escape_string($conn,$_POST['Password']);
$Mobile_No = mysqli_real_escape_string($conn,$_POST['Mobile_No']);

if($_FILES["fileToUpload"]["name"] != ''){
	$files = $_FILES['fileToUpload'];

	$filename = $files['name'];

	$fileerror = $files['error'];

	$filetmp = $files['tmp_name'];

	$fileext = explode('.',$filename);

	$filecheck = strtolower(end($fileext));


	$fileextstored = array('png', 'jpg', 'jpeg');

	if (in_array($filecheck,$fileextstored)) {

		$destinationfile ='../uploads/'.$filename;

		move_uploaded_file($filetmp, $destinationfile);



		$query = "UPDATE signup SET First_Name='$First_Name', Last_Name='$Last_Name',User_Name='$User_Name',  Password='$Password', Image='$destinationfile',Mobile_No='$Mobile_No' where SignUp_Id='$SignUp_Id'";
		mysqli_query($conn, "set names 'utf8'");
		if(mysqli_query($conn,$query)){


			// echo "<script>alert('Student Details Updated successfully.');window.location='../admin/ViewUser.php';</script>";

		}

		else{
			// echo "<script>alert('Student Details not Updated successfully...!!');window.location='../admin/ViewUser.php';</script>";

		}
	}


	
	
	
}

else{
	
	
	echo "<script>alert('Image is not setted...!!');</script>";

	
	
}
}
?>