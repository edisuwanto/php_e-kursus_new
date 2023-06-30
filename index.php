<?php
	include 'db/koneksi.php';
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
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
                </button>
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
            <div class="container-fluid dashboard-content">
				<!-- ============================================================== -->
				<!-- Menampilkan Semua postingan berkategori Audio -->
				<!-- ============================================================== -->
                <div class="row" id="audio">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card" >
							<h5 class="card-header">Audio</h5>
						</div>
					</div>
				</div>
                <div class="row">
					<!-- ============================================================== -->
					<!-- Query untuk menampilakan data dari database table post yang berkategori audio -->
					<!-- ============================================================== -->
						<?php
							$data = mysqli_query($koneksi,"SELECT * FROM `post` WHERE `kat-post`='audio'");
							while($row = mysqli_fetch_array($data)){
						?>
					<!-- ============================================================== -->
					<!-- Query Selesai -->
					<!-- ============================================================== -->	
						<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="product-thumbnail">
								<div class="product-img-head">
									<div class="product-img">
										<!-- ============================================================== -->
										<!-- Menampilkan file audio sehingga bisa langsung display -->
										<!-- ============================================================== -->
										<audio style="width: 100%;" controls>
											<source src="uploads/<?php echo $row['file']; ?>" type="audio/mpeg">
											Your browser does not support the audio element.
										</audio>
										<!-- ============================================================== -->
										<!-- Display Audio Selesai -->
										<!-- ============================================================== -->
									</div>
								</div>
								<!-- ============================================================== -->
								<!-- Menampilkan Detail Posting Audio (judul dan link ke detail post) -->
								<!-- ============================================================== -->
								<div class="product-content">
									<div class="product-content-head">
										<h3 class="product-title"><?php echo $row['title']; ?></h3>
									</div>
									<div class="product-btn">
										<a href="post.php?id=<?php echo $row['id-post']; ?>" class="btn btn-primary">Details</a>
									</div>
								</div>
								<!-- ============================================================== -->
								<!-- Menampilkan Detail Selesai -->
								<!-- ============================================================== -->
							</div>
						</div>
					<?php 
						}
					?> 
				</div>
				<!-- ============================================================== -->
				<!-- Audio Selesai -->
				<!-- ============================================================== -->
				
				<!-- ============================================================== -->
				<!-- Menampilkan Semua postingan berkategori Video -->
				<!-- ============================================================== -->
                <div class="row" id="video">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card" >
							<h5 class="card-header">Video</h5>
						</div>
					</div>
				</div>
                <div class="row">
					<!-- ============================================================== -->
					<!-- Query untuk menampilakan data dari database table post yang berkategori video -->
					<!-- ============================================================== -->
						<?php
							$data = mysqli_query($koneksi,"SELECT * FROM `post` WHERE `kat-post`='video'");
							while($row = mysqli_fetch_array($data)){
						?>
					<!-- ============================================================== -->
					<!-- Query Selesai -->
					<!-- ============================================================== -->			
						<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="product-thumbnail">
								<div class="product-img-head">
									<div class="product-img">
										<!-- ============================================================== -->
										<!-- Menampilkan file video sehingga bisa langsung display -->
										<!-- ============================================================== -->
										<video width="290" height="240" controls>
										  <source src="uploads/<?php echo $row['file']; ?>" type="video/mp4">
										   Your browser does not support the video tag.
										</video>
										<!-- ============================================================== -->
										<!-- Display Video Selesai -->
										<!-- ============================================================== -->
									</div>
								</div>
								<!-- ============================================================== -->
								<!-- Menampilkan Detail Posting Video (judul dan link ke detail post) -->
								<!-- ============================================================== -->
								<div class="product-content">
									<div class="product-content-head">
										<h3 class="product-title"><?php echo $row['title']; ?></h3>
									</div>
									<div class="product-btn">
										<a href="post.php?id=<?php echo $row['id-post']; ?>" class="btn btn-primary">Details</a>
									</div>
								</div>
								<!-- ============================================================== -->
								<!-- Menampilkan Detail Selesai -->
								<!-- ============================================================== -->
							</div>
						</div>
					<?php 
						}
					?> 
				</div>
				<!-- ============================================================== -->
				<!-- Video Selesai-->
				<!-- ============================================================== -->
            </div>
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