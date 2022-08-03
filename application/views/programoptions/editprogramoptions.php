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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style type="text/css">
    .select2-container .select2-selection--single{
        height:34px !important;
    }
    .select2-container--default .select2-selection--single{
             border: 1px solid #ccc !important; 
         border-radius: 0px !important; 
    }

    .select3-container .select3-selection--single{
        height:34px !important;
    }
    .select3-container--default .select3-selection--single{
             border: 1px solid #ccc !important; 
         border-radius: 0px !important; 
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
              
              <form action="<?php echo base_url(); ?>index.php/updateprogramoptions" method="post">
                <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
                <input type="hidden" name="poid" value="<?php echo $poid; ?>">
                <?php
                    foreach ($programoptions as $row) {
                ?>
                <div class="mb-3">
                  <input type="hidden" name="client_id" value="<?php echo $row->client_id; ?>">
                  <label for="client" class="form-label">School</label>
                  <select class="form-control select2" name="provider_id" id="provider" onchange="getPrograms()" required>
                    <option value="<?php echo $row->provider_id; ?>"><?php echo $row->provider_name; ?></option>
                    <?php
                    foreach ($schools as $row2) {
                      echo "<option value='".$row2->provider_id."'>".$row2->provider_name."</option>";
                    }
                    ?>
                  </select> 
                </div>
                <div class="mb-3">
                  <label for="program" class="form-label">Program</label>
                  <select class="form-control select2" name="sp_id" id="programlist" required>
                    <option value="<?php echo $row->sp_id; ?>"><?php echo $row->program; ?></option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="payee" class="form-label">Indicative Annual Cost</label>
                  <input type="text" class="form-control" name="indicativeannualcost" value="<?php echo $row->indicativeannualcost; ?>" placeholder="Indicative Annual Cost" required>
                </div>
                <div class="mb-3">
                  <label for="payee" class="form-label">Duration</label>
                  <input type="text" class="form-control" name="duration" value="<?php echo $row->duration; ?>" placeholder="Duration" required>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Location</label>
                  <input type="text" class="form-control" name="location" value="<?php echo $row->location; ?>" placeholder="Location" required>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">English Requirement</label>
                  <input type="text" class="form-control" name="englishrequirement" value="<?php echo $row->englishrequirement; ?>" placeholder="English Requirement" required>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Intake</label>
                  <input type="text" class="form-control" name="intake" value="<?php echo $row->intake; ?>" placeholder="Intake" required>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Important To Consider</label>
                  <input type="text" class="form-control" name="importanttoconsider" value="<?php echo $row->importanttoconsider; ?>" placeholder="Important To Consider" required>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Outcome</label>
                  <input type="text" class="form-control" name="migrationpathway" value="<?php echo $row->migrationpathway; ?>" placeholder="Outcome" required>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Others</label>
                  <input type="text" class="form-control" name="others" placeholder="Others" value="<?php echo $row->others; ?>" required>
                </div>
                <?php
                    }
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
                <h3>Expenses Details</h3>
                <a href="<?php echo base_url(); ?>index.php/newprogramoptiondetails/<?php echo $poid; ?>">Add New Program Option Details</a>
                      <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Expenses Type</th>
                          <th>Per Person</th>
                          <th>Amount Required</th>
                          <th>Number of Family</th>
                          <th>Amount to Access</th>
                          <th>Confirm Access to Funds</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        foreach ($programoptionsdetails as $row) {
                          echo "<tr>
                            <td>".$row->expensestype."</td>
                            <td>".$row->perperson."</td>
                            <td>".$row->amountrequired."</td>
                            <td>".$row->numberoffamily."</td>
                            <td>".$row->amounttoaccess."</td>
                            <td>".$row->confirmaccesstofunds."</td>
                            <td><a href='".base_url()."index.php/editprogramoptiondetails/".$row->podid."' class='btn btn-primary btn-xs'>Edit</a></td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Expenses Type</th>
                          <th>Per Person</th>
                          <th>Amount Required</th>
                          <th>Number of Family</th>
                          <th>Amount to Access</th>
                          <th>Confirm Access to Funds</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>

              </form>

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

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
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
  $('.select2').select2();
</script>

<script>

  var baseurl = document.getElementById("baseurl").value;

  initialPrograms();
  function initialPrograms() {
    $("#programlist").empty();
    $.ajax({
          type: "GET",
          url: baseurl + "index.php/getprogramfromschool/1",
          success: function(data) {
              var obj = JSON.parse(data);
              //alert(obj[0].program);
              for(var i = 0; i < obj.length; i++) {
                $("#programlist").append("<option value=" + obj[i].spid + ">" + obj[i].program + "</option>");
              }
          },
          error: function(error) {
            alert("Error!");
          }
      });
  }

  function getPrograms() {
    var id = document.getElementById("provider").value;
    $("#programlist").empty();
    $.ajax({
          type: "GET",
          url: baseurl + "index.php/getprogramfromschool/" + id,
          success: function(data) {
              var obj = JSON.parse(data);
              //alert(obj[0].program);
              for(var i = 0; i < obj.length; i++) {
                $("#programlist").append("<option value=" + obj[i].spid + ">" + obj[i].program + "</option>");
              }
          },
          error: function(error) {
            alert("Error!");
          }
      });
  }
  
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
