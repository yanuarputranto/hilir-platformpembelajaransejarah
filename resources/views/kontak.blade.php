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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Fitur</a>
        <div class="dropdown-menu" aria-labelledby="dropdown-a">
            <a class="dropdown-item" href="{{ route('buat.materi') }}">Buat Materi</a>
            <a class="dropdown-item" href="{{ route('buat.ujian') }}">Buat Ujian</a>
            <a class="dropdown-item" href="{{ route('penilaian') }}">Penilaian</a>
        </div>
    </li>
    <li class="nav-item active"><a class="nav-link" href="/kontak">Kontak</a></li>
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
			<h1>Kontak Kami<span class="m_1">Hubungi kami untuk pertanyaan, bantuan, atau kerja sama lebih lanjut.</span></h1>
		</div>
	</div>
	
	<div id="contact" class="section wb">
		<div class="container">
			<div class="section-title text-center">
				<h3>Butuh Bantuan? Kami Siap Membantu!</h3>
				<p class="lead">Silakan isi formulir di bawah ini untuk menghubungi kami. Kami akan segera merespons setiap pertanyaan atau permintaan Anda.</p>
			</div><!-- end title -->
	
			<div class="row">
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="contact_form">
						<div id="message"></div>
						<form id="contactform" class="" action="contact.php" name="contactform" method="post">
							<div class="row row-fluid">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nama Depan">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Nama Belakang">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email Anda">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Tulis pesan Anda di sini..."></textarea>
								</div>
								<div class="text-center pd">
									<button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Kirim Pesan</button>
								</div>
							</div>
						</form>
					</div>
				</div><!-- end col -->
	
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="map-box">
						<iframe 
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8393850253053!2d112.61424507405796!3d-7.812933692192555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827a93470dfd%3A0x86f02b16144910b3!2sUniversitas%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1713517214964!5m2!1sid!2sid" 
							width="100%" 
							height="400" 
							style="border:0;" 
							allowfullscreen="" 
							loading="lazy" 
							referrerpolicy="no-referrer-when-downgrade">
						</iframe>
					</div>
				</div>
				
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