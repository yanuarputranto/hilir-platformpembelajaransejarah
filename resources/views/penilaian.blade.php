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
    <li class="nav-item"><a class="nav-link" href="{{ route('tentang.aplikasi') }}">Tentang Aplikasi</a></li>
    <li class="nav-item  active dropdown">
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
			<h1>Penilaian HILIR</h1>
		</div>
	</div>
	
	<div id="overviews" class="section wb">
		<div class="container">
			<div class="section-title row text-center">
				<div class="col-md-8 offset-md-2">
					<p class="lead">Penilaian untuk peningkatan kualitas pembelajaran sejarah dengan menggunakan teknologi</p>
				</div>
			</div><!-- end title -->
	
			<hr class="invis">
	
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<div class="course-item">
						<div class="image-blog">
							<img src="images/hilir_1.jpg" alt="" class="img-fluid">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Sejarah Lokal</a></h2>
							</div>
							<div class="course-desc">
								<p>Pelajari sejarah daerah dengan menggunakan aplikasi AR dan data geolokasi untuk interaksi yang lebih mendalam.</p>
							</div>
							<div class="course-rating">
								4.5
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 3 Month</li>
								<li><i class="fa fa-users" aria-hidden="true"></i> 120 Student</li>
								<li><i class="fa fa-book" aria-hidden="true"></i> 5 Books</li>
							</ul>
						</div>
					</div>
				</div><!-- end col -->
	
				<div class="col-lg-3 col-md-6 col-12">
					<div class="course-item">
						<div class="image-blog">
							<img src="images/hilir_2.jpg" alt="" class="img-fluid">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Sejarah Nasional</a></h2>
							</div>
							<div class="course-desc">
								<p>Menggunakan AR untuk memvisualisasikan peristiwa-peristiwa penting dalam sejarah Indonesia.</p>
							</div>
							<div class="course-rating">
								4.7
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 6 Month</li>
								<li><i class="fa fa-users" aria-hidden="true"></i> 150 Student</li>
								<li><i class="fa fa-book" aria-hidden="true"></i> 10 Books</li>
							</ul>
						</div>
					</div>
				</div><!-- end col -->
	
				<div class="col-lg-3 col-md-6 col-12">
					<div class="course-item">
						<div class="image-blog">
							<img src="images/hilir_3.jpg" alt="" class="img-fluid">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Sejarah Dunia</a></h2>
							</div>
							<div class="course-desc">
								<p>Menelusuri peristiwa besar dunia dengan pendekatan AR dan peta geolokasi yang interaktif.</p>
							</div>
							<div class="course-rating">
								4.8
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 4 Month</li>
								<li><i class="fa fa-users" aria-hidden="true"></i> 180 Student</li>
								<li><i class="fa fa-book" aria-hidden="true"></i> 8 Books</li>
							</ul>
						</div>
					</div>
				</div><!-- end col -->
	
				<div class="col-lg-3 col-md-6 col-12">
					<div class="course-item">
						<div class="image-blog">
							<img src="images/hilir_4.jpg" alt="" class="img-fluid">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Pendidikan Sejarah</a></h2>
							</div>
							<div class="course-desc">
								<p>Memanfaatkan teknologi untuk mendalami pendidikan sejarah dengan pengalaman yang lebih mendalam.</p>
							</div>
							<div class="course-rating">
								4.6
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> 5 Month</li>
								<li><i class="fa fa-users" aria-hidden="true"></i> 200 Student</li>
								<li><i class="fa fa-book" aria-hidden="true"></i> 6 Books</li>
							</ul>
						</div>
					</div>
				</div><!-- end col -->
			</div><!-- end row -->
	
			<hr class="hr3">
	
			<div class="row">
				<!-- You can continue with more courses here if necessary -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	


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