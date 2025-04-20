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
    <li class="nav-item active"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('tentang.aplikasi') }}">Tentang Aplikasi</a></li>
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
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider-01.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
										<h2><strong></strong> Selamat Datang</h2>
										<p class="lead">Solusi pembelajaran terpadu untuk jadi lebih mudah dan menyenangkan</p>
											<a href="#" class="hover-btn-new"><span>Galeri</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Artikel</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-02.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-left">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong></strong></h2>
										<p class="lead" data-animation="animated fadeInLeft"> </p>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-03.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong>Bangun Masa Depan Pendidikan Bersama Kami</strong></h2>
										<p class="lead" data-animation="animated fadeInLeft">Platform belajar digital yang membantu guru mengajar dan siswa belajar dengan mudah, efisien, dan menyenangkan.</p>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Tentang HILIR</h3>
                    <p class="lead">HILIR adalah platform edukasi berbasis digital yang dirancang untuk mempermudah proses belajar mengajar melalui fitur-fitur interaktif seperti pembuatan materi, ujian, dan penilaian otomatis. Hadir untuk mendukung digitalisasi pendidikan dan mempermudah guru serta siswa dalam proses pembelajaran daring maupun luring.</p>
                </div>
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>Fitur Unggulan HILIR</h4>
                        <h2>Buat Materi Pembelajaran</h2>
                        <p>Susun materi pembelajaran digital dengan mudah dan fleksibel. Materi dapat berupa teks, gambar, video, dan tautan eksternal yang disusun secara terstruktur. Guru dapat mengelompokkan materi berdasarkan topik dan kurikulum sehingga siswa dapat belajar secara mandiri, kapan saja dan di mana saja.</p>

                        <p>Fitur ini mendukung pembelajaran yang dinamis dan memudahkan distribusi materi tanpa perlu media cetak. Ideal untuk pembelajaran jarak jauh maupun tatap muka.</p>

                        <a href="#" class="hover-btn-new orange"><span>Pelajari Selengkapnya</span></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/blog_1.jpg" alt="" class="img-fluid img-rounded">
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/blog_2.jpg" alt="" class="img-fluid img-rounded">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Buat Ujian dengan Mudah</h2>
                        <p>Rancang soal pilihan ganda, isian singkat, atau esai dalam hitungan menit. Guru dapat mengatur jadwal ujian, durasi, serta kunci jawaban untuk koreksi otomatis. Soal dapat disimpan dalam bank soal pribadi untuk digunakan kembali kapan saja.</p>

                        <p>Dengan antarmuka yang intuitif, fitur ini mempermudah guru melakukan evaluasi pembelajaran secara daring maupun luring. Siswa cukup mengakses ujian melalui perangkat digital mereka.</p>

                        <a href="#" class="hover-btn-new orange"><span>Pelajari Selengkapnya</span></a>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Penilaian Otomatis dan Transparan</h2>
                        <p>Setelah ujian selesai, sistem secara otomatis memberikan nilai kepada siswa berdasarkan kunci jawaban yang telah ditentukan. Guru dapat melihat hasil dalam bentuk grafik atau tabel, serta mengunduh laporan nilai jika diperlukan.</p>

                        <p>Fitur ini sangat membantu guru dalam menghemat waktu, menghindari kesalahan koreksi manual, dan memberikan hasil penilaian yang objektif. Nilai siswa dapat langsung diketahui setelah ujian selesai.</p>

                        <a href="#" class="hover-btn-new orange"><span>Pelajari Selengkapnya</span></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/blog_3.jpg" alt="" class="img-fluid img-rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section lb page-section">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Perjalanan HILIR</h3>
                    <p class="lead">Berawal dari ide sederhana untuk mendekatkan edukasi dengan teknologi, HILIR terus berkembang menjadi platform yang membantu proses belajar-mengajar menjadi lebih efektif dan menyenangkan.</p>
                </div>
            </div>
            <div class="timeline">
                <div class="timeline__wrap">
                    <div class="timeline__items">
                        <div class="timeline__item">
                            <div class="timeline__content img-bg-01">
                                <h2>Februari 2025</h2>
                                <p>Ide awal HILIR muncul dari diskusi kecil antara mahasiswa tentang pembelajaran digital di dunia pendidikan.</p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg-02">
                                <h2> Maret 2025</h2>
                                <p>Mulai dikembangkan sebagai prototipe aplikasi sederhana dengan fokus pada pembuatan materi digital untuk guru.</p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg-03">
                                <h2>April 2025</h2>
                                <p>Fitur ujian dan penilaian otomatis ditambahkan. Pengujian dilakukan di beberapa sekolah dengan respons positif.</p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg-04">
                                <h2>Mei 2025</h2>
                                <p>HILIR resmi diluncurkan sebagai platform edukasi daring yang inklusif, interaktif, dan mudah digunakan oleh semua kalangan pendidik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


	<div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
					<p class="stat_count">579</p>
					<h3>Pengguna Terdaftar</h3>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
					<p class="stat_count">50</p>
					<h3>Materi Sejarah</h3>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
					<p class="stat_count">2025</p>
					<h3>Hadir Sejak</h3>
				</div>
			</div>
		</div>
	</div>

<!-- ========== BAGIAN TESTIMONIAL ========== -->
<div id="testimonials" class="parallax section db parallax-off" style="background-image:url('images/parallax_04.jpg');">
    <div class="container">
        <div class="section-title text-center">
            <h3>Pendapat Mereka tentang HILIR </h3>
            <p>Testimoni dari para pengguna yang telah merasakan manfaat HILIR dalam pembelajaran sejarah secara interaktif dan menyenangkan</p>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    <div class="testimonial clearfix">
                        <div class="testi-meta">
                            <img src="images/testi_01.png" alt="" class="img-fluid">
                            <h4>Suharto</h4>
                        </div>
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Pembelajaran Jadi Seru!</h3>
                            <p class="lead">Dengan HILIR, saya bisa belajar sejarah lokal dengan lebih hidup. Fitur AR dan kuisnya sangat membantu saya memahami materi.</p>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="testi-meta">
                            <img src="images/testi_02.png" alt="" class="img-fluid">
                            <h4>Pangeran Pattimura</h4>
                        </div>
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Cocok untuk Pelajar!</h3>
                            <p class="lead">Sebagai guru, saya merasa HILIR mempermudah saya menjelaskan sejarah daerah kepada siswa dengan cara yang menarik.</p>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="testi-meta">
                            <img src="images/testi_03.png" alt="" class="img-fluid">
                            <h4>Cut Nyak Dien</h4>
                        </div>
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Inovatif dan Interaktif</h3>
                            <p class="lead">Saya baru tahu belajar sejarah bisa semenarik ini. Aplikasi dan web HILIR sangat membantu mengenal budaya lokal saya sendiri.</p>
                        </div>
                    </div>
                </div><!-- end carousel -->
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