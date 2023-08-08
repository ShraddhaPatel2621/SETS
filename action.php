<?php

//action.php

require("DB/dbconn.php");
  session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('Income_Id', 'Amount', 'Date');

		$main_query = "SELECT Income_Id, Amount, Date FROM income";

		$search_query = 'WHERE Date <= "'.date('Y-m-d').'" AND ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'Date >= "'.$_POST["start_date"].'" AND Date <= "'.$_POST["end_date"].'" AND ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(Income_Id LIKE "%'.$_POST["search"]["value"].'%" OR Amount LIKE "%'.$_POST["search"]["value"].'%" OR Date LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY Date ";

		$order_by_query = "";

		/*if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY Date DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
*/
		$statement = $conn->prepare($main_query . $search_query . $group_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $conn->prepare($main_query . $group_by_query);

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $conn->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();

			$sub_array[] = $row['Income_Id'];

			$sub_array[] = $row['Amount'];

			$sub_array[] = $row['Date'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);
	}
}

?>