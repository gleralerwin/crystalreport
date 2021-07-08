<?php

$serverName = "server-wb";
$connectionOptions = array (
		"Database" => "",
		"UID"=>"sa", 
		"PWD"=>"root"
);

$serverwb_conn = sqlsrv_connect ( $serverName, $connectionOptions );

if ($serverwb_conn === false) {
	die ( print_r ( sqlsrv_errors (), true ) );
}


?>