<?php
require("DB/dbconn.php");

$User_Name=$_POST['User_Name'];

$query = "SELECT * FROM signup WHERE User_Name = '$User_Name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$SignUp_Id=$row['SignUp_Id'];

$Password=mysqli_real_escape_string($conn,$_POST['Password']);	
$Confirm_Password = mysqli_real_escape_string($conn,$_POST['Confirm_Password']);


							   $query = "UPDATE signup SET Password='$Confirm_Password' where SignUp_Id='$SignUp_Id'";

                               mysqli_query($conn, "set names 'utf8'");
								if(mysqli_query($conn,$query)){


									echo "<script>alert('Password is Updated successfully.');window.location='Index.php';</script>";

							   	}

								else{
									echo "<script>alert('Password is not Updated successfully...!!');window.location='Index.php';</script>";

								}
							


		?>