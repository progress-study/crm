<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo $asset_url; ?>images/logo.png"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" type="text/css" href="<?php echo $asset_url; ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" type="text/css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/messages" title="Messages">
          <i class="far fa-comments" aria-hidden="true"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/signout">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <center><img src="<?php echo $asset_url; ?>images/logomainwhite.png" alt="PSC Logo" width="140px"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $asset_url; ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->officer_name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link<?php if($title == 'Dashboard'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customerinfo" class="nav-link<?php if($title == 'Client Information'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Client Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="inquiries" class="nav-link<?php if($title == 'Inquiries'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inquiries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="schools" class="nav-link<?php if($title == 'Schools and Programs'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Schools and Programs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="applications" class="nav-link<?php if($title == 'Applications'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Applications
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adminmaintenance" class="nav-link<?php if($title == 'Admin Maintenance'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin Maintenance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="scholarships" class="nav-link<?php if($title == 'Scholarships'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Scholarships
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reports" class="nav-link<?php if($title == 'Reports'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h4 class="m-0 text-dark">Student Application Report</h4>
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Student Application Status</div>
              <div class="card-body">
                <form action="student_application_report" method="post">
                  <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required="">
                      <option value="" selected="">Status</option>
                      <option value="Discontinue">Discontinue</option>
                      <option value="WIP">WIP</option>
                      <option value="Completed">Completed</option>
                      <option value="Visa Refused">Visa Refused</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Outstanding Commision</div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Invoices To-Do</div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Commission Received</div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Course Completed</div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Course Started</div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <h4 class="m-0 text-dark">Visa Application Report</h4>
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Visa Application Status</div>
              <div class="card-body">
                <form action="visa_application_report" method="post">
                  <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required="">
                        <option value="">Please Select Status</option>
                        <option value="Discontinue">Discontinue</option>
                        <option value="WIP">WIP</option>
                        <option value="Completed">Completed</option>
                        <option value="Visa Refused">Visa Refused</option>
                        <option value="Submitted">Submitted</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Visa EOI</div>
              <div class="card-body">
                <form action="visa_eoi" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <select name="status" id="status" class="form-control" required="">
                        <option value="">Please Select Flag</option>
                        <option value="All">All</option>
                        <option value="Expired">Expired</option>
                        <option value="Discontinued">Discontinued</option>
                        <option value="Invited">Invited</option>
                        <option value="Created">Created</option>
                        <option value="Submitted">Submitted</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
              <div class="card-header">Visa Accounts</div>
              <div class="card-body">
                <form action="visa_account" method="post">
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date From</label>
                    <input type="date" name="datefrom" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="clientvisaid" class="form-label">Date To</label>
                    <input type="date" name="dateto" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
            <!-- /.card -->
    </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>@2022 Progress Study Consultancy CRM.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $asset_url; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $asset_url; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $asset_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $asset_url; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $asset_url; ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $asset_url; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $asset_url; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $asset_url; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $asset_url; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $asset_url; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $asset_url; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $asset_url; ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $asset_url; ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $asset_url; ?>dist/js/demo.js"></script>
</body>
</html>
