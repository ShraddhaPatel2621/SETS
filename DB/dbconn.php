<?php 
$servername="localhost";
$username="root";
$passward="";
$dbname="sets";


$conn = mysqli_connect($servername,$username,$passward,$dbname);
 if(!$conn)
 {
 die("connection failed : " . mysqli_connect_error());
 }
 
 mysqli_set_charset($conn,"utf8");  
?>

