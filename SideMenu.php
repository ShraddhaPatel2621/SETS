  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SETS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">SmartSave</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            <a href="SETSHome.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
<!--                <i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
<!-- income Category           -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Income Category
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddIncomeCategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Income Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewIncomeCategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Income Category</p>
                </a>
				</li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Income
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddIncome.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewIncome.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Income</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Expenses Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddExpenseCategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Expense Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewExpenseCategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Expense Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddExpense.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewExpense.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Expenses</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Ambitions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddAmbition.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Ambition</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewAmbition.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Ambition</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Budget
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddBudget.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Budget</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewBudget.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Budget</p>
                </a>
              </li>
            </ul>
          </li>
<li class="nav-header">Job Hours Details</li>
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Job Hours Count
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddJobHours.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Job Hours</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewJobHours.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Job Hours</p>
                </a>
              </li>
            </ul>
</li> 
<!--			Reports-->
		<li class="nav-header">Reports</li>
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                 Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="InVSExReport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income VS Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="BuVsExReport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Vs Expense</p>
                </a>
              </li>
			<!-- <li class="nav-item">
                <a href="BudgetReport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Report</p>
                </a>
              </li> -->
            </ul>
          </li>
         <!-- <li class="nav-item">
            <a href="ViewBlogU.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                View Blog
              </p>
            </a>
          </li>  -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>