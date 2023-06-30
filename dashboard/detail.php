<?php
	include '../db/koneksi.php';		// memanggil file koneksi.php
	include 'cek-login.php';			// mengecek status login
	$username = $_SESSION['username'];	// mendapatkan username saat sudah login
	
	$id = $_GET['id'];					// mendapatkan nilai id dari URL
	$data = mysqli_query($koneksi,"SELECT * FROM `post` WHERE `id-post`='$id'");	// query untuk mendapatkan detail post berdasarkan id-post
	while($d = mysqli_fetch_array($data)){
		$judul=$d['title'];				// menampilkan judul
		$deskripsi=$d['desc'];			// menampilkan deskripsi
		$filename=$d['file'];			// menampilkan nama file
		$kat=$d['kat-post'];			// menampilkan kategori post
	}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Dashboard eKursus</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
		<!-- ============================================================== -->
		<!-- Menu Utama -->
		<!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">eKursus</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
						<li class="nav-item">
                           <a class="nav-link nav-icons" href="index.php"> Selamat Datang, <?php  echo $username ?></a>
                        </li>
						<li class="nav-item">
                           <a class="nav-link nav-icons" href="../logout.php"><i class="fas fa-fw fa-key"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
		<!-- ============================================================== -->
		<!-- Menu Utama Selesai-->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!-- Menu Sidebar -->
		<!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Audio</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="audio.php">Audio </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="add-audio.php">Add Audio</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Video</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="video.php">Video </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="add-video.php">Add Video</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
		<!-- ============================================================== -->
		<!-- Menu Sidebar Selesai-->
		<!-- ============================================================== -->
		
        <div class="dashboard-wrapper">
			<!-- ============================================================== -->
			<!-- Menampilkan detail dari posting audio/video -->
			<!-- ============================================================== -->
            <div class="container-fluid  dashboard-content">
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="page-header">
							<h2 class="pageheader-title">Post</h2>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Post Detail</a></li>
										<li class="breadcrumb-item active" aria-current="page"><?php echo $judul; ?></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
								<!-- ============================================================== -->
								<!-- Script untuk menampilkan file audio atau video dengan cara selekse dari kategori posting -->
								<!-- ============================================================== -->
								<?php if ($kat=="audio"){ ?>
									<audio style="width: 100%;" controls>
										<source src="../uploads/<?php echo $filename; ?>" type="audio/mpeg">
										Your browser does not support the audio element.
									</audio>
								<?php } else { ?>
									<video style="width: 100%;" controls>
									  <source src="../uploads/<?php echo $filename; ?>" type="video/mp4">
									   Your browser does not support the video tag.
									</video>
								<?php } ?>
								<!-- ============================================================== -->
								<!-- Script selesai -->
								<!-- ============================================================== -->
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
								<div class="product-details">
									<div class="border-bottom pb-3 mb-3">
										<h2 class="mb-3"><?php echo $judul; ?></h2>
									</div>
									<div class="product-description">
										<h4 class="mb-1">Descriptions</h4>
										<p><?php echo $deskripsi; ?></p>
										<a href="delete.php?id=<?php echo $id; ?>" class="btn btn-primary btn-block btn-lg">Delete</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			<!-- ============================================================== -->
			<!-- Menampilkan detail selesai -->
			<!-- ============================================================== -->
			
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2020 eKursus.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 js-->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstrap bundle js-->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js-->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js-->
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>