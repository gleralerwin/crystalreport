<?php

$serverName = "server-wb";
$connectionOptions = array (
		"Database" => "IRMS-DB",
		"UID"=>"sa", 
		"PWD"=>"root"
);

$server_wbconn = sqlsrv_connect ( $serverName, $connectionOptions );

if ($server_wbconn === false) {
	die ( print_r ( sqlsrv_errors (), true ) );
}


?>