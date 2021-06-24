  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RDS Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">RDS Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">SKU LIST</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <button class="btn btn-sm btn-success">Export to Excel</button>
                <br><br>
                  <thead>
                  <tr>
                    <th>SubDeptClass</th>
                    <th>SKU</th>
                    <th>UPC</th>
                    <th>MFno</th>
                    <th>StyleN0</th>
                    <th>ItemDesc</th>
                    <th>ShortDesc</th>
                    <th>BrandName</th>
                    <th>BuyerCode</th>
                    <th>OrigPrice</th>
                    <th>PriceType</th>
                    <!-- <th>CreateDate</th> -->
                    <th>IRMSName</th>
                    <th>VendorCode</th>
                  </tr>
                  </thead>
                  <tbody id="rdslist"></tbody>
                </table>

              </div>
              <!-- /.card-body -->


            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->