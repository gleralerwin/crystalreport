<?php

require_once './PHPExcel/Classes/PHPExcel.php';
require_once './PHPExcel/Classes/PHPExcel/IOFactory.php';
require_once './PHPExcel/Classes/PHPExcel/Writer/Excel5.php';

include './inc/nccc_db.php';

$resultPHPExcel	= new PHPExcel();

$resultPHPExcel->getActiveSheet()->setCellValue('A1', 'SubDeptClass');
$resultPHPExcel->getActiveSheet()->setCellValue('B1', 'SKU');
$resultPHPExcel->getActiveSheet()->setCellValue('C1', 'UPC');
$resultPHPExcel->getActiveSheet()->setCellValue('D1', 'MFno');
$resultPHPExcel->getActiveSheet()->setCellValue('E1', 'StyleNo');
$resultPHPExcel->getActiveSheet()->setCellValue('F1', 'ItemDesc');
$resultPHPExcel->getActiveSheet()->setCellValue('G1', 'ShortDesc');
$resultPHPExcel->getActiveSheet()->setCellValue('H1', 'BrandName');
$resultPHPExcel->getActiveSheet()->setCellValue('I1', 'BuyerCode');
$resultPHPExcel->getActiveSheet()->setCellValue('J1', 'OrigPrice');
$resultPHPExcel->getActiveSheet()->setCellValue('K1', 'PriceType');
// $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'CreateDate');
$resultPHPExcel->getActiveSheet()->setCellValue('M1', 'IRMSName');
$resultPHPExcel->getActiveSheet()->setCellValue('N1', 'VendorCode');

$i = 2;

foreach($data as $item){
	$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['SubDeptClass']);
	$resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['SKU']);
	$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['UPC']);
    $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['MFno']);
    $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['StyleNo']);
    $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['ItemDesc']);
    $resultPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['ShortDesc']);
    $resultPHPExcel->getActiveSheet()->setCellValue('H' . $i, $item['BrandName']);
    $resultPHPExcel->getActiveSheet()->setCellValue('I' . $i, $item['BuyerCode']);
    $resultPHPExcel->getActiveSheet()->setCellValue('J' . $i, $item['OrigPrice']);
    $resultPHPExcel->getActiveSheet()->setCellValue('K' . $i, $item['PriceType']);
    // $resultPHPExcel->getActiveSheet()->setCellValue('L' . $i, $item['CreateDate']);
    $resultPHPExcel->getActiveSheet()->setCellValue('M' . $i, $item['IRMSName']);
    $resultPHPExcel->getActiveSheet()->setCellValue('N' . $i, $item['VendorCode']);
	$i ++;
}

$outputFileName = 'total.xls';
$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
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

$xlsWriter->save( "php://output" );




?>