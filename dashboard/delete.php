<?php 
// koneksi database
include '../db/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// query untuk mendapatkan filename post berdasarkan id-post
$data = mysqli_query($koneksi,"SELECT * FROM `post` WHERE `id-post`='$id'");	
while($d = mysqli_fetch_array($data)){
	$filename=$d['file'];			
}

// menghapus file dari folder
$myFile = "../uploads/".$filename;
unlink($myFile) or die("Couldn't delete file");

// menghapus data dari database
mysqli_query($koneksi,"delete from post where `id-post`='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>