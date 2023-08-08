<?php
require("DB/dbconn.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// $recaptcha=$_POST['g-recaptcha-response'];
//if(empty($recaptcha))
//{
//$msg="You can't left reCaptcha field empty. ";
//}
//else 
//{ 
$User_Name = mysqli_real_escape_string($conn,$_POST['User_Name']);
$Password = mysqli_real_escape_string($conn,$_POST['Password']);

 
if($User_Name == 'Admin26@gmail.com'){
	$query1 = sprintf("SELECT User_Name, Password FROM admin WHERE User_Name='%s' AND Password='%s'",$User_Name,$Password);
	
	mysqli_query($conn, "set names utf8");
	$result1 = mysqli_query($conn, $query1);
	$no1 = mysqli_num_rows($result1);
if($no1 > 0){

	$row1 = mysqli_fetch_assoc($result1);
	$_SESSION['loggedin'] = true;
	$_SESSION['user'] = 'Admin';
	// $_SESSION['First_Name'] = $row1['First_Name'];
	// $_SESSION['Last_Name'] = $row1['Last_Name'];
	$_SESSION['User_Name'] = $row1['User_Name'];
    $_SESSION['User_Id'] = $row1['SignUp_Id'];
	$url='admin/SETSAdmin.php';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';
	mysqli_close($conn);
	exit();

}else
{
	
    echo "<script>alert('Username and Password are wrong.');window.location='../Index.php';</script>";
	
	mysqli_close($conn);
	
}

}
else{

	$query1 = sprintf("SELECT * FROM signup WHERE User_Name='%s' AND Password='%s'",$User_Name,$Password);
	
	mysqli_query($conn, "set names utf8");
	$result1 = mysqli_query($conn, $query1);
	$no1 = mysqli_num_rows($result1);
if($no1 > 0){

	$row1 = mysqli_fetch_assoc($result1);
	$_SESSION['loggedin'] = true;
	$_SESSION['user'] = 'user';
	$_SESSION['First_Name'] = $row1['First_Name'];
	$_SESSION['Last_Name'] = $row1['Last_Name'];
	$_SESSION['User_Name'] = $row1['User_Name'];
    $_SESSION['User_Id'] = $row1['SignUp_Id'];
	
	$url='SETSHome.php';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';
	mysqli_close($conn);
	exit();

	}else
{
	
    echo "<script>alert('Username and Password are wrong.');window.location='../Index.php';</script>";
	
	mysqli_close($conn);
	
}

}

	
		
	}
 



?>