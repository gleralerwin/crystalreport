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

    $sql = "SELECT * FROM vwSMitems WHERE BrandName LIKE '%$brand%'";
    $result = sqlsrv_query($sm_conn, $sql);

    $resultPHPExcel	= new PHPExcel();

    $resultPHPExcel->getActiveSheet()->setCellValue('A1', 'styleno');
    $resultPHPExcel->getActiveSheet()->setCellValue('B1', 'brandname');
    $resultPHPExcel->getActiveSheet()->setCellValue('C1', 'styledesc');
    $resultPHPExcel->getActiveSheet()->setCellValue('D1', 'stylecolor');
    $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'stylesize');
    $resultPHPExcel->getActiveSheet()->setCellValue('F1', 'vend_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('G1', 'dept');
    $resultPHPExcel->getActiveSheet()->setCellValue('H1', 'subdept');
    $resultPHPExcel->getActiveSheet()->setCellValue('I1', 'class');
    $resultPHPExcel->getActiveSheet()->setCellValue('J1', 'subclass');
    $resultPHPExcel->getActiveSheet()->setCellValue('K1', 'stk_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'sm_upc');
    $resultPHPExcel->getActiveSheet()->setCellValue('M1', 'reg');
    $resultPHPExcel->getActiveSheet()->setCellValue('N1', 'skudate');

    $i = 2;

    while($item = sqlsrv_fetch_array($result)){
        $resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['styleno']);
        $resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['BrandName']);
        $resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['StyleDesc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['StyleColor']);
        $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['StyleSize']);
        $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['vend_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['dept']);
        $resultPHPExcel->getActiveSheet()->setCellValue('H' . $i, $item['subdept']);
        $resultPHPExcel->getActiveSheet()->setCellValue('I' . $i, $item['class']);
        $resultPHPExcel->getActiveSheet()->setCellValue('J' . $i, $item['subclass']);
        $resultPHPExcel->getActiveSheet()->setCellValue('K' . $i, $item['stk_code']);
        $resultPHPExcel->getActiveSheet()->setCellValue('L' . $i, $item['sm_upc']);
        $resultPHPExcel->getActiveSheet()->setCellValue('M' . $i, $item['REG']);
        $resultPHPExcel->getActiveSheet()->setCellValue('N' . $i, $item['EntryDate']->format('Y/m/d'));
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

    $sql = "SELECT * FROM vwSMitems WHERE BrandName LIKE '%$brand%'";
    $result = sqlsrv_query($sm_conn, $sql);

    $resultPHPExcel	= new PHPExcel();

    $resultPHPExcel->getActiveSheet()->setCellValue('A1', 'vend_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('B1', 'dept');
    $resultPHPExcel->getActiveSheet()->setCellValue('C1', 'subdept');
    $resultPHPExcel->getActiveSheet()->setCellValue('D1', 'class');
    $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'subclass');
    $resultPHPExcel->getActiveSheet()->setCellValue('F1', 'brand_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('G1', 'stk_desc');
    $resultPHPExcel->getActiveSheet()->setCellValue('H1', 'styleno');
    $resultPHPExcel->getActiveSheet()->setCellValue('I1', 'unit_retl');
    $resultPHPExcel->getActiveSheet()->setCellValue('J1', 'vendor_upc');
    $resultPHPExcel->getActiveSheet()->setCellValue('K1', 'sm_upc');
    $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'stk_code');
    $resultPHPExcel->getActiveSheet()->setCellValue('M1', 'brandname');
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





