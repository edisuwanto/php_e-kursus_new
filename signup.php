<?php
	include 'db/koneksi.php';		// memanggil file koneksi.php

	$username = $_POST['user'];		// mengambil inputan username dari form register
	$password = $_POST['pass'];		// mengambil inputan password dari form register
	$email = $_POST['email'];		// mengambil inputan email dari form register
	
	mysqli_query($koneksi,"insert into user values('','$username','$password','$email')");		// memasukkan data dari inputan form register ke database user
	header("location:login.php");	// redirect ke halaman login setelah berhasil register
?>  