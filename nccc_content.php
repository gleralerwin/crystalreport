<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>NCCC Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">NCCC Report</li>
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
              </div><!-- /.card-header -->

              <div id="display"></div> 

              <div class="card-body">
              <table id="ncccTable" class="table table-bordered table-striped">
              <button class="btn btn-sm btn-success" onclick="exportToExcel()">Export to Excel</button>
              <br><br>
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Desc</th>
                        <th>SizeSet</th>
                        <th>StyleNo</th>
                        <th>BuyerCode</th>
                        <th>SKUType</th>
                        <th>VendorCode</th>
                        <th>SRP</th>
                        <th>UPC</th>
                        <th>Uom</th>
                        <th>SKU</th>
                        <th>Dept</th>
                        <th>SubDept</th>
                        <th>Class</th>
                        <th>SubClass</th>
                        <th>PriceType</th>
                    </tr>
                </thead>
                <tbody id="nccc_list"></tbody>
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
