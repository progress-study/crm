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
  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $asset_url; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo $asset_url; ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
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
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <center><img src="<?php echo $asset_url; ?>images/logo.png" alt="PSC Logo" width="40px">&nbsp;&nbsp;<span class="brand-text font-weight-light">CRM</span></center>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $asset_url; ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Kim Ramirez</a>
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
            <a href="requireddocuments" class="nav-link<?php if($title == 'Required Documents'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Required Documents
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="payments" class="nav-link<?php if($title == 'Payments'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Payments
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
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
    
          <div class="card">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="officer1-tab" data-toggle="tab" href="#officer1" role="tab" aria-controls="officer1" aria-selected="true">Officers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="officerassignment-tab" data-toggle="tab" href="#officerassignment" role="tab" aria-controls="officerassignment" aria-selected="false">Officer Assignment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="region1-tab" data-toggle="tab" href="#region1" role="tab" aria-controls="region1" aria-selected="false">Region</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="events-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false">Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="priviledges-tab" data-toggle="tab" href="#priviledges" role="tab" aria-controls="priviledges" aria-selected="false">Priviledges</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="emailcontent-tab" data-toggle="tab" href="#emailcontent" role="tab" aria-controls="emailcontent" aria-selected="false">Email Contents</a>
                  </li>
                </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="officer1" role="tabpanel" aria-labelledby="officer1-tab">
                  <div class="card-header">
                    <h3 class="card-title"><a href="newofficer">Add New Officer</a></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="officer" class="table table-bordered table-striped officer1">
                      <thead>
                      <tr>
                        <th>Officer Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach ($officer as $row) {
                        echo "<tr>
                          <td>".$row->officer_name."</td>
                          <td>".$row->email."</td>
                          <td>".$row->officer_role."</td>
                          <td>".$row->officer_status."</td>
                          <td>".$row->officer_last_logged_date."</td>
                          <td><a href='editofficer/".$row->officer_id."' class='btn btn-primary btn-xs'>Edit</a></td>
                        </tr>";
                      }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Officer Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th></th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="officerassignment" role="tabpanel" aria-labelledby="officerassignment-tab">
                  <div class="card-header">
                    <h3 class="card-title"><a href="newassignment">Add New Region Assignment</a></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="assignment" class="table table-bordered table-striped officerassignment">
                      <thead>
                      <tr>
                        <th>Officer Name</th>
                        <th>Region</th>
                        <th>Date Created</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach ($officerassignment as $row) {
                        echo "<tr>
                          <td>".$row->officer_name."</td>
                          <td>".$row->region_name."</td>
                          <td>".$row->datecreated."</td>
                          <td><a href='editofficer/".$row->oaid."' class='btn btn-danger btn-xs'>Deactivate</a></td>
                        </tr>";
                      }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Officer Name</th>
                        <th>Region</th>
                        <th>Date Created</th>
                        <th></th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="region1" role="tabpanel" aria-labelledby="region1-tab">
                  <div class="card-header">
                    <h3 class="card-title"><a href="newregion">Add Region</a></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="region" class="table table-bordered table-striped region1">
                      <thead>
                      <tr>
                        <th>Region</th>
                        <th>Region Description</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach ($region as $row2) {
                        echo "<tr>
                          <td>".$row2->region_name."</td>
                          <td>".$row2->region_description."</td>
                          <td><a href='editregion/".$row2->region_id."' class='btn btn-primary btn-xs'>Edit</a></td>
                        </tr>";
                      }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Region</th>
                        <th>Region Description</th>
                        <th></th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="emailcontent" role="tabpanel" aria-labelledby="emailcontent-tab">
                  <div class="card-body">
                     <?php
                      foreach ($emailcontents as $row6) {
                      ?>
                    <form action="saveemailcontent" method="post">
                      <h5>Inquiry Auto Response Email</h5>
                      <div class="mb-3">
                        <label for="iaremailheader" class="form-label">Email header</label>
                        <textarea class="form-control" name="iaremailheader" placeholder="Email header" required><?php echo $row6->iaremailheader; ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="iaremailbody" class="form-label">Email body</label>
                        <textarea class="form-control" name="iaremailbody" placeholder="Email body" required><?php echo $row6->iaremailbody; ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="iaremailfooter" class="form-label">Email footer</label>
                        <textarea class="form-control" name="iaremailfooter" placeholder="Email footer" required><?php echo $row6->iaremailfooter; ?></textarea>
                      </div>
                      <h5>Marketing Email</h5>
                      <div class="mb-3">
                        <label for="memailheader" class="form-label">Email header</label>
                        <textarea class="form-control" name="memailheader" placeholder="Email header" required><?php echo $row6->memailheader; ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="memailbody" class="form-label">Email body</label>
                        <textarea class="form-control" name="memailbody" placeholder="Email body" required><?php echo $row6->memailbody; ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="memailfooter" class="form-label">Email footer</label>
                        <textarea class="form-control" name="memailfooter" placeholder="Email footer" required><?php echo $row6->memailfooter; ?></textarea>
                      </div>
                      <h5>Reminder Email</h5>
                      <div class="mb-3">
                        <label for="memailheader" class="form-label">Email header</label>
                        <textarea class="form-control" name="remailheader" placeholder="Email header" required><?php echo $row6->remailheader; ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="memailbody" class="form-label">Email body</label>
                        <textarea class="form-control" name="remailbody" placeholder="Email body" required><?php echo $row6->remailbody; ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="memailfooter" class="form-label">Email footer</label>
                        <textarea class="form-control" name="remailfooter" placeholder="Email footer" required><?php echo $row6->remailfooter; ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                      }
                      ?>
                  </div>
                  <!-- /.card-body -->
              </div>
            </div>
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- Bootstrap 4 -->
<script src="<?php echo $asset_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $asset_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $asset_url; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $asset_url; ?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#officer").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#assignment").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#region").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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
