<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Ujian - Portal Pembelajaran Sejarah</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" />

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

    <!-- Daftar Ujian Section -->
    <section class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Daftar Ujian Anda</h3>
                <p>Berikut adalah semua ujian yang telah Anda buat.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                @forelse ($ujians as $ujian)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">{{ $ujian->judul }}</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('guru.editujian', $ujian->id) }}"><i class="fas fa-edit mr-2"></i>Edit</a>
                                            <form action="{{ route('guru.hapusujian', $ujian->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ujian ini?')">
                                                    <i class="fas fa-trash mr-2"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text text-muted">{{ $ujian->deskripsi }}</p>
                                
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge badge-primary">{{ $ujian->kategori }}</span>
                                        <small class="text-muted">{{ $ujian->soal_count }} Soal</small>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-muted"><i class="far fa-clock mr-1"></i> {{ $ujian->waktu_pengerjaan }} menit</span>
                                    </div>
                                    <div class="mt-3">
    <a href="{{ route('guru.editujian', $ujian->id) }}" class="btn btn-sm btn-primary mr-2">
        <i class="fas fa-edit mr-1"></i> Edit
    </a>
    <form action="{{ route('guru.hapusujian', $ujian->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ujian ini?')">
            <i class="fas fa-trash mr-1"></i> Hapus
        </button>
    </form>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <img src="{{ asset('images/empty-exam.svg') }}" alt="No exams" style="max-width: 300px;" class="mb-4">
                        <h5 class="text-muted">Belum ada ujian yang dibuat</h5>
                        <a href="{{ route('guru.buatujian') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus mr-2"></i> Buat Ujian Baru
                        </a>
                    </div>
                @endforelse
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
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Confirm before delete
            const deleteForms = document.querySelectorAll('form[action*="hapusujian"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus ujian ini?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>