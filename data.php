<?php
require("DB/dbconn.php");
  session_start();
  $User_Id=$_SESSION['User_Id'];
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
    $User_Id=$_SESSION['User_Id'];
									header('Content-Type: application/json');

									// require("DB/dbconn.php");

									$sqlQuery = "SELECT DISTINCT Income_Category, REPLACE(REPLACE(Amount, '$', ''), ',', '') as Amount FROM income where MONTH(Date)=MONTH(now()) AND User_Id='$User_Id' order by Income_Id DESC";

									$result = mysqli_query($conn,$sqlQuery);

									$data = array();
									foreach ($result as $row) {
									$data[] = $row;
								}

								mysqli_close($conn);

								echo json_encode($data);

							}
								?>