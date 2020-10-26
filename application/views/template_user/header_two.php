<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="author" content="Nuzul Ramadhan" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title><?= $title ?></title>

	<!-- Custom CSS -->
	<link href="<?= base_url() ?>global/css/styles.css" rel="stylesheet">
	<link href="<?= base_url() ?>global/css/colors.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>global/css/custom.css">
	<link rel="stylesheet" href="https://swiperjs.com/package/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css"
		integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg=="
		crossorigin="anonymous" />
</head>
	
    <body class="yellow-skin">
       <div class="preloader"></div>
        <div id="main-wrapper">
		
			<div class="top-header">
				<div class="container">
					<div class="row">
					
						<div class="col-lg-6 col-md-6">
							<div class="cn-info">
								<ul>
									<li><i class="fa fa-phone"></i>91 256 584 5748</li>
									<li><i class="fa fa-envelope"></i>support@nuzul.space</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<ul class="top-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			
            <!-- Start Navigation -->
		<div class="header header-dark light-text">
			<div class="container">
				<nav id="navigation" class="navigation navigation-landscape">
					<div class="nav-header">
						<a class="nav-brand" href="#">
							<img src="<?= base_url() ?>global/img/logo-brand1.png" class="logo" alt="" />
						</a>
						<div class="nav-toggle"></div>
					</div>
					<div class="nav-menus-wrapper" style="transition-property: none;">
						<ul class="nav-menu">

						<li><a href="<?php echo base_url("Home")?>">Beranda</a></li>
							<li><a href="#">Tentang Kami</a></li>
							<li><a href="<?php echo base_url("Listing")?>">Listing</a></li>

							<li><a href="#">Beli<span class="submenu-indicator"></span></a>
								<ul class="nav-dropdown nav-submenu">
									<li><a href="#">Rumah</a></li>
									<li><a href="#">Apartement</a></li>
									<li><a href="#">Kantor</a></li>
									<li><a href="#">Tanah</a></li>
								</ul>
							</li>

							<li><a href="#">KPR</a></li>
							<li><a href="#">Kontak Kami</a></li>

						</ul>

					</div>
				</nav>
			</div>
		</div>