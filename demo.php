<?php
require("DB/dbconn.php");
session_start();


$sql = "SELECT Expense_Category, floor(REPLACE(Amount, '$', '')) as Amount From expense";
$result = mysqli_query($conn, $sql); 

// Create an array to hold the data for the pie chart
$data = array();
$total_expenses = 0;

// Loop through the fetched data to calculate total expenses and populate the data array
while ($row = mysqli_fetch_assoc($result)) {
    // $Amount = (float) $row['Amount'];
    $data[] = [$row['Expense_Category'], $row['Amount']];
    $total_expenses += $row['Amount'];
}

// Don't forget to close the database connection when done
mysqli_close($conn);
?>