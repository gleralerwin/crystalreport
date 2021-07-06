  <!-- RDS Spinner loader -->
<style>
  .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


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
              <li class="breadcrumb-item active">SKU Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

         <div id="rds_search" class="row" style="background-color: #FFFFFF; margin: 2px 2px 10px 2px; padding: 18px; border: 1px solid #A9A9A9;">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Select Brand</label>
                <select class="form-control" id="brandname" name="brandname"></select>    
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Style No.</label>
                <input type="text" name="styleno" id="styleno" class="form-control">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label>PriceType</label>
                <select class="form-control" id="rds_pricetype" name="rds_pricetype">
                <option value="REG">REG</option>
                <option value="MD">MD</option>
                </select>    
              </div>
            </div>
            <div class="col-sm-2" style="margin-top: 32px;">
                <div class="form-group">
                    <button class="btn btn-bg btn-primary form-control" onclick="rdsSearch()">Search</button>
                </div>
            </div>
         </div>      
         
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">SKU LIST</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

              <button id="rds_searchloader" class="btn btn-primary" style="display: none;">
                <span class="spinner-border spinner-border-sm"></span> Loading..
              </button>

              <table class="table table-bordered table-striped">
              <button class="btn btn-md btn-success float-right" onclick="Rds_MdExport()">Export To Excel ( MD ) <i class="fa fa-download"></i></button>
              <button class="btn btn-md btn-info float-right" onclick="Rds_RegExport()" style="margin-right: 5px;">Export To Excel ( REG ) <i class="fa fa-download"></i></button>

                <br><br>
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>BrandName</th>
                    <th>ShortDesc</th>
                    <th>ItemDesc</th>
                    <th>SKU</th>
                    <th>UPC</th>
                    <th>MFno</th>
                    <th>StyleNo</th>
                    <th>BuyerCode</th>
                    <th>OrigPrice</th>
                    <th>PriceType</th>
                    <th>CreateDate</th>
                    <th>IRMSName</th>
                    <th>VendorCode</th>
                    <th>SubDeptClass</th>
                  </tr>
                  </thead>

                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>BrandName</th>
                    <th>ShortDesc</th>
                    <th>ItemDesc</th>
                    <th>SKU</th>
                    <th>UPC</th>
                    <th>MFno</th>
                    <th>StyleNo</th>
                    <th>BuyerCode</th>
                    <th>OrigPrice</th>
                    <th>PriceType</th>
                    <th>CreateDate</th>
                    <th>IRMSName</th>
                    <th>VendorCode</th>
                    <th>SubDeptClass</th>
                  </tr>
              </tfoot>
                  <tbody id="rdslist"></tbody>
                  <tbody id="rds_searchlist" style="display: none;"></tbody>
                </table>

              </div>
              <!-- /.card-body -->


            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

        <!-- NCCC list loader -->
        <div id="rds_loader" class="container loader"></div>

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