<?php
require("DB/dbconn.php");
session_start();
  $User_Id=$_SESSION['User_Id'];
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
    if(isset($_POST['ExpenseCategory_Type'])){
        // your database connection code

        $ExpenseCategory_Type = $_POST['ExpenseCategory_Type'];
        $sql = "SELECT * FROM expense_category WHERE ExpenseCategory_Type = '$ExpenseCategory_Type'  AND User_Id='$User_Id'";
        $result = mysqli_query($conn, $sql);
        echo "<option value=''  selected='selected' disabled>------selected--------</option>";
        while($row = mysqli_fetch_array($result)){
             
            
            echo "<option value='" . $row['Expense_Category'] ."'>" . $row['Expense_Category'] ."</option>";
        }
    }
}
?>