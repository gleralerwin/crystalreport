<?php

echo "download successfully";
// include '../inc/nccc_db.php';
// include '../PHPExcel/Classes/PHPExcel.php';
// // include '../PHPExcel/Classes/PHPExcel/IOFactory.php';
// // include '../PHPExcel/Classes/PHPExcel/Writer/Excel5.php';

// $brand = 'BOSSINI';
// // $styleno = 'BMT02-0002';
// $pricetype = 'REG';

// $sql = "SELECT * FROM tblSKU WHERE brand LIKE '%$brand%' AND pricetype LIKE '%$pricetype%' ";
// $result = sqlsrv_query($nccc_conn, $sql);

// $resultPHPExcel	= new PHPExcel();

// $resultPHPExcel->getActiveSheet()->setCellValue('A1', 'Brand');
// $resultPHPExcel->getActiveSheet()->setCellValue('B1', 'Descrip');
// $resultPHPExcel->getActiveSheet()->setCellValue('C1', 'StyleNo');
// $resultPHPExcel->getActiveSheet()->setCellValue('D1', 'BuyerCode');
// $resultPHPExcel->getActiveSheet()->setCellValue('E1', 'SKUType');
// $resultPHPExcel->getActiveSheet()->setCellValue('F1', 'VendorCode');
// $resultPHPExcel->getActiveSheet()->setCellValue('G1', 'SRP');
// $resultPHPExcel->getActiveSheet()->setCellValue('H1', 'UPC');
// $resultPHPExcel->getActiveSheet()->setCellValue('I1', 'UoM');
// $resultPHPExcel->getActiveSheet()->setCellValue('J1', 'SKU');
// $resultPHPExcel->getActiveSheet()->setCellValue('K1', 'Dept');
// $resultPHPExcel->getActiveSheet()->setCellValue('L1', 'SubDept');
// $resultPHPExcel->getActiveSheet()->setCellValue('M1', 'Class');
// $resultPHPExcel->getActiveSheet()->setCellValue('N1', 'SubClass');
// $resultPHPExcel->getActiveSheet()->setCellValue('O1', 'EntryDate');
// $resultPHPExcel->getActiveSheet()->setCellValue('P1', 'PriceType');

// $i = 2;

// while($item = sqlsrv_fetch_array($result)) {
// 	$resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['Brand']);
// 	$resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['Descrip']);
// 	$resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['StyleNo']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['BuyerCode']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['SKUType']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['VendorCode']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['SRP']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('H' . $i, $item['UPC']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('I' . $i, $item['UoM']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('J' . $i, $item['SKU']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('K' . $i, $item['Dept']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('L' . $i, $item['SubDept']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('M' . $i, $item['Class']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('N' . $i, $item['SubClass']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('O' . $i, $item['EntryDate']);
//     $resultPHPExcel->getActiveSheet()->setCellValue('P' . $i, $item['PriceType']);
// 	$i ++;
// }

// $outputFileName = 'NCCC REG SKU LIST.xlsx';
// $xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
// ob_start();  ob_flush();
// header("Content-Type: application/force-download");
// header("Content-Type: application/octet-stream");
// header("Content-Type: application/download");
// header('Content-Disposition:inline;filename="'.$outputFileName.'"');
// header("Content-Transfer-Encoding: binary");
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// header("Pragma: no-cache");

// $xlsWriter->save('php://output');
?>
