<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Materi - Portal Pembelajaran Sejarah</title>

    <!-- Icons and CSS (same as before) -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <!-- Detail Materi Section -->
    <div class="section lb">
        <div class="container">
            @if(!isset($materi) || is_null($materi))
                <div class="alert alert-danger">
                    Materi tidak ditemukan atau tidak tersedia.
                </div>
            @else
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        @php
                            $gambar = [];
                            try {
                                $gambar = is_array($materi->gambar) ? $materi->gambar : json_decode($materi->gambar, true);
                                $gambar = is_array($gambar) ? $gambar : [];
                            } catch (Exception $e) {
                                $gambar = [];
                            }
                        @endphp

                        @if(!empty($gambar) && count($gambar) > 0)
                        <div id="materiCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($gambar as $index => $path)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $path) }}" class="d-block w-100 materi-gambar" alt="Gambar Materi" 
                                         onerror="this.onerror=null;this.src='{{ asset('images/default-materi.jpg') }}'">
                                </div>
                                @endforeach
                            </div>
                            @if(count($gambar) > 1)
                            <a class="carousel-control-prev" href="#materiCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#materiCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                            @endif
                        </div>
                        @else
                        <img src="{{ asset('images/default-materi.jpg') }}" class="card-img-top materi-gambar" alt="Default Materi">
                        @endif
                        
                        <div class="card-body">
                            <span class="badge badge-primary">{{ $materi->kategori ?? 'Tanpa Kategori' }}</span>
                            <h1 class="my-3">{{ $materi->judul ?? 'Judul Tidak Tersedia' }}</h1>
                            
                            
                            
                            <div class="materi-content my-4">
                                {!! nl2br(e($materi->deskripsi ?? 'Deskripsi materi tidak tersedia')) !!}
                            </div>
                            
                            @if(!empty($materi->file_pdf) && file_exists(public_path('storage/' . $materi->file_pdf)))
                            <div class="mt-4">
                                <a href="{{ asset('storage/' . $materi->file_pdf) }}" class="btn btn-primary" target="_blank" download>
                                    <i class="fas fa-file-pdf mr-2"></i> Unduh PDF
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Media Tambahan</h5>
                        </div>
                        <div class="card-body">
                            @if(!empty($materi->file_video) && file_exists(public_path('storage/' . $materi->file_video)))
                            <div class="mb-3">
                                <h6>Video Materi</h6>
                                <video controls class="w-100">
                                    <source src="{{ asset('storage/' . $materi->file_video) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutaran video.
                                </video>
                            </div>
                            @endif
                            
                            @if(!empty($materi->link_video))
    @php
        // Ekstrak ID video dari link YouTube biasa
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $materi->link_video, $matches);
        $videoId = $matches[1] ?? null;
        $embedUrl = $videoId ? 'https://www.youtube.com/embed/' . $videoId : $materi->link_video;
    @endphp
    <div class="mb-3">
        <h6>Video Eksternal</h6>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $embedUrl }}" allowfullscreen></iframe>
        </div>
    </div>
@endif
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-body">
                            <a href="{{ route('siswa.materi') }}" class="btn btn-outline-primary btn-block">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Materi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Footer (same as before) -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="footer-company-name">© 2023 Portal Pembelajaran Sejarah. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- JS Scripts (same as before) -->
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <style>
        .materi-gambar {
            max-width: 100%;
            height: 300px;
            width: auto;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
    </style>
</body>
</html>