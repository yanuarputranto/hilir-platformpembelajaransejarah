<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Ujian - Portal Pembelajaran Sejarah</title>

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

    <!-- Edit Ujian Section -->
    <section class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Edit Ujian</h3>
                <p>Perbarui detail ujian Anda.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('guru.updateujian', $ujian->id) }}" id="ujianForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul Ujian</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $ujian->judul) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Ujian</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $ujian->deskripsi) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="Sejarah Indonesia" {{ old('kategori', $ujian->kategori) == 'Sejarah Indonesia' ? 'selected' : '' }}>Sejarah Indonesia</option>
                                <option value="Sejarah Dunia" {{ old('kategori', $ujian->kategori) == 'Sejarah Dunia' ? 'selected' : '' }}>Sejarah Dunia</option>
                                <option value="Sejarah Islam" {{ old('kategori', $ujian->kategori) == 'Sejarah Islam' ? 'selected' : '' }}>Sejarah Islam</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="waktu_pengerjaan">Waktu Pengerjaan (menit)</label>
                            <input type="number" class="form-control" id="waktu_pengerjaan" name="waktu_pengerjaan" value="{{ old('waktu_pengerjaan', $ujian->waktu_pengerjaan) }}" min="1" required>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acak_soal" name="acak_soal" {{ old('acak_soal', $ujian->acak_soal) ? 'checked' : '' }}>
                            <label class="form-check-label" for="acak_soal">Acak urutan soal</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acak_jawaban" name="acak_jawaban" {{ old('acak_jawaban', $ujian->acak_jawaban) ? 'checked' : '' }}>
                            <label class="form-check-label" for="acak_jawaban">Acak urutan jawaban (untuk pilihan ganda)</label>
                        </div>

                        <hr>

                        <h5 class="mb-3">Daftar Soal</h5>
                        <div id="soal-container">
                            @foreach($ujian->soal as $index => $soal)
                                <div class="card mb-4 soal-item" data-index="{{ $index }}">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <span>Soal #{{ $index + 1 }}</span>
                                        <button type="button" class="btn btn-sm btn-danger hapus-soal" data-index="{{ $index }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Pertanyaan</label>
                                            <textarea class="form-control pertanyaan" name="soal[{{ $index }}][pertanyaan]" rows="3" required>{{ old("soal.$index.pertanyaan", $soal->pertanyaan) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Soal</label>
                                            <select class="form-control jenis-soal" name="soal[{{ $index }}][jenis]" required>
                                                <option value="pilihan_ganda" {{ old("soal.$index.jenis", $soal->jenis) == 'pilihan_ganda' ? 'selected' : '' }}>Pilihan Ganda</option>
                                                <option value="essay" {{ old("soal.$index.jenis", $soal->jenis) == 'essay' ? 'selected' : '' }}>Essay</option>
                                            </select>
                                        </div>

                                        @if(old("soal.$index.jenis", $soal->jenis) == 'pilihan_ganda')
                                            <div class="opsi-container pilihan-ganda-container">
                                                <div class="form-group">
                                                    <label>Opsi Jawaban</label>
                                                    @php
                                                        $opsi = json_decode($soal->opsi);
                                                        $jawaban_benar = $soal->jawaban_benar;
                                                    @endphp
                                                    @foreach($opsi as $i => $o)
                                                        <div class="input-group mb-2 opsi-item">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="soal[{{ $index }}][jawaban_benar]" value="{{ $i }}" {{ old("soal.$index.jawaban_benar", $jawaban_benar) == $i ? 'checked' : '' }} required>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="soal[{{ $index }}][opsi][]" value="{{ old("soal.$index.opsi.$i", $o) }}" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-danger hapus-opsi" type="button"><i class="fas fa-times"></i></button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" class="btn btn-sm btn-primary tambah-opsi" data-index="{{ $index }}">
                                                    <i class="fas fa-plus mr-1"></i> Tambah Opsi
                                                </button>
                                            </div>
                                        @else
                                            <div class="form-group essay-container">
                                                <label>Kunci Jawaban Essay</label>
                                                <textarea class="form-control" name="soal[{{ $index }}][kunci_essay]" rows="3">{{ old("soal.$index.kunci_essay", $soal->kunci_essay) }}</textarea>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mb-4">
                            <button type="button" id="tambah-soal" class="btn btn-primary">
                                <i class="fas fa-plus mr-2"></i> Tambah Soal
                            </button>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('guru.daftarujian') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                        </div>
                    </form>
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
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dynamic form handling
            let soalCounter = {{ count($ujian->soal) }};
            
            // Add new question
            document.getElementById('tambah-soal').addEventListener('click', function() {
                const container = document.getElementById('soal-container');
                const index = soalCounter++;
                
                const soalHTML = `
                    <div class="card mb-4 soal-item" data-index="${index}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Soal #${index + 1}</span>
                            <button type="button" class="btn btn-sm btn-danger hapus-soal" data-index="${index}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control pertanyaan" name="soal[${index}][pertanyaan]" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Jenis Soal</label>
                                <select class="form-control jenis-soal" name="soal[${index}][jenis]" required>
                                    <option value="pilihan_ganda">Pilihan Ganda</option>
                                    <option value="essay">Essay</option>
                                </select>
                            </div>

                            <div class="opsi-container pilihan-ganda-container">
                                <div class="form-group">
                                    <label>Opsi Jawaban</label>
                                    <div class="input-group mb-2 opsi-item">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="soal[${index}][jawaban_benar]" value="0" required>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="soal[${index}][opsi][]" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger hapus-opsi" type="button"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="input-group mb-2 opsi-item">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="soal[${index}][jawaban_benar]" value="1" required>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="soal[${index}][opsi][]" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger hapus-opsi" type="button"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-primary tambah-opsi" data-index="${index}">
                                    <i class="fas fa-plus mr-1"></i> Tambah Opsi
                                </button>
                            </div>

                            <div class="form-group essay-container" style="display: none;">
                                <label>Kunci Jawaban Essay</label>
                                <textarea class="form-control" name="soal[${index}][kunci_essay]" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                `;
                
                container.insertAdjacentHTML('beforeend', soalHTML);
            });

            // Delete question
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('hapus-soal') || e.target.closest('.hapus-soal')) {
                    const button = e.target.classList.contains('hapus-soal') ? e.target : e.target.closest('.hapus-soal');
                    if (confirm('Apakah Anda yakin ingin menghapus soal ini?')) {
                        const soalItem = button.closest('.soal-item');
                        soalItem.remove();
                        
                        // Renumber remaining questions
                        const questions = document.querySelectorAll('.soal-item');
                        questions.forEach((question, index) => {
                            question.querySelector('.card-header span').textContent = `Soal #${index + 1}`;
                        });
                    }
                }
            });

            // Change question type
            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('jenis-soal')) {
                    const container = e.target.closest('.card-body');
                    const jenis = e.target.value;
                    
                    if (jenis === 'pilihan_ganda') {
                        container.querySelector('.pilihan-ganda-container').style.display = 'block';
                        container.querySelector('.essay-container').style.display = 'none';
                    } else {
                        container.querySelector('.pilihan-ganda-container').style.display = 'none';
                        container.querySelector('.essay-container').style.display = 'block';
                    }
                }
            });

            // Add option
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('tambah-opsi') || e.target.closest('.tambah-opsi')) {
                    const button = e.target.classList.contains('tambah-opsi') ? e.target : e.target.closest('.tambah-opsi');
                    const index = button.dataset.index;
                    const opsiContainer = button.closest('.opsi-container').querySelector('.form-group');
                    
                    const opsiCount = opsiContainer.querySelectorAll('.opsi-item').length;
                    const newOpsiHTML = `
                        <div class="input-group mb-2 opsi-item">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="soal[${index}][jawaban_benar]" value="${opsiCount}" required>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="soal[${index}][opsi][]" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger hapus-opsi" type="button"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    `;
                    
                    opsiContainer.insertAdjacentHTML('beforeend', newOpsiHTML);
                }
            });

            // Delete option
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('hapus-opsi') || e.target.closest('.hapus-opsi')) {
                    const button = e.target.classList.contains('hapus-opsi') ? e.target : e.target.closest('.hapus-opsi');
                    const opsiItem = button.closest('.opsi-item');
                    const opsiContainer = opsiItem.closest('.form-group');
                    
                    if (opsiContainer.querySelectorAll('.opsi-item').length > 2) {
                        opsiItem.remove();
                        
                        // Reindex radio buttons
                        const opsiItems = opsiContainer.querySelectorAll('.opsi-item');
                        opsiItems.forEach((item, index) => {
                            item.querySelector('input[type="radio"]').value = index;
                        });
                    } else {
                        alert('Minimal harus ada 2 opsi jawaban');
                    }
                }
            });

            // Initialize question types on page load
            document.querySelectorAll('.jenis-soal').forEach(select => {
                const container = select.closest('.card-body');
                const jenis = select.value;
                
                if (jenis === 'pilihan_ganda') {
                    if (container.querySelector('.essay-container')) {
                        container.querySelector('.essay-container').style.display = 'none';
                    }
                } else {
                    if (container.querySelector('.pilihan-ganda-container')) {
                        container.querySelector('.pilihan-ganda-container').style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>

</html>