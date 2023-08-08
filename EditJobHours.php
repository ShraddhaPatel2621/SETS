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
  <title>SETS | Edit Job Hours Details</title>

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

<?php



$JobHours_Id = $_POST['JobHours_Id'];

$query = "SELECT * FROM JobHours WHERE JobHours_Id = $JobHours_Id" ;

// mysqli_query($conn, "set names utf8");

$result = mysqli_query($conn, $query);

// $no = mysqli_num_rows($result);

// if($no == 0)  

// {

  

//   $url='/managenews.php';

//     echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';

  

// }

$row = mysqli_fetch_assoc($result);



$JobHours_Id = $row['JobHours_Id'];
$Company_Name = $row['Company_Name'];
$startTime = $row['startTime'];
$startTime1 = date( 'mm-dd-YY H:i:s', $startTime );
$endTime = $row['endTime'];
$endTime1 = date( 'mm-dd-YY H:i:s', $endTime );
$totalHour = $row['totalHour'];
$Description = $row['Description'];







?>
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Job Hours</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="SETSHome.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Job Hours</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
		
      <div class="container-fluid">
        <div class="row">
		 <!-- left column -->
          <div class="col-md-3">

          </div>
          <!--/.col (left) -->
          <!-- center column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Job Hours</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="UpdateJobHours" action="UpdateJobHours.php" method="post" enctype="multipart/form-data">
                <input type='hidden' name='JobHours_Id' value='<?php echo $JobHours_Id ?>'>
                <input type='hidden' name='User_Id' value='<?php echo $User_Id; ?>'>
                <input type='hidden' name='First_Name' value='<?php echo $First_Name; ?>'>
                <input type='hidden' name='Last_Name' value='<?php echo $Last_Name; ?>'>
                <div class="card-body">
                      <div class="form-group">
                        <label for="CompanyName">Enter Company Name</label>
                          <input type="text" name="Company_Name" class="form-control" id="Company_Name" placeholder="Enter Company_Name" value='<?php echo $Company_Name; ?>'>
                      </div>
                      <div class="form-group">
                         <label for="Date">Start Date Time</label>
                           <input type="datetime-local" name="startTime" class="form-control" id="startTime" placeholder="Select Start DateTime" value='<?php echo $startTime1; ?>'>
                      </div>
                      <div class="form-group">
                         <label for="datetime">End Date Time</label>
                           <input type="datetime-local" name="endTime" class="form-control" id="endTime" placeholder="Select End Date Time" value='<?php echo $endTime1; ?>'>
                      </div>
                      <div class="form-group">
                        <label for="Hours">Total Hours</label>
                          <input type="text" name="totalHour" class="form-control" id="totalHour" value='<?php echo $totalHour; ?>'>
                      </div>
                      
                      <!-- Summernote -->
                      <label for="Date">Discription</label>
                      <div class="card card-outline card-info">
<!--                         <div class="card-header">
                          <h3 class="card-title">Description</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                          <textarea id="summernote"><?php echo $Description; ?></textarea>
                        </div>
                      </div> 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">            
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>                       
              </form>             
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (center) -->
          <!-- right column -->
          <div class="col-md-3">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script src="dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()


  })

  
</script>
</body>
</html>
