<?php
require("..//DB/dbconn.php");
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user'] == 'Admin'){

?>

</head>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SETS !! Admin Home Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="..//plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="..//https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="..//plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="..//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="..//plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="..//dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="..//plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="..//plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="..//plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="..//dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
<!--navbar start-->
<?php
     include_once('..//NavBar.php');

?>
	<!--navbar end-->

<!--Sidemenu Start-->
<?php
     include_once('AdminSideMenu.php');

?>
<!--	sidemenu End-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 800.667px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin Home</a></li>
              <li class="breadcrumb-item active">View Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
<?php

require("../DB/dbconn.php");

$query = "SELECT * FROM signup order by SignUp_Id DESC";

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

?>
          
             <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?php echo $row['First_Name']." ".$row['Last_Name'] ;?></h3>
                
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?php echo $row['Image'];?>" alt="User Avatar">
              </div>
              <div class="card-footer">
                <center><div class="row">
                 <div class="col-sm-4">
                      <b>Email:</b>
                  </div>
                  <div class="col-sm-8">
                      <?php echo $row['User_Name'];?>
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                 <div class="col-sm-4">
                      <p><b>Mobile:</b></p>
                  </div>
                  <div class="col-sm-8">
                      <p><?php echo $row['Mobile_No'];?></p>
                  </div>
                </div></center>
                <!-- /.row -->
                <center><div class="row">
                 <div class="col-sm-6" >
                      <form action='EditUser.php' Method='POST'><input type='hidden' name='SignUp_Id' value="<?php echo $row['SignUp_Id']?>">
                     <button type='submit' class='btn btn-success btn-sm' style="padding-left: 17px; padding-right: 17px;">Edit</button></form>
                  </div>
                  <div class="col-sm-6">
                      <center><form action='DeleteUser.php' Method='POST'><input type='hidden' name='SignUp_Id' value="<?php echo $row['SignUp_Id']?>">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Discount Details?')" class="btn btn-Warning btn-sm">Delete</button></form>
                  </div>
                </div></center>
                <!-- /.row -->
                
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
          <?php 
}
}
?>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
<!--  footer start-->
<?php
     include_once('..//Footer.php');
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
<script src="..//plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="..//plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="..//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="..//plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="..//plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="..//plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="..//plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="..//plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="..//plugins/moment/moment.min.js"></script>
<script src="..//plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="..//plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="..//plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="..//plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="..//dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="..//dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="..//dist/js/pages/dashboard.js"></script>
</body>
</html>
