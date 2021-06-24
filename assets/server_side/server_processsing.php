<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'tblsku';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'Brand', 'dt' => 0),
    array('db' => 'Descrip', 'dt' => 1),
    array('db' => 'StyleNo', 'dt' => 2),
    array('db' => 'BuyerCode', 'dt' => 3),
    array('db' => 'SKUType', 'dt' => 4),
    array('db' => 'VendorCode', 'dt' => 5),
    array('db' => 'SRP', 'dt' => 6),
    array('db' => 'UPC', 'dt' => 7),
    array('db' => 'Uom', 'dt' => 8),
    array('db' => 'SKU', 'dt' => 9),
    array('db' => 'SubDept', 'dt' => 10),
    array('db' => 'Class', 'dt' => 11),
    array('db' => 'SubClass', 'dt' => 12),
    array('db' => 'PriceType', 'dt' => 13)
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'sa',
    'pass' => 'Sweet',
    'db'   => 'nccc',
    'host' => 'Server-ac'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( './assets/server_side/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);