<?php
	include 'db/koneksi.php';			// memanggil file koneksi.php
	
	$id = $_GET['id'];					// mendapatkan nilai id dari URL
	$data = mysqli_query($koneksi,"SELECT * FROM `post` WHERE `id-post`='$id'"); 	// query untuk mendapatkan detail post berdasarkan id-post
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
    <title>e-Kursus -  Tempat Belajar Bersama</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
		<!-- ============================================================== -->
		<!-- Menu Utama -->
		<!-- ============================================================== -->
       <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">eKursus</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                           <a class="nav-link nav-icons" href="index.php#audio"><i class="fas fa-fw fa-music"></i> Audio</a>
                        </li>
						<li class="nav-item">
                           <a class="nav-link nav-icons" href="index.php#video"><i class="fas fa-fw fa-video"></i> Video</a>
                        </li>
						<li class="nav-item">
                           <a class="nav-link nav-icons" href="login.php"><i class="fas fa-fw fa-key"></i> Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
		<!-- ============================================================== -->
		<!-- Menu Utama Selesai-->
		<!-- ============================================================== -->
		
        <div class="dashboard-wrapper-up">
			<!-- ============================================================== -->
			<!-- Menampilkan detail dari posting audio/video -->
			<!-- ============================================================== -->
            <div class="container-fluid dashboard-content">
				<div class="row">
					<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
						<!-- ============================================================== -->
						<!-- Script untuk menampilkan file audio atau video dengan cara selekse dari kategori posting -->
						<!-- ============================================================== -->
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
								<?php if ($kat=="audio"){ ?>
									<audio style="width: 100%;" controls>
										<source src="uploads/<?php echo $filename; ?>" type="audio/mpeg">
										Your browser does not support the audio element.
									</audio>
								<?php } else { ?>
									<video style="width: 100%;" controls>
									  <source src="uploads/<?php echo $filename; ?>" type="video/mp4">
									   Your browser does not support the video tag.
									</video>
								<?php } ?>
							</div>
						</div>
						<!-- ============================================================== -->
						<!-- Script selesai -->
						<!-- ============================================================== -->
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
								<div class="product-details">
									<div class="border-bottom pb-3 mb-3">
										<h2 class="mb-3"><?php echo $judul; ?></h2>
									</div>
									<div class="product-description">
										<h4 class="mb-1">Descriptions</h4>
										<p><?php echo $deskripsi; ?></p>
										<a href="download.php?filename=<?php echo $filename; ?>" class="btn btn-primary btn-block btn-lg">Download</a>
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
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2020 eKursus.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
 
</html>