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
          <?php
          if(isset($_GET['success1'])) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Successfully assigned the process officer.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
          }
          ?>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Phone Number</th>
                  <th>Qualifications</th>
                  <th>Address</th>
                  <th>Suburb</th>
                  <th>State</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                foreach ($clients as $row) {
                  echo "<tr>
                    <td>".$row->client_surname.", ".$row->client_firstname." ".$row->client_middlename."</td>
                    <td>".$row->client_email."</td>
                    <td>".$row->client_mobileno."</td>
                    <td>".$row->client_phoneno."</td>
                    <td>".$row->client_qualifications."</td>
                    <td>".$row->client_address."</td>
                    <td>".$row->client_suburb."</td>
                    <td>".$row->client_state."</td>
                    <td><a href='editclientinfo2/".$row->client_id."' class='btn btn-primary btn-xs'>Details</a><a href='#' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#assignModal' id='client_".$row->client_id."' onclick='putClientId(event)'>Assign</a></td>
                  </tr>";
                }

                
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Phone Number</th>
                  <th>Qualifications</th>
                  <th>Address</th>
                  <th>Suburb</th>
                  <th>State</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
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

  <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="assign">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please Select Processing Officer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="assignofficer" method="post">
          <div class="modal-body">
              <div class="form-group">
                <label for="documentype">Client ID</label>
                <input type="text" name="clientid" id="clientid" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="documentype">Processing Officer</label>
                <select class="form-control select2" name="officer" required>
                    <?php
                    foreach ($officer as $row) {
                      echo "<option value='".$row->officer_id."'>".$row->officer_name."</option>";
                    }
                    ?>
                </select>
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <!-- /.content-wrapper -->