<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'Admin'){
require("../DB/dbconn.php");
		$DiscountDetail_Id=mysqli_real_escape_string($conn,$_POST['DiscountDetail_Id']);	

		$Title = mysqli_real_escape_string($conn,$_POST['Title']);
 
			$Description = mysqli_real_escape_string($conn,$_POST['Description']);
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



							   $query = "UPDATE discount_detail SET Admin_Id='$Admin_Id', Title='$Title',Description='$summernote',  Image='$destinationfile', timestamp='$timestamp' where DiscountDetail_Id='$DiscountDetail_Id'";
                               mysqli_query($conn, "set names 'utf8'");
								if(mysqli_query($conn,$query)){


									echo "<script>alert('Discount Details Updated successfully.');window.location='../admin/ViewDiscountDetails.php';</script>";

							   	}

								else{
									echo "<script>alert('Discount Details not Updated successfully...!!');window.location='../admin/ViewDiscountDetails.php';</script>";

								}
							}


							
					  
					  
				  }
				  
				  else{
					   
								 
									 echo "<script>alert('Discount Details not Updated successfully...!!');window.location='../admin/ViewDiscountDetails.php';</script>";

								
					  
				  }
				}
		?>