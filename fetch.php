<?php
require("DB/dbconn.php");

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value

## Date search value
$searchByFromdate = mysqli_real_escape_string($conn,$_POST['searchByFromdate']);
$searchByTodate = mysqli_real_escape_string($conn,$_POST['searchByTodate']);
## Search Query
$searchQuery = array();
if($searchValue != ''){
     $searchQuery[] = "(Income_Category like '%".$searchValue."%' or Amount like '%".$searchValue."%' or Payment_Method like '%".$searchValue."%')";
}

// Date filter
if($searchByFromdate != '' && $searchByTodate != ''){
     $searchQuery[] = "(Date between '".$searchByFromdate."' and '".$searchByTodate."')";
}

$WHERE = "";
if(count($searchQuery) > 0){
     $WHERE = " WHERE ".implode(' and ',$searchQuery);
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from income");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from income ".$WHERE);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from income ".$WHERE." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    	"Income_Id"=>$row['Income_Id'],
    	"Income_Category"=>$row['Income_Category'],
    	"Amount"=>$row['Amount'],
    	"Payment_Method"=>$row['Payment_Method'],
    	"Date"=>$row['Date']
    );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
die;