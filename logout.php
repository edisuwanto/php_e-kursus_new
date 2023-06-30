<?php
session_start();
session_destroy();				//menghapus session yang sudah ada pada saat login
header("location:index.php");	// redirect ke halaman login setelah proses logout
?>