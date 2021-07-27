<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if(isset($_POST['submit']))
{
    $brand = $_POST['brandname'];
    $pricetype = $_POST['pricetype'];
}

if($pricetype == 'reg')
{
    include '../inc/sm_db.php';
    include '../PHPExcel/Classes/PHPExcel.php';

    $sql = "SELECT * FROM vwSMitems WHERE BrandName LIKE '%$brand%' ORDER BY BrandName, styleno, StyleColor, StyleSize ASC";
    $result = sqlsrv_query($sm_conn, $sql);

    $resultPHPExcel	= new PHPExcel();

    $resultPHPExcel->getActiveSheet()->setCellValue('A1', 'Brandname');
    $resultPHPExcel->getActiveSheet()->setCellValue('B1', 'Vend_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('C1', 'Dept');
    $resultPHPExcel->getActiveSheet()->setCellValue('D1', 'Subdept');
    $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'Class');
    $resultPHPExcel->getActiveSheet()->setCellValue('F1', 'Subclass');
    $resultPHPExcel->getActiveSheet()->setCellValue('G1', 'Stk_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('H1', 'Sm_upc');
    $resultPHPExcel->getActiveSheet()->setCellValue('I1', 'Styleno');
    $resultPHPExcel->getActiveSheet()->setCellValue('J1', 'Styledesc');
    $resultPHPExcel->getActiveSheet()->setCellValue('K1', 'Stylecolor');
    $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'Stylesize');
    $resultPHPExcel->getActiveSheet()->setCellValue('M1', 'Reg');
    $resultPHPExcel->getActiveSheet()->setCellValue('N1', 'SKUdate');

    $i = 2;

    while($item = sqlsrv_fetch_array($result)){
        $resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['BrandName']);
        $resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['vend_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['dept']);
        $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['subdept']);
        $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['class']);
        $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['subclass']);
        $resultPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['stk_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('H' . $i, $item['sm_upc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('I' . $i, $item['styleno']);
        $resultPHPExcel->getActiveSheet()->setCellValue('J' . $i, $item['StyleDesc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('K' . $i, $item['StyleColor']);
        $resultPHPExcel->getActiveSheet()->setCellValue('L' . $i, $item['StyleSize']);
        $resultPHPExcel->getActiveSheet()->setCellValue('M' . $i, $item['REG']);
        $resultPHPExcel->getActiveSheet()->setCellValue('N' . $i, $item['EntryDate']);
        $i ++;
    }

    $outputFileName = 'SM REG SKU LIST.xls';
    $xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
    ob_end_clean();
    //ob_start();  ob_flush();
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

if($pricetype == 'md')
{
    include '../inc/sm_db.php';
    include '../PHPExcel/Classes/PHPExcel.php';

    $sql = "SELECT * FROM vwSMitems WHERE BrandName LIKE '%$brand%' ORDER BY BrandName, styleno, StyleColor, StyleSize ASC";
    $result = sqlsrv_query($sm_conn, $sql);

    $resultPHPExcel	= new PHPExcel();

    $resultPHPExcel->getActiveSheet()->setCellValue('A1', 'Vend_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('B1', 'Dept');
    $resultPHPExcel->getActiveSheet()->setCellValue('C1', 'Subdept');
    $resultPHPExcel->getActiveSheet()->setCellValue('D1', 'Class');
    $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'Subclass');
    $resultPHPExcel->getActiveSheet()->setCellValue('F1', 'Brand_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('G1', 'Stk_desc');
    $resultPHPExcel->getActiveSheet()->setCellValue('H1', 'Styleno');
    $resultPHPExcel->getActiveSheet()->setCellValue('I1', 'Unit_retl');
    $resultPHPExcel->getActiveSheet()->setCellValue('J1', 'Vendor_upc');
    $resultPHPExcel->getActiveSheet()->setCellValue('K1', 'Sm_upc');
    $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'Stk_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('M1', 'IrmsBrand');
    $resultPHPExcel->getActiveSheet()->setCellValue('N1', 'AP_Type');

    $i = 2;

    while($item = sqlsrv_fetch_array($result)){
        $resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['vend_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['dept']);
        $resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['subdept']);
        $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['class']);
        $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['subclass']);
        $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['brand_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['stk_desc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('H' . $i, $item['styleno']);
        $resultPHPExcel->getActiveSheet()->setCellValue('I' . $i, $item['MD']);
        $resultPHPExcel->getActiveSheet()->setCellValue('J' . $i, $item['vendor_upc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('K' . $i, $item['sm_upc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('L' . $i, $item['stk_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('M' . $i, $item['BrandName']);
        $resultPHPExcel->getActiveSheet()->setCellValue('N' . $i, $item['AP_Type']);
        $i ++;
    }

    $outputFileName = 'SM MD SKU LIST.xls';
    $xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
    ob_end_clean();
    //ob_start();  ob_flush();
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
?>





