<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Guru - Portal Pembelajaran Sejarah</title>

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

    <!-- Loader -->
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('index.html') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                    aria-controls="navbars-host" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.dashboard') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.buatmateri') }}">Buat Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.buatujian') }}">Buat Ujian</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.daftarujian') }}">Daftar Ujian</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.penilaian') }}">Lihat Nilai</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.chatbot') }}">Chatbot AI</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li><a class="hover-btn-new log orange" href="{{ url('logout.html') }}"><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Carousel Banner -->
    <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel"
        data-pause="hover" data-interval="false">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div id="home" class="first-section" style="background-image:url('{{ asset('images/Untitled-design.jpg') }}');">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="big-tagline">
                                        <h2><strong>Guru Sejarah</strong> Selamat Datang</h2>
                                        <p class="lead">Selamat datang di dashboard guru. Mari kelola pembelajaran sejarah dengan mudah!</p>
                                        <a href="{{ url('buat-materi.html') }}" class="hover-btn-new"><span>Mulai</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Guru Section -->
    <section id="dashboard" class="section wb">
        <div class="container">
            <div class="row">
                <!-- Buat Materi -->
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <p>Buat Materi Baru <br><small>Bagikan pengetahuan Anda</small></p>
                        </div>
                        <div class="pricingContent">
                            <i class="fa fa-book"></i>
                            <ul>
                                <li>Upload Materi</li>
                                <li>Tambahkan Ringkasan</li>
                                <li>Integrasikan Media</li>
                                <li>Atur Jadwal Publikasi</li>
                                <li>Pantau Penggunaan Materi</li>
                            </ul>
                        </div>
                        <div class="pricingTable-sign-up">
                            <a href="{{ route('guru.buatmateri') }}" class="hover-btn-new orange"><span>Buat Materi</span></a>
                        </div>
                    </div>
                </div>

                <!-- Buat Ujian -->
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable pink">
                        <div class="pricingTable-header">
                            <p>Buat Ujian Baru <br><small>Uji pemahaman siswa</small></p>
                        </div>
                        <div class="pricingContent">
                            <i class="fa fa-pencil"></i>
                            <ul>
                                <li>Soal Pilihan Ganda</li>
                                <li>Soal Essay</li>
                                <li>Atur Waktu Ujian</li>
                                <li>Analisis Hasil Ujian</li>
                                <li>Skor Otomatis</li>
                            </ul>
                        </div>
                        <div class="pricingTable-sign-up">
                            <a href="{{ route('guru.buatujian') }}" class="hover-btn-new orange"><span>Buat Ujian</span></a>
                        </div>
                    </div>
                </div>

                <!-- Lihat Nilai -->
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable orange">
                        <div class="pricingTable-header">
                            <p>Pantau Nilai Siswa <br><small>Lihat perkembangan siswa</small></p>
                        </div>
                        <div class="pricingContent">
                            <i class="fa fa-line-chart"></i>
                            <ul>
                                <li>Hasil Ujian Siswa</li>
                                <li>Grafik Kemajuan Kelas</li>
                                <li>Rincian Jawaban</li>
                                <li>Rekomendasi Perbaikan</li>
                                <li>Ekspor Data Nilai</li>
                            </ul>
                        </div>
                        <div class="pricingTable-sign-up">
                            <a href="{{ route('guru.penilaian') }}" class="hover-btn-new orange"><span>Lihat Nilai</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="footer-company-name">© 2023 Portal Pembelajaran Sejarah. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scroll to top -->
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- JS Scripts -->
    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
</body>

</html>
