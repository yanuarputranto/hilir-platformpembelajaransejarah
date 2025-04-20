<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="logout.html"><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Daftar Ujian Section -->
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Daftar Ujian<span class="m_1">Pilih ujian yang tersedia untuk menguji pemahaman Anda tentang sejarah.</span></h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Berikut adalah daftar ujian sejarah yang dapat Anda ikuti. Pilih ujian yang sesuai dengan materi yang telah dipelajari.</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <!-- Daftar Ujian -->
            <div class="row">
                <!-- Daftar Ujian -->
<div class="row">
    @foreach($ujians as $ujian)
    <div class="col-lg-4 col-md-6 col-12">
        <div class="blog-item">
            <div class="image-blog">
               
            </div>
            <div class="meta-info-blog">
               
                <span><i class="fa fa-tag"></i> <a href="#">{{ $ujian->kategori }}</a> </span>
            </div>
            <div class="blog-title">
                <h2><a href="#" title="">{{ $ujian->judul }}</a></h2>
            </div>
            <div class="blog-desc">
                <p>{{ $ujian->deskripsi }}</p>
            </div>
            <div class="blog-button">
                <a class="hover-btn-new orange" href="{{ route('siswa.ujiandetail', $ujian->id) }}"><span>Mulai Ujian</span></a>
            </div>
        </div>
    </div><!-- end col -->
    @endforeach
</div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr3">

            <!-- Baris Kedua Daftar Ujian -->
            
        </div><!-- end container -->
    </div><!-- end section -->

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