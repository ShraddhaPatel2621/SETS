<?php
									header('Content-Type: application/json');

									require("DB/dbconn.php");

									$sqlQuery = "SELECT DISTINCT Income_Category, REPLACE(REPLACE(Amount, '$', ''), ',', '') as Amount FROM income where MONTH(Date)=MONTH(now())  order by Income_Id DESC";

									$result = mysqli_query($conn,$sqlQuery);

									$data = array();
									foreach ($result as $row) {
									$data[] = $row;
								}

								mysqli_close($conn);

								echo json_encode($data);
								?>