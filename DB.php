<?php

// $serverName = "Server-ac";

// $connectionOptions = array (
// 		"Database" => "nccc",
// 		"UID"=>"sa", 
// 		"PWD"=>"p@ssw0rd"
// );

// $nccc_conn = sqlsrv_connect ( $serverName, $connectionOptions );

// if ($nccc_conn === false) {
// 	die ( print_r ( sqlsrv_errors (), true ) );
// }

//localserver connection
$serverName = "DESKTOP-HV1GMNM\LOCALSERVER";

$connectionOptions = array (
		"Database" => "nccc",
		"UID"=>"sa",
		"PWD"=>"p@ssw0rd"
);

$nccc_conn = sqlsrv_connect ( $serverName, $connectionOptions );

if ($nccc_conn === false) {
	die ( print_r ( sqlsrv_errors (), true ) );
}

?>