<?php
require("DB/dbconn.php");
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
  $User_Id=$_SESSION['User_Id'];
  $First_Name=$_SESSION['First_Name'];
  $Last_Name=$_SESSION['Last_Name'];

?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SETS | View Budget</title>

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Budget</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Budget</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Budget</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Id</th>
                    <th>Budget Category Type</th>
                    <th>Budget Item</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php

                      require("DB/dbconn.php");

                      $query = "SELECT * FROM budget order by Budget_Id DESC";

                      mysqli_query($conn, "set names utf8");

                      $result = mysqli_query($conn, $query);

                      $no = mysqli_num_rows($result);

                      if($no==0)

                      {

                        echo "";

                      }



                      if ($no > 0) {

    // output data of each row

                        while($row = mysqli_fetch_assoc($result)) {



                          echo "<tr>";

                          echo "<td><form action='EditBudget.php' Method='POST'><input type='hidden' name='Budget_Id' value='".$row['Budget_Id']."'>

                          <button type='submit' class='btn btn-primary btn-sm'>Edit</button></form></td>";

                          echo "<td><form action='DeleteBudget.php' Method='POST'><input type='hidden' name='Budget_Id' value='".$row['Budget_Id']."'>";

                          ?>

                          <button type="submit" onclick="return confirm('Are you sure you want to delete this Expense?')" class="btn btn-danger fg-1">Delete</button></form></td>



                          <?php
                          echo "<td>".$row['Budget_Id']."</td>";
                          echo "<td>".$row['BudgetCat_Type']."</td>";
                          echo "<td>".$row['Budget_Item']."</td>";
                          echo "<td>".$row['Amount']."</td>";
                          echo "<td>".$row['Date']."</td>";

                          

                          echo "</tr>";



                        }

                      }

                      ?> 
                    </tbody>
                  <tfoot>
                    <tr>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Id</th>
                    <th>Budget Category Type</th>
                    <th>Budget Item</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
<!-- Page specific script -->
<script>
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
