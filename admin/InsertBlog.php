
<?php


require("../DB/dbconn.php");
$Title = mysqli_real_escape_string($conn,$_POST['Title']);	
$summernote = $_POST['summernote'];
$timestamp = date_default_timezone_set('US/Central'); 
$timestamp = date("Y-m-d H:i:s");
$Admin_Id = 1;

$msgstrip = strip_tags($summernote);		

$fewlinesmsg = mb_substr($msgstrip, 0, 60);



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




		$query = "INSERT INTO blog (Admin_Id, Title, Image, Description, timestamp) VALUES ('$Admin_Id', '$Title','$destinationfile','$summernote','$timestamp')"; 
		mysqli_query($conn, "set names 'utf8'");
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		
		if($result){

			echo "<script>alert('Blog Details Added successfully.');window.location='../admin/ViewBlog.php';</script>";

		}

		else{
			echo "<script>alert('Blog Details not Added successfully...!!');window.location='../admin/ViewBlog.php';</script>";

		}
	}


	else{
		
		echo "<script>alert('Error : Image format not supported. Data not inserted...!!'); </script>";


	}

	
	
}





?>