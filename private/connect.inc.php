<?php
//create connection
session_start();

$dbserverName = "localhost";
$dbuserName = "root";
$dbpassword = "";
$dbName = "shop";

$con = mysqli_connect($dbserverName, $dbuserName, $dbpassword, $dbName);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}