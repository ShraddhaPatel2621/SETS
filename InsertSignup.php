
<?php


require("DB/dbconn.php");
$First_Name = mysqli_real_escape_string($conn,$_POST['First_Name']);	
$Last_Name = mysqli_real_escape_string($conn,$_POST['Last_Name']);	
$User_Name = mysqli_real_escape_string($conn,$_POST['User_Name']);	
$Password = mysqli_real_escape_string($conn,$_POST['Password']);	
$Mobile_No = mysqli_real_escape_string($conn,$_POST['Mobile_No']);	
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");


if($_FILES["fileToUpload"]["name"] != ''){
	
	
	$files = $_FILES['fileToUpload'];

	$filename = $files['name'];

	$fileerror = $files['error'];

	$filetmp = $files['tmp_name'];

	$fileext = explode('.',$filename);

	$filecheck = strtolower(end($fileext));

	
	$fileextstored = array('png', 'jpg', 'jpeg');

	if (in_array($filecheck,$fileextstored)) {

		$destinationfile ='uploads/'.$filename;

		move_uploaded_file($filetmp, $destinationfile);

$query = "INSERT INTO signup (First_Name, Last_Name, User_Name, Password, Image, Mobile_No) VALUES ('$First_Name', '$Last_Name','$User_Name','$Password', '$destinationfile','$Mobile_No')"; 
mysqli_query($conn, "set names 'utf8'");
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($result){

	echo "<script>alert('Your signup are done successfully.');window.location='index.php';</script>";

}

else{
	echo "<script>alert('Your signup are not done successfully...!!');</script>";

}

}


	else{
		
		echo "<script>alert('Error : Image format not supported. Data not inserted...!!'); </script>";


	}




}



?>