<?php
require("DB/dbconn.php");

    if(isset($_POST['ExpenseCategory_Type'])){
        // your database connection code

        $ExpenseCategory_Type = $_POST['ExpenseCategory_Type'];
        $sql = "SELECT * FROM expense_category WHERE ExpenseCategory_Type = '$ExpenseCategory_Type' ";
        $result = mysqli_query($conn, $sql);
        echo "<option value=''  selected='selected' disabled>------selected--------</option>";
        while($row = mysqli_fetch_array($result)){
             
            
            echo "<option value='" . $row['Expense_Category'] ."'>" . $row['Expense_Category'] ."</option>";
        }
    }

?>