<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include './inc/nccc_db.php';
require './PHPExcel/Classes/PHPExcel.php';
require './PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';

$sql = 'SELECT * FROM tblSKU ORDER BY id ASC';
$result = sqlsrv_query($nccc_conn, $sql);

header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=$filename");
header('Cache-Control: max-age=0');

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Brand');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Descrip');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'StyleNo');
$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);

$rowCount = 1; 
while($row = sqlsrv_fetch_array($result))
{
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['Brand']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['Descrip']); 
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['StyleNo']); 
    $rowCount++; 
}

$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
$writer->save('php://output');
exit;

?>