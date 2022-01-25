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
            <div class="card-header">
              <h3 class="card-title"><a href="#">Add New <?php echo $title; ?></a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Processing Officer</th>
                  <th>Date Created</th>
                  <th>Inquiry</th>
                  <th>Documents</th>
                  <th>Admissions</th>
                  <th>School</th>
                  <th>Course</th>
                  <th>Location</th>
                  <th>GTE/Visa Processing Officer</th>
                  <th>GTE/Visa Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                foreach ($clients as $row) {
                  echo "<tr>
                    <td>".$row->client_surname.", ".$row->client_firstname." ".$row->client_middlename."</td>
                    <td>".$row->processingofficer."</td>
                    <td>".$row->datecreated."</td>
                    <td>".$row->inquiry."</td>
                    <td>".$row->documents."</td>
                    <td>".$row->admissions."</td>
                    <td>".$row->school."</td>
                    <td>".$row->course."</td>
                    <td>".$row->location."</td>
                    <td>".$row->gteofficer."</td>
                    <td>".$row->gtestatus."</td>
                  </tr>";
                }

                
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Processing Officer</th>
                  <th>Date Created</th>
                  <th>Inquiry</th>
                  <th>Documents</th>
                  <th>Admissions</th>
                  <th>School</th>
                  <th>Course</th>
                  <th>Location</th>
                  <th>GTE/Visa Processing Officer</th>
                  <th>GTE/Visa Status</th>
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