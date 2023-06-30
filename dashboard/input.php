<?php
	// memanggil file koneksi.php
	include '../db/koneksi.php';
	
	// mendapatkan username dari session setelah login
	session_start();
	$username = $_SESSION['username'];
	
	// input dari form
	$judul = $_POST['judul'];						// mengambil data yang terinput pada field judul di form 
	$deskripsi = $_POST['deskripsi'];				// mengambil data yang terinput pada field deskripsi di form 
	$namaFile = $_FILES['file']['name'];			// mengambil data yang terinput pada field file di form 
	$namaSementara = $_FILES['file']['tmp_name'];	// penamaan file sementara sebelum diupload ke folder tujuan

	// script untuk input ke database post
	if ($_FILES['file']['type'] == "audio/mp3") {			// seleksi apakah file yang diupload berbentuk mp3
		$dirUploadAu = "../uploads/";						// menentukan folder tujuan upload
		$teruploadAu = move_uploaded_file($namaSementara, $dirUploadAu.$namaFile);	// proses upload file ke folder yang dituju
		
		mysqli_query($koneksi,"insert into post values('','$username','audio','$judul','$deskripsi','$namaFile')");		// jika file yang diupload adalah mp3 maka data dimasukkan ke database post dengan kategori post audio
		
		header("location:audio.php");

	} else {
		$dirUploadVi = "../uploads/";						// menentukan folder tujuan upload
		$teruploadVi = move_uploaded_file($namaSementara, $dirUploadVi.$namaFile);	// proses upload file ke folder yang dituju
		
		mysqli_query($koneksi,"insert into post values('','$username','video','$judul','$deskripsi','$namaFile')");		// jika file yang diupload selain mp3 maka data dimasukkan ke database post dengan kategori post video
		
		header("location:video.php");

	}
?>  