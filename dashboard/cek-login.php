<?php

// melakukan pengecekan status session dari proses login
session_start();
if($_SESSION['status'] == ""){				// jika status sessinnya kosong
	header("location:../login.php");  		// maka akan di redirect ke halaman login
}

// berguna untuk mencegah orang yang belum login mengakses halaman dashboard
?>