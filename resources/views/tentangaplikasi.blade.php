<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
     <title>HILIR-PLATFORM EDUKASI SEJARAH</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Customer Login</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registration</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Email" type="email">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Submit
									</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Mobile" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Save &amp; Continue
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
    <li class="nav-item active""><a class="nav-link" href="{{ route('tentang.aplikasi') }}">Tentang Aplikasi</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Fitur</a>
        <div class="dropdown-menu" aria-labelledby="dropdown-a">
            <a class="dropdown-item" href="{{ route('buat.materi') }}">Buat Materi</a>
            <a class="dropdown-item" href="{{ route('buat.ujian') }}">Buat Ujian</a>
            <a class="dropdown-item" href="{{ route('penilaian') }}">Penilaian</a>
        </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
</ul>

<!-- Tambahan tombol DAFTAR/LOGIN -->
<ul class="nav navbar-nav navbar-right">
    <li>
        <a class="hover-btn-new log orange" href="/login" data-toggle="" data-target="">
            <span>DAFTAR/LOGIN</span>
        </a>
    </li>
</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div class="all-title-box">
		<div class="container text-center">
		</div>
	</div>
	
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Tentang Aplikasi</h3>
                </div>
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>Menjelajahi Sejarah Nusantara</h4>
                        <h2>Belajar Sejarah Jadi Lebih Menarik</h2>
                        <p><strong>HILIR</strong> adalah aplikasi edukasi sejarah berbasis digital yang dirancang untuk memperkenalkan sejarah lokal Indonesia kepada generasi muda dengan cara yang menyenangkan dan interaktif.</p>
    
                        <p>Melalui fitur peta interaktif, teknologi Augmented Reality (AR), dan konten multimedia yang menarik, HILIR menghadirkan pengalaman belajar sejarah yang tak hanya informatif tetapi juga menghibur. Pengguna dapat menjelajahi berbagai situs bersejarah, mengenal tokoh-tokoh penting, serta memahami konteks budaya secara mendalam.</p>
    
                        <a href="#" class="hover-btn-new orange"><span>Pelajari Lebih Lanjut</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/about_02.jpg" alt="Ilustrasi aplikasi HILIR" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
            </div>
    
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/about_03.jpg" alt="Fitur edukatif HILIR" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Teknologi Bertemu Warisan Budaya</h2>
                        <p>HILIR tidak hanya menyajikan fakta sejarah, tetapi juga membangun narasi yang hidup dan mudah dipahami. Kami percaya bahwa sejarah adalah bagian penting dari identitas bangsa, dan memahami sejarah berarti menghargai akar budaya kita sendiri.</p>
    
                        <p>Dengan pendekatan visual dan pengalaman digital yang mendalam, HILIR cocok digunakan oleh pelajar, pendidik, maupun masyarakat umum yang ingin belajar sejarah secara fleksibel di mana saja dan kapan saja.</p>
    
                        <a href="#" class="hover-btn-new orange"><span>Pelajari Lebih Lanjut</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    
	
    <div class="hmv-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
                        <h3>Misi</h3>
                        <div class="tr-pa">M</div>
                        <p>Memberikan akses edukasi sejarah yang mudah, menarik, dan interaktif bagi generasi muda Indonesia. HILIR hadir untuk membangun kesadaran sejarah dan kebudayaan lokal melalui pendekatan digital berbasis teknologi terbaru.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
                        <h3>Visi</h3>
                        <div class="tr-pa">V</div>
                        <p>Menjadi platform digital terdepan dalam pelestarian dan edukasi sejarah Indonesia, yang menjangkau masyarakat luas dengan konten yang inovatif, akurat, dan inspiratif.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="flaticon-history"></i></div>
                        <h3>Sejarah</h3>
                        <div class="tr-pa">H</div>
                        <p>HILIR lahir dari keprihatinan akan minimnya ketertarikan generasi muda terhadap sejarah lokal. Dengan memanfaatkan teknologi seperti AR dan geolokasi, HILIR mulai dikembangkan sebagai solusi edukasi sejarah yang lebih kontekstual dan menyenangkan sejak tahun 2025.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


<!-- ========== BAGIAN FOOTER ========== -->
<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Tentang HILIR</h3>
                    </div>
                    <p>HILIR adalah portal pembelajaran sejarah interaktif yang mengajak generasi muda mengenal warisan budaya lokal melalui teknologi dan pendekatan kreatif.</p>
                    <div class="footer-right">
                        <ul class="footer-links-soi">
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>						
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Tautan Penting</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Web</a></li>
                        <li><a href="#">Alamat</a></li>
                        <li><a href="#">Hubungi</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Kontak</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#">info@hilirsejarah.id</a></li>
                        <li><a href="#">www.hilirsejarah.id</a></li>
                        <li>Jl. Warisan Budaya No. 12, Malang, Indonesia</li>
                        <li>+62 85795767784</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- ========== COPYRIGHT ========== -->
<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-center">                   
                <p class="footer-company-name">Hak Cipta &copy; 2025 <a href="#">HILIR</a>. Desain oleh Tim HILIR & Kontributor Edukasi Digital.</p>
            </div>
        </div>
    </div>
</div>
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>