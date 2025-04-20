<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ujian {{ $ujian->judul }} - Portal Pembelajaran Sejarah</title>

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
                <a class="navbar-brand" href="{{ route('siswa.dashboard') }}">
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
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="{{ route('siswa.ujian') }}"><span>Kembali ke Daftar Ujian</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Simulasi Ujian Section -->
    <div id="simulasi-ujian" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">{{ $ujian->judul }}</h2>
                    <p class="text-center">{{ $ujian->deskripsi }}</p>
                    <p class="text-center"><strong>Kategori:</strong> {{ $ujian->kategori }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Timer -->
                    <div class="text-center mb-4">
                        <h4>Waktu Tersisa: <span id="timer">{{ sprintf('%02d:%02d', floor($ujian->waktu_pengerjaan / 60), $ujian->waktu_pengerjaan % 60) }}</span></h4>
                    </div>

                    <!-- Soal Ujian -->
                    <form id="form-ujian" action="{{ route('siswa.submitujian', $ujian->id) }}" method="POST">
    @csrf
    @foreach($ujian->soal as $index => $soal)
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Soal {{ $index + 1 }}</h5>
            <p class="card-text">{{ $soal->pertanyaan }}</p>
            
            @if($soal->jenis === 'pilihan_ganda')
                @php $opsi = json_decode($soal->opsi); @endphp
                @foreach($opsi as $key => $value)
                <div class="form-check">
                    <input class="form-check-input" type="radio" 
                           name="jawaban[{{ $soal->id }}]" 
                           id="soal{{ $soal->id }}option{{ $key }}" 
                           value="{{ $key }}"
                           required>
                    <label class="form-check-label" for="soal{{ $soal->id }}option{{ $key }}">
                        {{ chr(65 + $key) }}. {{ $value }}
                    </label>
                </div>
                @endforeach
            @else
                <div class="form-group">
                    <textarea class="form-control" 
                              name="jawaban[{{ $soal->id }}]" 
                              rows="4"
                              placeholder="Tulis jawaban Anda..."
                              required></textarea>
                </div>
            @endif
        </div>
    </div>
    @endforeach
    
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit Jawaban</button>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Simulasi Ujian Section -->

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

    <!-- Timer Script -->
    <script>
        // Timer berdasarkan waktu pengerjaan ujian (dalam menit)
        let timeLeft = {{ $ujian->waktu_pengerjaan * 60 }}; // Konversi menit ke detik
        const timerElement = document.getElementById('timer');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                alert("Waktu ujian telah habis!");
                document.getElementById('form-ujian').submit(); // Otomatis submit jika waktu habis
            } else {
                timeLeft--;
            }
        }

        const timerInterval = setInterval(updateTimer, 1000);
        
        // Peringatan sebelum meninggalkan halaman
        window.addEventListener('beforeunload', function(e) {
            if (timeLeft > 0) {
                e.preventDefault();
                e.returnValue = 'Anda sedang mengerjakan ujian. Yakin ingin meninggalkan halaman?';
            }
        });
    </script>
</body>
</html>