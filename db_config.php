<?php

// Modify variables

$db_user = '1336631';
$db_host = 'localhost';
$db_password = 'crusaders14';
$db_database = '1336631';

// Creates Connection
$conn = new mysqli( $db_host, $db_user, $db_password, $db_database );

if ( $conn->connect_error ) {
	die( "Connection failed: " . $conn->connect_error );
}
