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
            <h1>SM Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SM Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div id="ncccsearch" class="row" style="background-color: #F5FFFA; margin: 2px 2px 10px 2px; padding: 18px; border: 1px solid #A9A9A9;">
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Select Brand <em style="color: #696969;">( Required Field )</em></label>
                  <select class="form-control" id="brandname" name="brandname">
                    <option value="0"> --- Brand Name --- </option>
                    <option value="BOSSINI LADIES">BOSSINI LADIES</option>
                    <option value="CRISSA">CRISSA</option>
                    <option value="DYSE ONE">DYSE ONE</option>

                    <option value="EGO">EGO</option>
                    <option value="FUBU">FUBU </option>
                    <option value="FUBU GIRLS">FUBU GIRLS</option>
                    <option value="HOTKISS">HOTKISS</option>
                    <option value="NO APOLOGIES">NO APOLOGIES</option>
                    <option value="RED GIRL">RED GIRL</option>
                    <option value="UNIONBAY">UNIONBAY</option>
                  </select>    
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
                <label>Select Price <em style="color: #696969;">( Required Field )</em></label>
                  <select class="form-control" id="pricetype" name="pricetype">
                  <option value="0"> --- Price Type --- </option>
                  <option value="REG">REGULAR PRICE</option>
                  <option value="MD">MARKDOWN PRICE</option>
                  </select>    
                </div>
              </div>
              <div class="col-sm-2" style="margin-top: 32px;">
                  <div class="form-group">
                    <button class="btn btn-md btn-primary form-control" onclick="smSearch()">Custom Search</button>
                  </div>
              </div>
          </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"> SKU LIST </h3>
              
              </div><!-- /.card-header -->

              <div class="card-body">

              <button id="sm_searchloader" class="btn btn-primary" style="display: none;">
                <span class="spinner-border spinner-border-sm"></span> Loading..
              </button>

              <!-- table SM default list display all reg and md -->
              <table class="table table-bordered table-striped" style="width: 100%;" id="sm_defaultlist">
              <button class="btn btn-bg btn-success float-right" onclick="sm_MdExport()">Export To Excel ( MD ) <i class="fa fa-download"></i></button>
              <button class="btn btn-bg btn-info float-right" onclick="sm_RegExport()" style="margin-right: 5px;">Export To Excel ( REG ) <i class="fa fa-download"></i></button>

              <br><br>

                <thead>
                    <tr>
                        <th>#</th>
                        <th>VendCode</th>
                        <th>REG</th>
                        <th>MD</th>
                        <th>Cost</th>
                        <th>Brand</th>
                        <th>AP_Type</th>
                        <th>Dept</th>
                        <th>Subdept</th>
                        <th>Class</th>
                        <th>Subclass</th>
                        <th>Styleno</th>
                        <th>SKU Type</th>
                        <th>InSKU</th>
                        <th>Stylesize</th>
                        <th>Sm_upc</th>
                        <th>Vendor_upc</th>
                        <th>Stk_code</th>
                        <th>Stylecolor</th>
                        <th>Entrydate</th>
                        <th>Category</th>
                        <th>Styledesc</th>
                        <th>Brandcode</th>
                        <th>Stk_desc</th>
                    </tr>
                </thead>
                <tbody id="sm_default_list"></tbody>
                <tfoot>
                  <tr>
                  <th>#</th>
                        <th>VendCode</th>
                        <th>REG</th>
                        <th>MD</th>
                        <th>Cost</th>
                        <th>Brand</th>
                        <th>AP_Type</th>
                        <th>Dept</th>
                        <th>Subdept</th>
                        <th>Class</th>
                        <th>Subclass</th>
                        <th>Styleno</th>
                        <th>SKU Type</th>
                        <th>InSKU</th>
                        <th>Stylesize</th>
                        <th>Sm_upc</th>
                        <th>Vendor_upc</th>
                        <th>Stk_code</th>
                        <th>Stylecolor</th>
                        <th>Entrydate</th>
                        <th>Category</th>
                        <th>Styledesc</th>
                        <th>Brandcode</th>
                        <th>Stk_desc</th>
                  </tr>
              </tfoot>
            </table>

             <!-- table SM REG list (Regular price only ) -->
            <table class="table table-bordered table-striped" style="width: 100%; display: none;" id="sm_reglist">
            <br>
                <thead>
                    <tr>
                        <th>#</th>
                        <th id="sm_regbrand_col">BrandName</th>
                        <th>Vendo_Code</th>
                        <th>Dept</th>
                        <th>Subdept</th>
                        <th>Class</th>
                        <th>Subclass</th>
                        <th>Stk_code</th>
                        <th>Sm_upc</th>
                        <th id="sm_regstyleno_col">Styleno</th>
                        <th>Styledesc</th>
                        <th>Stylecolor</th>
                        <th>Stylesize</th>
                        <th id="sm_reg_col">REG</th>
                        <th>SKUdate</th>
                    </tr>
                </thead>
                <tbody id="display_sm_reglist" style="display: none;"></tbody>
                <tfoot>
                  <tr>
                        <th>#</th>
                        <th id="sm_regbrand_col">BrandName</th>
                        <th>Vendo_Code</th>
                        <th>Dept</th>
                        <th>Subdept</th>
                        <th>Class</th>
                        <th>Subclass</th>
                        <th>Stk_code</th>
                        <th>Sm_upc</th>
                        <th id="sm_regstyleno_col">Styleno</th>
                        <th>Styledesc</th>
                        <th>Stylecolor</th>
                        <th>Stylesize</th>
                        <th id="sm_reg_col">REG</th>
                        <th>SKUdate</th>
                  </tr>
              </tfoot>
            </table>

             <!-- table SM MD list (Markdown only ) -->
            <table class="table table-bordered table-striped" style="width: 100%; display: none;" id="sm_mdlist">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vendo_Code</th>
                        <th>Dept</th>
                        <th>Subdept</th>
                        <th>Class</th>
                        <th>Subclass</th>
                        <th>Brandcode</th>
                        <th>Stk_desc</th>
                        <th id="sm_mdstyleno_col">Styleno</th>
                        <th>Unit_retl</th>
                        <th>Vendor_upc</th>
                        <th>Sm_upc</th>
                        <th>Stk_Code</th>
                        <th id="sm_mdirmsname_col">IRMS Brand</th>
                        <th>AP_Type</th>
                    </tr>
                </thead>
                <tbody id="display_sm_mdlist" style="display: none;"></tbody>
                <tfoot>
                  <tr>
                        <th>#</th>
                        <th>Vendo_Code</th>
                        <th>Dept</th>
                        <th>Subdept</th>
                        <th>Class</th>
                        <th>Subclass</th>
                        <th>Brandcode</th>
                        <th>Stk_desc</th>
                        <th>Styleno</th>
                        <th>Unit_retl</th>
                        <th>Vendor_upc</th>
                        <th>Sm_upc</th>
                        <th>Stk_Code</th>
                        <th>IRMS Brand</th>
                        <th>AP_Type</th>
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

        <!-- NCCC list loader -->
        <div id="sm_loader" class="container loader"></div>

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