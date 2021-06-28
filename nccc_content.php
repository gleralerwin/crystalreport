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
                <h3 class="card-title">SKU LIST</h3>&nbsp;
                
                <img id="nccc_loader" src="./dist/img/ajax-loader1.gif" alt="loader.gif">

                <button class="btn btn-md btn-default float-right" onclick="filterSearch()"><i class="fa fa-search-plus"></i> Filter Search</button>
              </div><!-- /.card-header -->

              <div class="card-body">

              <div id="search" class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                  Search By Brand 
                  <select class="form-control">
                      <option value=""></option>
                      <option value="">Crissa</option>
                      <option value="">Dickies</option>
                      <option value="">apologies</option>
                    </select>    
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                  Price Type
                    <select class="form-control">
                      <option value="">Crissa</option>
                      <option value="">Dickies</option>
                      <option value="">apologies</option>
                    </select>    
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                  Style No.
                    <select class="form-control">
                      <option value="">Crissa</option>
                      <option value="">Dickies</option>
                      <option value="">apologies</option>
                    </select>    
                  </div>
                </div>
              </div>
              
              <br><br>

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
                        <th>PriceType</th>
                  </tr>
              </tfoot>
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
