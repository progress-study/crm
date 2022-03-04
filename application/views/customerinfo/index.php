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
                    <td><a href='editclientinfo/".$row->client_id."' class='btn btn-primary btn-xs'>Edit</a></td>
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
  <!-- /.content-wrapper -->