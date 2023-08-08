<?php
require("DB/dbconn.php");
session_start();



if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
  $User_Id=$_SESSION['User_Id'];
  $First_Name=$_SESSION['First_Name'];
  $Last_Name=$_SESSION['Last_Name'];

 $exp_category_dc = mysqli_query($conn, "SELECT Expense_Category FROM expense where User_Id='$User_Id' GROUP BY Expense_Category");
  $exp_amt_dc = mysqli_query($conn, "SELECT SUM(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as SAmount FROM expense where User_Id='$User_Id'  GROUP BY Expense_Category");

  $exp_date_line = mysqli_query($conn, "SELECT Date FROM expense where User_Id='$User_Id' GROUP BY Date");
  $exp_amt_line = mysqli_query($conn, "SELECT SUM(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as DAmount FROM expense where User_Id='$User_Id' GROUP BY Date");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SETS | View Budget VS Expense </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php
     include_once('NavBar.php');

?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
     include_once('SideMenu.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Budget Vs Expense</li>
            </ol>
          </div>
        </div>
      </div>
    </section> -->
<?php 
$query = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount1 FROM income where User_Id='$User_Id'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result); 
$Income = $row['sumAmount1'];

$query2 = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount2 FROM expense where User_Id='$User_Id'";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);
$Expense = $row2['sumAmount2'];

$query3 = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount3 FROM budget where User_Id='$User_Id'";
$result3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_assoc($result3);
$Budget = $row3['sumAmount3'];

$query5 = "SELECT sum(REPLACE(REPLACE(b.Amount, '$', ''), ',', '')) as bAmount, sum(REPLACE(REPLACE(e.Amount, '$', ''), ',', '')) As EAmount From budget b inner join expense e on b.Budget_Item = e.Expense_Category where b.User_Id='$User_Id' AND e.User_Id='$User_Id'"; 
$result5 = mysqli_query($conn, $query5);  
$row5 = mysqli_fetch_assoc($result5);
$bAmount = $row5['bAmount'];
$EAmount = $row5['EAmount'];
$saved = $row5['bAmount'] - $row5['EAmount'];
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <h3 class="mt-4">Full-Expense Report</h3>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Yearly Expenses</h5>
              </div>
              <div class="card-body">
                <canvas id="expense_line" height="150"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Expense Category</h5>
              </div>
              <div class="card-body">
                <canvas id="expense_category_pie" height="150"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title " style="font-weight: bold;
">SETS Summary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="padding:0px">
                  <table class="table table-bordered">
                  <thead style="background-color: lightcyan ;">
                    <tr>
                      <th style="width: 7px">No</th>
                      <th>Description</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="font-weight: bold;">1.</td>
                      <td style="font-weight: bold;">Budget(B)</td>
                      <td><?php echo '$'.$Budget;?></td>
                      
                    </tr>
                    <tr>
                      <td style="font-weight: bold;">2.</td>
                      <td style="font-weight: bold;">Income(I)</td>
                      <td><?php echo '$'.$Income;?></td>
                      
                    </tr>
                    <tr>
                      <td style="font-weight: bold;">3.</td>
                      <td style="font-weight: bold;">Expense(E)</td>
                      <td><?php echo '$'.$Expense;?></td>
                      
                    </tr>
                    <tr>
                      <td style="font-weight: bold;">4.</td>
                      <td style="font-weight: bold;">Saving (I - E)</td>
                      <td><?php echo '$'.$Income - $Expense;?></td>
                      
                    </tr>
                    <tr>
                      <td style="font-weight: bold;">5.</td>
                      <td style="font-weight: bold;">Saving (B - E)</td>
                      <td><?php echo '$'.$Budget - $Expense;?></td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <!-- col-4 -->
          <div class="col-6">
            <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title " style="font-weight: bold;
">Saving Summary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="padding:0px">
                  <table class="table table-bordered">
                  <thead style="background-color: lightgoldenrodyellow ;">
                    <tr>
                      <th style="width: 7px">No</th>
                      <th>Description</th>
                      <th>Budget</th>
                      <th>Expense</th>
                      <th>Saved</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
//Budget and expense calculation
$query4 = "SELECT DISTINCT Budget_Item, REPLACE(REPLACE(b.Amount, '$', ''), ',', '') as bAmount, REPLACE(REPLACE(e.Amount, '$', ''), ',', '') As EAmount From budget b inner join expense e on b.Budget_Item = e.Expense_Category where b.User_Id='$User_Id' AND e.User_Id='$User_Id'"; 

$result4 = mysqli_query($conn, $query4);
$no=1; 

while($row4 = mysqli_fetch_assoc($result4)){

$Budget_Item = $row4['Budget_Item'];
$bAmount = $row4['bAmount'];
$EAmount = $row4['EAmount'];



 
?>
                    <tr>
                      <td style="font-weight: bold;"><?php echo $no++;?></td>
                      <td style="font-weight: bold;"><?php echo $Budget_Item;?></td>
                      <td><?php echo '$'.$bAmount;?></td> 
                      <td><?php echo '$'.$EAmount;?></td>   
                      <td><?php echo '$'.($bAmount - $EAmount);?></td> 
                    </tr>
<?php }?>             
                    <tr>
                      <td style="font-weight: bold;" colspan="2">TOTAL</td>
                      <td><?php echo '$'.$row5['bAmount'];?></td>
                      <td><?php echo '$'.$row5['EAmount'];?></td> 
                      <td><?php echo '$'.$saved;?></td> 
                    </tr>       
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--  footer start-->

<?php
    include_once('Footer.php');
}
?>	
<!--	footer End-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
<!-- Page specific script -->

<script type="text/javascript">
  
    var ctx = document.getElementById('expense_category_pie').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php while ($a = mysqli_fetch_array($exp_category_dc)) {
                    echo '"' . $a['Expense_Category'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by Category',
          data: [<?php while ($b = mysqli_fetch_array($exp_amt_dc)) {
                    echo '"' . $b['SAmount'] . '",';
                  } ?>],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          borderWidth: 1
        }]
      }
    });

    var line = document.getElementById('expense_line').getContext('2d');
    var myChart = new Chart(line, {
      type: 'line',
      data: {
        labels: [<?php while ($c = mysqli_fetch_array($exp_date_line)) {
                    echo '"' . $c['Date'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by Month (Whole Year)',
          data: [<?php while ($d = mysqli_fetch_array($exp_amt_line)) {
                    echo '"' . $d['DAmount'] . '",';
                  } ?>],
          borderColor: [
            '#adb5bd'
          ],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          fill: false,
          borderWidth: 2
        }]
      }
    });
  

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
