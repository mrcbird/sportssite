<?php 
	// load hybridauth base file, change the following paths if necessary 
	// note: in your application you probably have to include these only when required.
	//$hybridauth_config = dirname(__FILE__) . '../oauth/hybridauth/hybridauth/config.php';
	$hybridauth_config = '/home/benoist/sportophile.com/oauth/hybridauth/hybridauth/config.php';
	require_once( "../oauth/hybridauth/hybridauth/Hybrid/Auth.php" );

	// database config
	$database_host = "mysql.sportophile.com"; 
	$database_user = "sport01";
	$database_pass = "j2jdh1dh1";
	$database_name = "sports01";

	$database_link = @ mysql_connect( $database_host, $database_user, $database_pass );

	if ( ! $database_link ) {
		die( "This sample requires a Mysql database. Please edit the configuration file: <b>application.config.php</b>. <hr><b>Mysql error</b>: " . mysql_error() );
	}

	$db_selected = mysql_select_db( $database_name );

	if ( ! $db_selected ) {
		die( "This sample requires a Mysql database. Please edit the configuration file: <b>application.config.php</b>. <hr><b>Mysql error</b>: " . mysql_error() );
	}

	function mysql_query_excute( $sql ){ 
		$result = mysql_query($sql);

		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $sql;
			die($message);
		}

		return $result;
	}
