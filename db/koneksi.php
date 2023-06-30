<?php
//database Host
	$dbhost = "localhost";
//username for db
	$dbuser = "root";
//password for db
	$dbpass = "";
//database Name
	$dbname = "ekursus";
	
//loginSeed
//Connect to MySQL Server
	$koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// cek koneksi
if (mysqli_connect_errno())
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

?>