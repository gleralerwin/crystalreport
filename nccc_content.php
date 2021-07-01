<!-- NCCC Spinner loader -->
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
         <div id="ncccsearch" class="row" style="background-color: #FFFFFF; margin: 2px 2px 10px 2px; padding: 18px; border: 1px solid #A9A9A9; display: none;">
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Select Brand</label>
                  <p id=display></p>
                  <select class="form-control" id="brand" name="brand" onchange="ncccGetDesc()"></select>    
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                <label>Description</label>
                  <select class="form-control" id="desc" name="desc"></select>    
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
                      <label>SKU</label>
                      <input type="text" name="sku" id="sku" class="form-control">
                  </div>
              </div>
              <div class="col-sm-2" style="margin-top: 32px;">
                  <div class="form-group">
                    <button class="btn btn-md btn-primary form-control" onclick="ncccSearch()">Search</button>
                  </div>
              </div>
          </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"> SKU LIST </h3>
              
                <button class="btn btn-md btn-default float-right" onclick="ncccGetBrandName()"><i class="fa fa-search-plus"></i> Filter Search</button>
              </div><!-- /.card-header -->

              <div class="card-body">

              <button id="nccc_searchloader" class="btn btn-primary" style="display: none;">
                <span class="spinner-border spinner-border-sm"></span> Loading..
              </button>

              <table class="table table-bordered table-striped" style="width: 100%;">

              <button class="btn btn-bg btn-success float-right" onclick="Nccc_MdExport()">Export To Excel ( MD ) <i class="fa fa-download"></i></button>
              <button class="btn btn-bg btn-info float-right" onclick="Nccc_RegExport()" style="margin-right: 5px;">Export To Excel ( REG ) <i class="fa fa-download"></i></button>

              <div id="dropdownSearch" style="display: none;">
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">HTML</a></li>
                  <li><a href="#">CSS</a></li>
                  <li><a href="#">JavaScript</a></li>
                </ul>
                </div>
              </div>

              <br><br>
                <thead>
                    <tr>
                        <th>#</th>
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
                        <th>EntryDate</th>
                        <th>PriceType</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                        <th>#</th>
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
                        <th>EntryDate</th>
                        <th>PriceType</th>
                  </tr>
              </tfoot>
              <tbody id="nccc_list" style="display: none;"></tbody>
              <tbody id="nccc_search" style="display: none;"></tbody>
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
        <div id="nccc_loader" class="container loader"></div>

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