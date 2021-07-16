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

      <div id="datadisplay"></div>  
      
         <div id="ncccsearch" class="row" style="background-color: #F5FFFA; margin: 2px 2px 10px 2px; padding: 18px; border: 1px solid #A9A9A9;">
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Select Brand <em style="color: #696969;">( Required Field )</em></label>
                  <select class="form-control" id="brand" name="brand">
                    <option value="0"> --- Brand Name --- </option>
                    <option value="bossini">BOSSINI</option>
                    <option value="cliffe">CLIFFE</option>
                    <option value="crissa">CRISSA</option>
                    <option value="crissa steps">CRISSA STEPS</option>
                    <option value="dyse one">DYSE ONE</option>
                    <option value="ego">EGO</option>
                    <option value="freebie">FREEBIE</option>
                    <option value="fubu">FUBU</option>
                    <option value="fube girls">FUBU GIRLS</option>
                    <option value="hotkiss">HOTKISS</option>
                    <option value="hotkiss femme">HOTKISS FEMME</option>
                    <option value="no aplologies">NO APOLOGIES</option>
                    <option value="red girl">RED GIRL</option>
                    <option value="unionbay">UNIONBAY</option>
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
                    <option value="reg">REGULAR PRICE</option>
                    <option value="md">MARK DOWN PRICE</option>
                  </select>    
                </div>
              </div>
              <div class="col-sm-2" style="margin-top: 32px;">
                  <div class="form-group">
                    <button class="btn btn-md btn-primary form-control" onclick="ncccSearch()">Custom Search</button>
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

              <button id="nccc_searchloader" class="btn btn-primary" style="display: none;">
                <span class="spinner-border spinner-border-sm"></span> Loading..
              </button>

             <div id="divload"></div>   

              <table class="table table-bordered table-striped" style="width: 100%;">

              <button class="btn btn-bg btn-success float-right" onclick="Nccc_MdExport()">Export To Excel ( MD ) <i class="fa fa-download"></i></button>
              <button class="btn btn-bg btn-info float-right" onclick="Nccc_RegExport()" style="margin-right: 5px;">Export To Excel ( REG ) <i class="fa fa-download"></i></button>
              <!-- <a class="btn btn-bg btn-warning float-right" style="margin-right: 5px;" href="./reports/nccc_reg_skulist_excel.php">Export To Excel ( REG ) </a> -->
              
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
                        <th id="nccc_brand">Brand</th>
                        <th>Desc</th>
                        <th>SizeSet</th>
                        <th id="nccc_styleno">StyleNo</th>
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
                        <th id="nccc_pricetype">PriceType</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                        <th>#</th>
                        <th id="nccc_brand">Brand</th>
                        <th>Desc</th>
                        <th>SizeSet</th>
                        <th id="nccc_styleno">StyleNo</th>
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
                        <th id="nccc_pricetype">PriceType</th>
                  </tr>
              </tfoot>
              <tbody id="nccc_list"></tbody>
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