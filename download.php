<?php 
    if (isset($_GET['filename'])) {
		$filename    = $_GET['filename'];			// mendapatkan nilai filename dari URL

		$back_dir    ="uploads/";					// menentukan folder lokasi file berada
		$file = $back_dir.$_GET['filename'];		// address lengkap file
			
			// script untuk download file
			if (file_exists($file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: private');
				header('Pragma: private');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				
				exit;
			} 
			else {
				$_SESSION['pesan'] = "Oops! File - $filename - not found ...";
				header("location:index.php");
			}
			// script untuk download file selesai
    }
?>