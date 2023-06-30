<?php 
include 'db/koneksi.php'; 			// memanggil file koneksi.php

$username = $_POST['username'];		// mengambil data yang terinput pada field username di form 
$password = $_POST['password'];		// mengambil data yang terinput pada field password di form

$query = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");	//query untuk mendapatkan data dari database dengan syarat user dan pass yang sudah dinputkan 
$cek = mysqli_num_rows($query);		// mengecek apakah ada data yang terseleksi

//mengecek hasil dari query
if($cek > 0){						// jika hasilnya lebih dari 0 atau ada data maka dilakukan session untuk login		
	session_start();
	$_SESSION['username'] = $username;		// session username digunakan untuk mencetak username ketika sudah login
	$_SESSION['status'] = 'login';			// session login untuk mengecek apakah user telah login atau belum
	header("location:dashboard/index.php");	// redirect ke halaman dashboard
}else{
	header("location:index.php");			// redirect ke halaman login jika user+pass yang dimasukkan salah
}
?>