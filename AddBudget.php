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
  <title>SETS | Add Budget</title>

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
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Budget</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="SETSHome.php">Home</a></li>
              <li class="breadcrumb-item active">Add Budget</li>
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
                <h3 class="card-title">Add Budget</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="AddBudget" action="InsertBudget.php" method="post">
                <input type='hidden' name='User_Id' value='<?php echo $User_Id; ?>'>
                  <input type='hidden' name='First_Name' value='<?php echo $First_Name; ?>'>
                  <input type='hidden' name='Last_Name' value='<?php echo $Last_Name; ?>'>
                <div class="card-body">
                      
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Budget Category Type</label>
                        <select class="form-control" name="BudgetCat_Type" id="BudgetCat_Type">
                          <option value="" selected="selected" disabled>-- Select --</option>
                          <?php    

                          $queryNews= "SELECT DISTINCT ExpenseCategory_Type FROM expense_category where User_Id='$User_Id' ORDER BY ExpenseCat_Id ASC"; 
                          $resultNews = mysqli_query($conn, $queryNews);


                          while($row = mysqli_fetch_assoc($resultNews)){  
                            echo '<option value="'.$row['ExpenseCategory_Type'].'">'.$row['ExpenseCategory_Type'].'</option>'; 
                            
                          } 
                          ?>
                        </select>
                      </div>
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Budget Item</label>
                        <select class="form-control" name="Budget_Item" id="Budget_Item">
                          <option value="" selected="selected">-- Select --</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                         <label for="Saving">Amount</label>
                           <input type="text" name="Amount" class="form-control" id="Amount" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">
                      </div>
                      <div class="form-group">
                         <label for="Date">Date</label>
                           <input type="date" name="Date" class="form-control" id="Date" placeholder="Select Date">
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
      $(document).ready(function(){
        $(document).on('change', '#BudgetCat_Type', function(){
           var ExpenseCategory_Type = $(this).val();
            console.log(ExpenseCategory_Type);
            if(ExpenseCategory_Type.length != 0){
                $.ajax({
                    type: 'POST',
                    url: 'get_ExpenseCat.php',
                    cache: 'false',
                    data: {ExpenseCategory_Type:ExpenseCategory_Type},
                    success: function(data){
                        $('#Budget_Item').html(data);
                    },

                    error: function(jqXHR, textStatus, errorThrown){
                        // error
                    }
                });
            }else{
                $('#Budget_Item').html('<option value=""> -- SELECT -- </option>');
            }
        });
    });

  $(function () {
    // Summernote
    $('#summernote').summernote()


  })
  $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()


  });


</script>
</body>
</html>
