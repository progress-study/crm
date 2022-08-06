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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $asset_url; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo $asset_url; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <style type="text/css">
    .dropdown-menu-lg {
      max-width: 550px !important;
      min-width: 450px !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/messages" title="Messages" target="_blank">
          <i class="far fa-comments" aria-hidden="true"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#" title="Notifications" onclick="markasread();">
         <i class="far fa-bell"></i>
         <?php
           if($notifnum != "0") {
         ?>
         <span class="badge badge-warning navbar-badge" id="notifnum"><?php echo $notifnum; ?></span>
         <?php
           }
         ?>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <?php
           foreach ($notif as $row) {
             if ($row->seen == "0") {
           ?>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item"> 
                 <small><b><?php echo $row->details; ?></b></small>
                 <span class="float-right text-muted text-sm"><b><?php echo $row->date_created; ?></b></span>
               </a>
         <?php
             } else {
               ?>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item"> 
                 <small><?php echo $row->details; ?></small>
                 <span class="float-right text-muted text-sm"><?php echo $row->date_created; ?></span>
               </a>
               <?php
             }
           }
         ?>
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
      <!-- Sidebar user (optional) -->
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
            <a href="<?php echo base_url().'index.php/dashboard'; ?>" class="nav-link<?php if($title == 'Dashboard'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/customerinfo'; ?>" class="nav-link<?php if($title == 'Client Information'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Client Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/inquiries'; ?>" class="nav-link<?php if($title == 'Inquiries'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inquiries
              </p>
            </a>
          </li>
          <?php
  if ($privilege_manage_providers == "1") {
?>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/schools'; ?>" class="nav-link<?php if($title == 'Schools and Programs'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Schools and Programs
              </p>
            </a>
          </li>
          <?php
  }
?>
          <?php
  if ($privilege_manage_studentapps == "1") {
?>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/applications'; ?>" class="nav-link<?php if($title == 'Applications'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Applications
              </p>
            </a>
          </li>
          <?php
  }
?>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/adminmaintenance'; ?>" class="nav-link<?php if($title == 'Admin Maintenance'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin Maintenance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/scholarships'; ?>" class="nav-link<?php if($title == 'Scholarships'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Scholarships
              </p>
            </a>
          </li>
          <?php
  if ($privilege_manage_reporting == "1") {
?>
          <li class="nav-item">
            <a href="<?php echo base_url().'index.php/reports'; ?>" class="nav-link<?php if($title == 'Reports'){ echo ' active';} ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <?php
  }
?>
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
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                      foreach ($education_provider as $row) {
                ?>
                  <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
                <form action="<?php echo base_url().'index.php/updateschool'; ?>" method="post">
                  <input type="hidden" name="provider_id" value="<?php echo $row->provider_id; ?>">
                  <div class="mb-3">
                    <label for="amount" class="form-label">School Name</label>
                    <textarea class="form-control" name="schoolname" placeholder="School Name" required><?php echo $row->provider_name; ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Marketing Contact Name</label>
                    <input type="text" class="form-control" name="marketingname" placeholder="Marketing Contact Name" value="<?php echo $row->provider_marketing_contact_name; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Marketing Contact Phone Number</label>
                    <input type="text" class="form-control" name="marketingphone" placeholder="Marketing Contact Phone Number" value="<?php echo $row->provider_marketing_contact_phoneno; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Marketing Contact Mobile Number</label>
                    <input type="text" class="form-control" name="marketingmobile" placeholder="Marketing Contact Mobile Number" value="<?php echo $row->provider_marketing_mobileno; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Admin Contact Name</label>
                    <input type="text" class="form-control" name="adminname" placeholder="Admin Contact Name" value="<?php echo $row->provider_admin_contact_name; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Admin Contact Phone Number</label>
                    <input type="text" class="form-control" name="adminphone" placeholder="Admin Contact Phone Number" value="<?php echo $row->provider_admin_contact_phoneno; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance Contact Name</label>
                    <input type="text" class="form-control" name="financename" placeholder="Finance Contact Name" value="<?php echo $row->provider_finance_contact_name; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance Contact Phone Number</label>
                    <input type="text" class="form-control" name="financephone" placeholder="Finance Contact Phone Number" value="<?php echo $row->provider_finance_contact_phoneno; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Fax No.</label>
                    <input type="text" class="form-control" name="faxno" placeholder="Fax No." value="<?php echo $row->provider_faxno; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Mailing Address</label>
                    <input type="text" class="form-control" name="mailingaddress" placeholder="Mailing Address" value="<?php echo $row->provider_mailing_address; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Suburb</label>
                    <input type="text" class="form-control" name="suburb" placeholder="Suburb" value="<?php echo $row->provider_suburb; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">State</label>
                    <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $row->provider_state; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo $row->provider_postcode; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance Mailing Address 1</label>
                    <input type="text" class="form-control" name="financemailing1" placeholder="Finance Mailing Address 1" value="<?php echo $row->provider_finance_mailing_address1; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance Mailing Address 2</label>
                    <input type="text" class="form-control" name="financemailing2" placeholder="Finance Mailing Address 2" value="<?php echo $row->provider_finance_mailing_address2; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance Suburb</label>
                    <input type="text" class="form-control" name="financesuburb" placeholder="Finance Suburb" value="<?php echo $row->provider_finance_suburb1; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance State</label>
                    <input type="text" class="form-control" name="financestate" placeholder="Finance State" value="<?php echo $row->provider_finance_state1; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Finance Postcode</label>
                    <input type="text" class="form-control" name="financepostcode" placeholder="Finance Postcode" value="<?php echo $row->provider_finance_postcode1; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" placeholder="Notes" required><?php echo $row->provider_notes; ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                      }
                    ?>
            </div>
            <!-- /.card-body -->
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
<!-- bs-custom-file-input -->
<script src="<?php echo $asset_url; ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $asset_url; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $asset_url; ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo $asset_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $asset_url; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#studentapplicationtable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#visaapplicationtable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#visaeoitable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#visaaccounttable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#scholarshipallocationtable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#paymentstable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

  });

  $('.select2').select2();

</script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});

function markasread() {
      var baseurl10 = document.getElementById("baseurl").value;
      $.ajax({
          type: "GET",
          url: baseurl10 + "index.php/markasread",
          success: function(data) {
              document.getElementById("notifnum").remove();
          },
          error: function(error) {
            console.log(error);
          }
      });
  }
</script>
</body>
</html>