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

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="<?php echo $asset_url; ?>google/firebase-app.js"></script>
  <script src="<?php echo $asset_url; ?>google/firebase-analytics.js"></script>
  <script src="<?php echo $asset_url; ?>google/firebase-firestore.js"></script>
  <script src="<?php echo $asset_url; ?>google/firebase-storage.js"></script>
  <script src="<?php echo $asset_url; ?>google/firebase-auth.js"></script>

  <script src="<?php echo $asset_url; ?>google/firebase-save.js" type="module"></script>

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
              
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <?php
                    if ($privilege_manage_clients == "1") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="clientinfo-tab" data-toggle="tab" href="#clientinfo" role="tab" aria-controls="clientinfo" aria-selected="true">Client Information</a>
                  </li>
                  <?php
                    }
                  ?>
                  <?php
                    if ($privilege_manage_studentdocs == "1") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
                  </li>
                  <?php
                    }
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="programoptions-tab" data-toggle="tab" href="#programoptions" role="tab" aria-controls="programoptions" aria-selected="false">Program Options</a>
                  </li>
                  <?php
                    if ($privilege_manage_studentapps == "1") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="studentapplication-tab" data-toggle="tab" href="#studentapplication" role="tab" aria-controls="studentapplication" aria-selected="false">Student Application</a>
                  </li>
                  <?php
                    }
                  ?>
                  <?php
                    if ($privilege_manage_prapps == "1" && $privilege_manage_prdocs == "1") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="visaapplication-tab" data-toggle="tab" href="#visaapplication" role="tab" aria-controls="visaapplication" aria-selected="false">Visa Applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="visaeoi-tab" data-toggle="tab" href="#visaeoi" role="tab" aria-controls="visaeoi" aria-selected="false">Visa EOI</a>
                  </li>
                  <?php
                    }
                  ?>
                  <?php
                    if ($privilege_manage_prfeereceived == "1" && $privilege_manage_prfeepaid == "1") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="visaaccount-tab" data-toggle="tab" href="#visaaccount" role="tab" aria-controls="visaaccount" aria-selected="false">Visa Accounts</a>
                  </li>
                  <?php
                    }
                  ?>
                  <?php
                    if ($privilege_manage_studentapps == "1") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link customerinfotabs" id="scholarshipallocation-tab" data-toggle="tab" href="#scholarshipallocation" role="tab" aria-controls="scholarshipallocation" aria-selected="false">Scholarship Allocation</a>
                  </li>
                  <?php
                    }
                  ?>
                  <!--<li class="nav-item">
                    <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="payments" aria-selected="false">Payments</a>
                  </li>-->
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="clientinfo" role="tabpanel" aria-labelledby="clientinfo-tab">
                <br>
                <form action="<?php echo base_url().'index.php/customerinfocontroller/do_upload' ?>" method="post"  onsubmit="validateData(event);" enctype="multipart/form-data">
                <?php 
                    if(isset($error)) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php
                          }
                      ?>
                <?php
                  foreach($client as $row1) {
                    $dob = $row1->client_dob_year."-".$row1->client_dob_month."-".$row1->client_dob_day;
                    $ve = $row1->client_ve_year."-".$row1->client_ve_month."-".$row1->client_ve_day;
                ?>

                <div class="row">
                  <div class="col-6">
                    <a href="<?php echo base_url().'index.php/customerinfo' ?>"><i class="nav-icon fas fa-chevron-left"></i> Back</a>
                  </div>
                  <div class="col-3">
                    <label for="amount" class="form-label">Update Photo:</label> <a class='btn btn-primary btn-xs' href="<?php echo base_url(); ?>index.php/resetphoto/<?php echo $row1->client_id; ?>">Reset Photo</a>
                        <input type="file" class="form-control" name="userfile" id="userfile">
                        <small style="color: red;">Photo must be at maximum size of<br> 200px X 200px</small>
                  </div>
                  <div class="col-3">
                    <!--<img src="<?php echo $asset_url; ?>images/<?php echo $row1->client_photo; ?>" style="width: 150px; height: 150px;">-->
                    <img src="<?php echo $asset_url; ?>images/<?php echo $row1->client_photo; ?>" alt="" class="img-circle img-fluid">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                      <div class="mb-3">
                        <label for="amount" class="form-label">Client ID</label>
                        <input type="text" class="form-control" name="clientid" value="<?php echo $row1->client_id; ?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $row1->client_firstname; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Surname</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $row1->client_surname; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" value="<?php echo $row1->client_middlename; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="payee" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?php echo $dob; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="payee" class="form-label">Visa Expiry Date</label>
                        <input type="date" class="form-control" name="vedate" id="vedate" value="<?php echo $ve; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="payee" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phoneno" value="<?php echo $row1->client_phoneno; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" name="mobileno" value="<?php echo $row1->client_mobileno; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Overseas Mobile Number</label>
                        <input type="text" class="form-control" name="Overseasmobileno" value="<?php echo $row1->client_overseas_mobileno; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row1->client_email; ?>">
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="mb-3">
                        <label for="amount" class="form-label">Client Address</label>
                        <input type="text" class="form-control" name="clientaddress" value="<?php echo $row1->client_address; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Suburb</label>
                        <input type="text" class="form-control" name="suburb" value="<?php echo $row1->client_suburb; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" value="<?php echo $row1->client_state; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Postcode</label>
                        <input type="text" class="form-control" name="postcode" value="<?php echo $row1->client_postcode; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Overseas Address</label>
                        <input type="text" class="form-control" name="overseasaddress" value="<?php echo $row1->client_overseas_address; ?>">
                      </div> 
                      <div class="mb-3">
                        <label for="amount" class="form-label">Comments</label>
                        <input type="text" class="form-control" name="comment" value="<?php echo $row1->client_comments; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Qualifications</label>
                        <input type="text" class="form-control" name="qualification" value="<?php echo $row1->client_qualifications; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Attended Event</label>
                        <div class="row">
                          <div class="col-6">
                            <?php
                                $eventname = "";
                                $this->db->where('event_id', $row1->client_event_id);
                                $eventquery = $this->db->get('events');
                                foreach ($eventquery->result() as $eventrow)
                                {
                                  $eventname = $eventrow->event_name;
                                }
                            ?>
                            <input type="text" class="form-control" name="event" value="<?php echo $eventname; ?>" readonly>
                          </div>
                          <div class="col-6">
                            <select class="form-control" name="selectevent">
                              <option value="">Select Event</option>
                              <?php
                                foreach($events as $row2) {
                              ?>
                                <option value="<?php echo $row2->event_id; ?>"><?php echo $row2->event_name; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div> 
                      <div class="mb-3">
                        <label for="amount" class="form-label">Administering Office</label>
                        <div class="row">
                          <div class="col-6">
                            <?php
                                $officescode = "";
                                $this->db->where('offices_id', $row1->client_office_id);
                                $officequery = $this->db->get('offices');
                                foreach ($officequery->result() as $officerow)
                                {
                                  $officescode = $officerow->offices_code;
                                }
                            ?>
                            <input type="text" class="form-control" name="office" value="<?php echo $officescode; ?>" readonly>
                          </div>
                          <div class="col-6">
                            <select class="form-control" name="selectoffice">
                              <option value="">Select Office</option>
                              <?php
                                foreach($offices as $row2) {
                              ?>
                                <option value="<?php echo $row2->offices_id; ?>"><?php echo $row2->offices_code; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div> 
                      <div class="mb-3">
                        <label for="amount" class="form-label">Client Status</label>
                        <div class="row">
                          <div class="col-6">
                            <input type="text" class="form-control" name="flag" value="<?php echo $row1->client_flag; ?>" readonly>
                          </div>
                          <div class="col-6">
                            <select class="form-control" name="selectflag">
                              <option value="">Select Flag</option>
                              <option value="active">active</option>
                              <option value="inactive">inactive</option>
                            </select>
                          </div>
                        </div>
                      </div>    
                  </div>
                      
                  </div>
                  <?php
                    }
                  ?>

                <button type="submit" class="btn btn-primary" id="clientinfosubmit">Submit</button> 
              </form>

                  </div>

                  <div class="tab-pane fade" id="studentapplication" role="tabpanel" aria-labelledby="studentapplication-tab" style="overflow-x: scroll;">
                    <br>
                    <a href="<?php echo base_url(); ?>index.php/newapplication/<?php echo $client_id; ?>" class="btn btn-primary" target="_blank">New Application</a>
                    <br><br>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Student</th>
                        <th>School</th>
                        <th>Program</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach ($student_application as $row) {
                        echo "<tr>
                                <td>".$row->client_surname.", ".$row->client_firstname."</td>
                                <td>".$row->provider_name."</td>
                                <td>".$row->studentapp_course_name."</td>
                                <td>".$row->studentapp_record_created_date."</td>
                                <td><a href='".base_url()."index.php/editapplication/".$row->studentapp_id."' class='btn btn-primary btn-xs'>Edit</a>  <a href='".base_url()."index.php/deleteapplicationfromcinfo/".$row->studentapp_id."/".$row->client_id."' class='btn btn-danger btn-xs'>Delete</a></td>
                              </tr>";
                      }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Student</th>
                        <th>School</th>
                        <th>Program</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  
                  <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                      <br>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#documentModal">Upload New Document</button> <button type="button" class="btn btn-danger" id="deletedocumentfile">Delete Document</button>
                      <input type="hidden" id="client_id2" value="<?php echo $client_id; ?>">
                      <input type="hidden" id="imageasseturl2" value="<?php echo $asset_url.'images/fileicon.png'; ?>"><br><br>
                      <!--<table id="documentstable" style="font-size: 14px;">
                        <thead>
                          <th style="width: 20%;">Document Type</th>
                          <th style="width: 60%;">Document File URL</th>
                          <th style="width: 20%;">Date Uploaded</th>
                        </thead>
                        <tbody id="documentstabletbody"></tbody>
                      </table>-->
                      <div id="documentrow1">
                        <!--
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>-->
                      </div>
                  </div>
                  
                  <div class="tab-pane fade" id="visaapplication" role="tabpanel" aria-labelledby="visaapplication-tab" style="overflow-x: scroll;">
                      <br>
                      <a href="<?php echo base_url(); ?>index.php/newvisaapplication/<?php echo $client_id; ?>" class="btn btn-primary" target="_blank">New Visa Application</a>
                      <br><br>
                      <table id="visaapplicationtable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Client</th>
                          <th>Visa Subclass</th>
                          <th>Critical Date</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($visa_application as $row) {
                          echo "<tr>
                            <td>".$row->client_surname.", ".$row->client_firstname."</td>
                            <td>".$row->new_Visa_subclass."</td>
                            <td>".$row->visa_critical_month."/".$row->visa_critical_day."/".$row->visa_critical_year."</td>
                            <td>".$row->status."</td>
                            <td><a href='".base_url()."index.php/editvisaapplication/".$row->client_visa_id."' class='btn btn-primary btn-xs'>Edit</a> <a href='".base_url()."index.php/newvisaaccount/".$row->client_visa_id."/".$client_id."' class='btn btn-primary btn-xs' target='_blank'>New Visa Account</a></td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Client</th>
                          <th>Visa Subclass</th>
                          <th>Critical Date</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="visaeoi" role="tabpanel" aria-labelledby="visaeoi-tab" style="overflow-x: scroll;">
                      <br>
                      <a href="<?php echo base_url(); ?>index.php/newvisaeoi/<?php echo $client_id; ?>" class="btn btn-primary" target="_blank">New Visa EOI</a>
                      <br><br>
                      <table id="visaeoitable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Client Name</th>
                          <th>EOI Number</th>
                          <th>Occupation</th>
                          <th>Created Date</th>
                          <th>Submitted Date</th>
                          <th>Skill Date</th>
                          <th>PY Date</th>
                          <th>English Test Date</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($eoi as $row) {
                          echo "<tr>
                            <td>".$row->client_surname.", ".$row->client_firstname."</td>
                            <td>".$row->eoi_number."</td>
                            <td>".$row->nominated_occupation."</td>
                            <td>".$row->eoi_created_date."</td>
                            <td>".$row->eoi_submitted_date."</td>
                            <td>".$row->skill_assessment_date."</td>
                            <td>".$row->py_completion_date."</td>
                            <td>".$row->english_competency_test_date."</td>
                            <td><a href='".base_url()."index.php/editvisaeoi/".$row->eoi_id."' class='btn btn-primary btn-xs'>Edit</a></td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Client Name</th>
                          <th>EOI Number</th>
                          <th>Occupation</th>
                          <th>Created Date</th>
                          <th>Submitted Date</th>
                          <th>Skill Date</th>
                          <th>PY Date</th>
                          <th>English Test Date</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="visaaccount" role="tabpanel" aria-labelledby="visaaccount-tab" style="overflow-x: scroll;">
                      <br>
                      <table id="visaaccounttable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Client Name</th>
                          <th>Visa Subclass</th>
                          <th>Balance</th>
                          <th>Description</th>
                          <th>Date Received</th>
                          <th>Received Amount ex GST</th>
                          <th>Received GST</th>
                          <th>Disbursement Date</th>
                          <th>Disbursed Amount ex GST</th>
                          <th>Disbursed GST</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($visa_accounts as $row) {
                          
                          $received_amount_ex_gst = (int) $row->received_amount_ex_gst;
                          $received_gst = (int) $row->received_gst;
                          $disbursed_amount_ex_gst = (int) $row->disbursed_amount_ex_gst;
                          $disbursed_gst = (int) $row->disbursed_gst;

                          $balance = ($received_amount_ex_gst - $received_gst) - ($disbursed_amount_ex_gst - $disbursed_gst);

                          echo "<tr>
                            <td>".$row->client_surname.", ".$row->client_firstname."</td>
                            <td>".$row->new_Visa_subclass."</td>
                            <td>".$balance."</td>
                            <td>".$row->description."</td>
                            <td>".$row->received_date."</td>
                            <td>".$row->received_amount_ex_gst."</td>
                            <td>".$row->received_gst."</td>
                            <td>".$row->disbursed_date."</td>
                            <td>".$row->disbursed_amount_ex_gst."</td>
                            <td>".$row->disbursed_gst."</td>
                            <td><a href='".base_url()."index.php/editvisaaccount/".$row->visa_account_id."/".$client_id."' class='btn btn-primary btn-xs'>Edit</a></td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Client Name</th>
                          <th>Visa Subclass</th>
                          <th>Balance</th>
                          <th>Description</th>
                          <th>Date Received</th>
                          <th>Received Amount ex GST</th>
                          <th>Received GST</th>
                          <th>Disbursement Date</th>
                          <th>Disbursed Amount ex GST</th>
                          <th>Disbursed GST</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="scholarshipallocation" role="tabpanel" aria-labelledby="scholarshipallocation-tab" style="overflow-x: scroll;">
                      <br>
                      <a href="<?php echo base_url(); ?>index.php/newscholarshipallocation/<?php echo $client_id; ?>" class="btn btn-primary" target="_blank">New Scholarship Allocation</a>
                      <br><br>
                      <table id="scholarshipallocationtable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Client</th>
                          <th>Scholarship</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($clientscholarship as $row) {
                          if($row->bactive == 1) {
                            $status = "Active";
                          } else {
                            $status = "Inactive";
                          }
                          echo "<tr>
                            <td>".$row->client_surname.", ".$row->client_firstname."</td>
                            <td>".$row->description."</td>
                            <td>".$status."</td>
                            <td><a href='deactivatescholarshipallocation/".$row->csid."' class='btn btn-primary btn-xs'>Deactivate</a></td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Client</th>
                          <th>Scholarship</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab" style="overflow-x: scroll;">
                      <br>
                      <a href="<?php echo base_url(); ?>index.php/newpayment/<?php echo $client_id; ?>" class="btn btn-primary">New Payment Entry</a>
                      <br><br>
                      <table id="paymentstable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Payment Type</th>
                          <th>Reference Number</th>
                          <th>Payee Name</th>
                          <th>Date of Payment</th>
                          <th>Processed by</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($payments as $row) {
                          echo "<tr>
                            <td>".$row->identity."</td>
                            <td>".$row->referencenumber."</td>
                            <td>".$row->client_surname.", ".$row->client_firstname."</td>
                            <td>".$row->paymentdate."</td>
                            <td>".$row->officer_name."</td>
                            <td><a href='archivepayment/".$row->paymentid."' class='btn btn-danger btn-xs'>Archive</a></td>
                          </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Payment Type</th>
                          <th>Reference Number</th>
                          <th>Payee Name</th>
                          <th>Date of Payment</th>
                          <th>Processed by</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="programoptions" role="tabpanel" aria-labelledby="programoptions-tab" style="overflow-x: scroll;">
                      <br>
                      <a href="<?php echo base_url(); ?>index.php/newprogramoption/<?php echo $client_id; ?>" class="btn btn-primary" target="_blank">New Program Option</a>
                      <br><br>
                      <table id="programoptionstable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>School</th>
                          <th>Program</th>
                          <th>Indicative Annual Cost</th>
                          <th>Duration</th>
                          <th>Location</th>
                          <th>English Requirement</th>
                          <th>Intake</th>
                          <th>Important to Consider</th>
                          <th>Outcome</th>
                          <th>PO Approval Link</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        foreach ($programoptions as $row) {
                          echo "<tr>
                            <td>".$row->provider_name."</td>
                            <td>".$row->program."</td>
                            <td>".$row->indicativeannualcost."</td>
                            <td>".$row->duration."</td>
                            <td>".$row->location."</td>
                            <td>".$row->englishrequirement."</td>
                            <td>".$row->intake."</td>
                            <td>".$row->importanttoconsider."</td>
                            <td>".$row->migrationpathway."</td>
                            <td><a href='".base_url()."index.php/programoptionform/".$row->poid."' target='_blank'>".base_url()."index.php/programoptionform/".$row->poid."</a></td>
                            <td><a href='".base_url()."index.php/editprogramoptions/".$row->poid."' class='btn btn-primary btn-xs'>Edit</a></td>
                          </tr>";
                        }
                        
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>School</th>
                          <th>Program</th>
                          <th>Indicative Annual Cost</th>
                          <th>Duration</th>
                          <th>Location</th>
                          <th>English Requirement</th>
                          <th>Intake</th>
                          <th>Important to Consider</th>
                          <th>Outcome</th>
                          <th>PO Approval Link</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                </div>

                

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
    <!-- Button trigger modal -->

    <!-- Add New Document Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload New Document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="documentForm">
              <input type="hidden" id="baseurl1" value="<?php echo base_url(); ?>">
              <div class="form-group">
                <label for="client_id1">Client ID</label>
                <input type="text" class="form-control" id="client_id1" value="<?php echo $client_id; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="documentype">Document Type</label>
                <select id="documentype" class="form-control">
                  <option>Select Document Type</option>
                  <option value="Student requirement">Student requirement</option>
                  <option value="Visa application requirement">Visa application requirement</option>
                  <option value="Sponsor requirement">Sponsor requirement</option>
                </select>
              </div>
              <div class="form-group">
                <label for="documenalias">Document Alias</label>
                <select id="documenalias" class="form-control">
                  <option>Select Alias</option>
                  <option value="Resume">Resume</option>
                  <option value="Passport">Passport</option>
                  <option value="English Test Result">English Test Result</option>
                  <option value="Current Australian Visa">Current Australian Visa</option>
                  <option value="Current OSHC Document">Current OSHC Document</option>
                  <option value="Birth Certificate">Birth Certificate</option>
                  <option value="Marriage Certificate">Marriage Certificate</option>
                  <option value="Overseas Academic Transcript">Overseas Academic Transcript</option>
                  <option value="Overseas Completion Letter">Overseas Completion Letter</option>
                  <option value="All Australian Academic Transcript">All Australian Academic Transcript</option>
                  <option value="All Australian Completion Letter">All Australian Completion Letter</option>
                  <option value="Confirmation of Enrolment">Confirmation of Enrolment</option>
                  <option value="Employment Certificate">Employment Certificate</option>
                  <option value="Salary">Salary</option>
                  <option value="Bank Certificate">Bank Certificate</option>
                  <option value="Statement of Purpose - GTER">Statement of Purpose - GTER</option>
                </select>
              </div>
              <div class="form-group">
                <label for="documentfile">Document File</label>
                <input type="file" class="form-control" id="documentfile">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="ResetFile()" class="btn btn-primary">Reset</button> <button type="button" id="savefiletofirebase" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

<!--
<option>Certified copies of all relevant academic transcripts, award and certificate from all
your complete or incomplete study.</option>
<option>IELTS result</option>
<option>Evidence of your work experience in the form of a current resume and statements
of employee which should be an official document from your employer
outlining your job title, responsibilities and duration of employment.</option>
<option>Passport/photograph of passport size</option>
<option>Birth Certificate</option>
<option>National Identity</option>
<option>VAR: Passport</option>
<option>VAR: Photograph Passport Size</option>
<option>VAR: Birth Certificate</option>
<option>VAR: National Identity</option>
<option>VAR: Transcript of records</option>
<option>VAR: Awards and Certificate</option>
<option>VAR: Statement of purpose / Genuine Temporary Entrant (see below)</option>
<option>VAR: Work Reference Letter (attached at least 2 reference letter)</option>
<option>VAR: Assets Documents</option>
<option>VAR: Medical Check-up Details</option>
<option>Sponsor: Sponsorship declaration/Statement (write down address and phone number)</option>
<option>Sponsor: Sponsor’s passport or National Identity</option>
<option>Sponsor: Bank Reference</option>
<option>Sponsor: Bank Statement (3 months before the application)</option>
<option>Sponsor: Source of Income</option>
-->

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

    $("#programoptionstable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

  });

  function ResetFile() {
    document.getElementById("documentForm").reset();
  }

  document.getElementsByClassName("customerinfotabs")[0].click();

  function validateData(evt) {
    if (document.getElementById("birthdate").value == "") {
      alert("Birth date has wrong date format. Kindly replace with appropriate date.");
      evt.preventDefault();
      return false;
    }
    
    if (document.getElementById("vedate").value == "") {
      alert("Visa expiration date has wrong date format. Kindly replace with appropriate date.");
      evt.preventDefault();
      return false;
    }

    return true;
  }

  function markasread() {
      var baseurl10 = document.getElementById("baseurl1").value;
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

  const fileSelector = document.getElementById('userfile');
  var fileList = 0;
  fileSelector.addEventListener('change', (event) => {
      fileList = event.target.files;

      var reader = new FileReader();

      //Read the contents of Image File.
      reader.readAsDataURL(fileList[0]);
      reader.onload = function (e) {

        //Initiate the JavaScript Image object.
        var image = new Image();

        //Set the Base64 string return from FileReader as source.
        image.src = e.target.result;

        //Validate the File Height and Width.
        image.onload = function () {
          var height = this.height;
          var width = this.width;
          if (height > 200 || width > 200) {
            alert("Photo size must not exceed 200px X 200px!");
            document.getElementById("clientinfosubmit").disabled = true;
          } else {
            alert("Photo size valid! Photo added.");
            document.getElementById("clientinfosubmit").disabled = false;
          }
        };
      };

  });

</script>
</body>
</html>