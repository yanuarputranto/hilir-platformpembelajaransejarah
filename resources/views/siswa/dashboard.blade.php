<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Siswa - Portal Pembelajaran Sejarah</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-papmLUpLOMvVZl2NQWkYBXwKP8+AM4MC4aRAgkxSnNwMroAR7rFqKtE0xn6phQ4Em0q0tyGc42WjKIrkpQUzTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS Modernizr -->
    <script src="{{ asset('js/modernizer.js') }}" defer></script>

    <!-- HTML5 Shiv & Respond for IE8 support -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="host_version">
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
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('siswa.dashboard') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('siswa.materi') }}">Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('siswa.ujian') }}">Ujian</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('siswa.nilai') }}">Nilai</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('siswa.chatbot') }}">Chatbot AI</a></li>
                    </ul>
                    </ul>
                    <ul class="navbar-nav">
    <li>
        <a href="#" class="hover-btn-new log orange" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		@php
    $siswa = auth('siswa')->user();
@endphp

		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('{{ asset('images/gambarsejarah.jpg') }}');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
                                    <h2><strong>{{ $siswa->nama }}</strong> Selamat Datang</h2>
										<p class="lead">Ingin lebih mendalami pembelajaran sejarah dengan kami? </p>
									
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Mari Belajar</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			
			
		</div>
	</div>

    <!-- Dashboard Siswa -->
    <div id="dashboard" class="section wb">
        <div id="content-box" class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <span class="heading">
                                    <h3>Materi Sejarah</h3>
                                </span>
                                <span class="price-value">Akses Gratis<span class="month"></span> <span>Pelajari sejarah dengan mudah</span></span>
                            </div>
                            <div class="pricingContent">
                                <i class="fa fa-book"></i>
                                <ul>
                                    <li>Materi Lengkap</li>
                                    <li>Ringkasan Intuitif</li>
                                    <li>Dilengkapi AR</li>
                                    <li>Kuis Interaktif</li>
                                    <li>Materi Terbaru</li>
                                </ul>
                            </div>
                            <div class="pricingTable-sign-up">
                                <a href="{{ route('siswa.materi') }}" class="hover-btn-new orange"><span>Lihat Materi</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable pink">
                            <div class="pricingTable-header">
                                <span class="heading">
                                    <h3>Ujian</h3>
                                </span>
                                <span class="price-value">Siap Menguji?<span class="month"></span> <span>Uji pemahaman Anda</span></span>
                            </div>
                            <div class="pricingContent">
                                <i class="fa fa-pencil"></i>
                                <ul>
                                    <li>Soal Pilihan Ganda</li>
                                    <li>Latihan Interaktif</li>
                                    <li>Waktu Fleksibel</li>
                                    <li>Pembahasan Jawaban</li>
                                    <li>Skor Otomatis</li>
                                </ul>
                            </div>
                            <div class="pricingTable-sign-up">
                                <a href="{{ route('siswa.ujian') }}" class="hover-btn-new orange"><span>Kerjakan Ujian</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable orange">
                            <div class="pricingTable-header">
                                <span class="heading">
                                    <h3>Nilai</h3>
                                </span>
                                <span class="price-value">Cek Hasil<span class="month"></span> <span>Lihat perkembangan Anda</span></span>
                            </div>
                            <div class="pricingContent">
                                <i class="fa fa-line-chart"></i>
                                <ul>
                                    <li>Hasil Ujian Tersimpan</li>
                                    <li>Grafik Kemajuan</li>
                                    <li>Rincian Jawaban</li>
                                    <li>Rekomendasi Materi</li>
                                    <li>Ranking Kelas</li>
                                </ul>
                            </div>
                            <div class="pricingTable-sign-up">
                                <a href="{{ route('siswa.nilai') }}" class="hover-btn-new orange"><span>Lihat Nilai</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="pricingTable blue">
                            <div class="pricingTable-header">
                                <span class="heading">
                                    <h3>Chatbot AI</h3>
                                </span>
                                <span class="price-value">Tanya Jawab<span class="month"></span> <span>Dapatkan jawaban instan</span></span>
                            </div>
                            <div class="pricingContent">
                                <i class="fa fa-comments"></i>
                                <ul>
                                    <li>Diskusi Interaktif</li>
                                    <li>Respon Cepat</li>
                                    <li>Materi Berbasis AI</li>
                                    <li>Rekomendasi Pembelajaran</li>
                                    <li>24/7 Online</li>
                                </ul>
                            </div>
                            <div class="pricingTable-sign-up">
                                <a href="chatbot.html" class="hover-btn-new orange"><span>Mulai Chat</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pricingTable green">
                            <div class="pricingTable-header">
                                <span class="heading">
                                    <h3>Aktivitas Terbaru</h3>
                                </span>
                                <span class="price-value">Pantau Progress<span class="month"></span> <span>Perkembangan belajar Anda</span></span>
                            </div>
                            <div class="pricingContent">
                                <i class="fa fa-history"></i>
                                <ul>
                                    <li>Anda menyelesaikan ujian "Sejarah Kemerdekaan".</li>
                                    <li>Materi "Perang Dunia II" telah dibuka.</li>
                                    <li>Anda mendapatkan nilai 90 pada ujian terakhir.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard Siswa -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="footer-company-name">© 2023 Portal Pembelajaran Sejarah. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- JS Scripts -->
    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
</body>

</html>