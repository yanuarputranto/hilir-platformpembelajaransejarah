<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materi Pembelajaran - Portal Pembelajaran Sejarah</title>

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

    <!-- Materi Pembelajaran Sejarah -->
     <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Materi Pembelajaran</h3>
                    <p class="lead">Materi yang telah dipublikasikan oleh guru Anda</p>
                </div>
            </div>

            <div class="row">
                @forelse($materis as $materi)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card h-100 shadow-sm">
                    @if(!empty($materi->gambar))
    @php
        $gambar = is_array($materi->gambar) ? $materi->gambar : json_decode($materi->gambar);
    @endphp
    <img src="{{ asset('storage/' . $gambar[0]) }}" class="card-img-top" alt="Gambar Materi" style="height: 200px; object-fit: cover;">
@else
    <img src="{{ asset('images/default-materi.jpg') }}" class="card-img-top" alt="Default Materi" style="height: 200px; object-fit: cover;">
@endif
                        
                        <div class="card-body">
                            <span class="badge badge-primary mb-2">{{ $materi->kategori }}</span>
                            <h5 class="card-title">{{ $materi->judul }}</h5>
                            <p class="card-text">{{ Str::limit($materi->deskripsi, 100) }}</p>
                        </div>
                        
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt mr-1"></i> 
                                    
                                </small>
                                <a href="{{ route('siswa.materidetail', $materi->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-book-open mr-1"></i> Baca
</a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <img src="{{ asset('images/empty-materi.svg') }}" alt="Belum ada materi" style="max-width: 300px;" class="mb-4">
                    <h5 class="text-muted">Belum ada materi yang tersedia</h5>
                    <p>Guru Anda belum mempublikasikan materi apapun.</p>
                </div>
                @endforelse
            </div>

            @if($materis->hasPages())
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{ $materis->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
            @endif
        </div>
    </div>

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
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle media video
            document.querySelectorAll('.toggle-media').forEach(button => {
                button.addEventListener('click', function() {
                    const materiId = this.getAttribute('data-materi-id');
                    const mediaContainer = document.getElementById(`media-${materiId}`);
                    
                    if (mediaContainer.style.display === 'none') {
                        mediaContainer.style.display = 'block';
                        this.innerHTML = '<i class="fas fa-video mr-1"></i> Sembunyikan Media';
                    } else {
                        mediaContainer.style.display = 'none';
                        this.innerHTML = '<i class="fas fa-video mr-1"></i> Tampilkan Media';
                    }
                });
            });
            
            // Filter materi
            const searchInput = document.getElementById('searchMateri');
            const filterSelect = document.getElementById('filterKategori');
            const materiItems = document.querySelectorAll('.materi-item');
            
            function filterMateri() {
                const searchTerm = searchInput.value.toLowerCase();
                const filterValue = filterSelect.value;
                
                materiItems.forEach(item => {
                    const title = item.querySelector('.card-title').textContent.toLowerCase();
                    const desc = item.querySelector('.card-text').textContent.toLowerCase();
                    const kategori = item.getAttribute('data-kategori');
                    
                    const matchesSearch = title.includes(searchTerm) || desc.includes(searchTerm);
                    const matchesFilter = filterValue === '' || kategori === filterValue;
                    
                    if (matchesSearch && matchesFilter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
            
            searchInput.addEventListener('input', filterMateri);
            filterSelect.addEventListener('change', filterMateri);
        });
    </script>
</body>
</html>