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

        <?php

        function ncccExportRegExcel()
        {
          include './inc/nccc_db.php';
          include './PHPExcel/Classes/PHPExcel.php';

          if(!empty($_POST))
          {
            $brand = $_POST['brand'];
            $styleno = $_POST['styleno'];
            $pricetype = $_POST['pricetype'];

            $sql = "SELECT * FROM tblSKU WHERE brand LIKE '%$brand%' AND styleno LIKE '%$styleno%' AND pricetype LIKE '%$pricetype%' ";
            $result = sqlsrv_query($nccc_conn, $sql);

            $resultPHPExcel	= new PHPExcel();
            $resultPHPExcel->getActiveSheet()->setCellValue('A1', 'Brand');
            $resultPHPExcel->getActiveSheet()->setCellValue('B1', 'Descrip');
            $resultPHPExcel->getActiveSheet()->setCellValue('C1', 'StyleNo');
            $resultPHPExcel->getActiveSheet()->setCellValue('D1', 'BuyerCode');
            $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'SKUType');
            $resultPHPExcel->getActiveSheet()->setCellValue('F1', 'VendorCode');
            $resultPHPExcel->getActiveSheet()->setCellValue('G1', 'SRP');
            $resultPHPExcel->getActiveSheet()->setCellValue('H1', 'UPC');
            $resultPHPExcel->getActiveSheet()->setCellValue('I1', 'UoM');
            $resultPHPExcel->getActiveSheet()->setCellValue('J1', 'SKU');
            $resultPHPExcel->getActiveSheet()->setCellValue('K1', 'Dept');
            $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'SubDept');
            $resultPHPExcel->getActiveSheet()->setCellValue('M1', 'Class');
            $resultPHPExcel->getActiveSheet()->setCellValue('N1', 'SubClass');
            $resultPHPExcel->getActiveSheet()->setCellValue('O1', 'EntryDate');
            $resultPHPExcel->getActiveSheet()->setCellValue('P1', 'PriceType');

            $i = 2;

            while($item = sqlsrv_fetch_array($result)) 
            {
                $resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['Brand']);
                $resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['Descrip']);
                $resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['StyleNo']);
                $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['BuyerCode']);
                $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['SKUType']);
                $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['VendorCode']);
                $resultPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['SRP']);
                $resultPHPExcel->getActiveSheet()->setCellValue('H' . $i, $item['UPC']);
                $resultPHPExcel->getActiveSheet()->setCellValue('I' . $i, $item['UoM']);
                $resultPHPExcel->getActiveSheet()->setCellValue('J' . $i, $item['SKU']);
                $resultPHPExcel->getActiveSheet()->setCellValue('K' . $i, $item['Dept']);
                $resultPHPExcel->getActiveSheet()->setCellValue('L' . $i, $item['SubDept']);
                $resultPHPExcel->getActiveSheet()->setCellValue('M' . $i, $item['Class']);
                $resultPHPExcel->getActiveSheet()->setCellValue('N' . $i, $item['SubClass']);
                $resultPHPExcel->getActiveSheet()->setCellValue('O' . $i, $item['EntryDate']);
                $resultPHPExcel->getActiveSheet()->setCellValue('P' . $i, $item['PriceType']);
                $i ++;
            }
                $outputFileName = 'NCCC REG SKU LIST.xlsx';
                $xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
                ob_start();  ob_flush();
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");
                header('Content-Disposition:inline;filename="'.$outputFileName.'"');
                header("Content-Transfer-Encoding: binary");
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Pragma: no-cache");
                $xlsWriter->save('php://output');  
          }  
        }  
        
        ?>

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

              <table class="table table-bordered table-striped" style="width: 100%;">

              <button class="btn btn-bg btn-success float-right" onclick="Nccc_MdExport()">Export To Excel ( MD ) <i class="fa fa-download"></i></button>
              <!-- <button class="btn btn-bg btn-info float-right" onclick="Nccc_RegExport()" style="margin-right: 5px;">Export To Excel ( REG ) <i class="fa fa-download"></i></button> -->
              <a class="btn btn-bg btn-warning float-right form-control" style="margin-right: 5px;" href="<?php ncccExportRegExcel(); ?>">Export To Excel test</a>

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