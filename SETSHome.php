  <?php
  require("DB/dbconn.php");
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'user'){
    $User_Id=$_SESSION['User_Id'];


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>SETS !! Home Page</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
      <script src="dist/js/pages/dashboard.js"></script>

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!--navbar start-->
        <?php
        include_once('NavBar.php');

        ?>
        <!--navbar end-->

        <!--Sidemenu Start-->
        <?php
        include_once('SideMenu.php');

        ?>
        <!--	sidemenu End-->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
<?php 
require("DB/dbconn.php");

$query = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount1 FROM income where MONTH(Date)=MONTH(now()) AND User_Id=$User_Id";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result); 
$MonthIncome = $row['sumAmount1'];

$query1 = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount2 from income where YEAR(Date)=YEAR(now()) AND User_Id=$User_Id" ;

$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1); 
$YearIncome = $row1['sumAmount2'];

$query2 = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount3 FROM expense where MONTH(Date)=MONTH(now()) AND User_Id=$User_Id";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);
$MonthExpense = $row2['sumAmount3'];

$query3 = "SELECT sum(REPLACE(REPLACE(Amount, '$', ''), ',', '')) as sumAmount4 from expense where YEAR(Date)=YEAR(now()) AND User_Id=$User_Id" ;
$result3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_assoc($result3);
$YearExpense = $row3['sumAmount4'];

?>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Income</h3>

                      <p><b>Monthly:</b> <?php echo '$'.$MonthIncome;?></p>
                      <p><b>Yearly:</b> <?php echo '$'.$YearIncome;?></p>

                    </div>
                    <div class="icon">
                      <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>Expense</h3>

                      <p><b>Monthly:</b> <?php echo '$'.$MonthExpense;?></p>
                      <p><b>Yearly:</b> <?php echo '$'.$YearExpense;?></p>

                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>Saving</h3>

                      <p><b>Monthly:</b> <?php echo '$'.$MonthIncome - $MonthExpense;?></p>
                      <p><b>Yearly:</b> <?php echo '$'.$YearIncome - $YearExpense;?></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
          <!-- Main content -->
          <section class="content">

            <div class="container-fluid">
              <div class="row">

                <!-- left column -->
                <div class="col-md-6">
                  <!-- jquery validation -->
                  <div class="card card-primary" >
                    <div class="card-header" >
                      <h3 class="card-title">Income Details (<?php echo date('F');?>)</h3>
                    </div>
                     <div class="card"  id="chart-container" >
        <canvas id="graphCanvas"></canvas>
        </div>
                  </div>
                  
</div>
<!-- /.card -->

<!--/.col (center) -->
<!-- right column -->
<div class="col-md-6">
  <!-- jquery validation -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">expense Details (<?php echo date('F');?>)</h3>
    </div>
    <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Income</th>
                      <th>Amount</th>
                      <th style="width: 40px">Payment</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      require("DB/dbconn.php");
                      // $query = "select * from sales where MONTH(order_date)=MONTH(now())and YEAR(order_date)=YEAR(now())";

                       $query = "SELECT * FROM expense where MONTH(Date)=MONTH(now()) AND User_Id=$User_Id  order by Expense_Id DESC";

                      mysqli_query($conn, "set names utf8");

                      $result = mysqli_query($conn, $query);

                      $no = mysqli_num_rows($result);
                      $n=1;
                      if($no==0)

                      {

                        echo "";

                      }



                      if ($no > 0) {

    // output data of each row

                        while($row = mysqli_fetch_assoc($result)) {



                          echo "<tr>";

                          



                          
                          echo "<td>".$n++."</td>";
                          echo "<td>".$row['Expense_Category']."</td>";
                          echo "<td>".$row['Amount']."</td>";
                          echo "<td>".$row['Payment_Method']."</td>";
                          // echo "<td>".$row['Date']."</td>";
                          
                          

                          

                          echo "</tr>";



                        }

                      }

                      ?> 
                  </tbody>
                </table>
                
  </div>
  <!-- /.card -->
</div>
</div>
<!-- /.row -->

</div><!-- /.container-fluid -->
</section>
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
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type="text/javascript">
  $(document).ready(function(){
        $.ajax({
        url: "data.php",
        method: "GET",
        success: function(data){
        console.log(data);
        var Income_Category = [];
        var Amount = [];

        for (var i in data){
        Income_Category.push(data[i].Income_Category);

        Amount.push(data[i].Amount);
      }
      var chartdata = {
      labels: Income_Category,
      datasets: [{
      label: 'Student Marks',
      backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
      hoverBackgroundColor: 'rgba(230, 236, 235, 0.75)',
      hoverBorderColor: 'rgba(230, 236, 235, 0.75)',
      data: Amount

    }]
  };
  var graphTarget = $("#graphCanvas");
  var barGraph = new Chart(graphTarget, {
  type: 'pie',
  data: chartdata,

});
},
error: function(data) {
console.log(data);
}

});
});


</script>
</body>
</html>
