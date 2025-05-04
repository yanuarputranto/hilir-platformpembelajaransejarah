<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Ujian - Portal Pembelajaran Sejarah</title>

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
    <!-- End header -->

    <!-- Buat Ujian Section -->
    <div id="buat-ujian" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Buat Ujian Baru</h2>
                    <p class="text-center">Silakan isi formulir di bawah ini untuk membuat ujian baru.</p>
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="form-buat-ujian" method="POST" action="{{ route('guru.simpanujian') }}">
                        @csrf
                        
                        <!-- Informasi Ujian -->
                        <div class="form-group">
                            <label for="judul">Judul Ujian</label>
                            <input type="text" class="form-control" id="judul" name="judul" 
                                   placeholder="Masukkan judul ujian" value="{{ old('judul') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Ujian</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" 
                                      placeholder="Masukkan deskripsi ujian" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Ujian</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="sejarah-kuno" {{ old('kategori') == 'sejarah-kuno' ? 'selected' : '' }}>Sejarah Kuno</option>
                                <option value="sejarah-modern" {{ old('kategori') == 'sejarah-modern' ? 'selected' : '' }}>Sejarah Modern</option>
                                <option value="sejarah-indonesia" {{ old('kategori') == 'sejarah-indonesia' ? 'selected' : '' }}>Sejarah Indonesia</option>
                                <option value="sejarah-dunia" {{ old('kategori') == 'sejarah-dunia' ? 'selected' : '' }}>Sejarah Dunia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="waktu_pengerjaan">Waktu Pengerjaan (menit)</label>
                            <input type="number" class="form-control" id="waktu_pengerjaan" name="waktu_pengerjaan" 
                                   placeholder="Masukkan waktu pengerjaan" value="{{ old('waktu_pengerjaan') }}" required>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acak_soal" name="acak_soal" {{ old('acak_soal') ? 'checked' : '' }}>
                            <label class="form-check-label" for="acak_soal">Acak urutan soal</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acak_jawaban" name="acak_jawaban" {{ old('acak_jawaban') ? 'checked' : '' }}>
                            <label class="form-check-label" for="acak_jawaban">Acak urutan jawaban (untuk pilihan ganda)</label>
                        </div>
                        
                        <!-- Tambah Pertanyaan -->
                        <div class="form-group">
                            <label>Daftar Pertanyaan</label>
                            <div id="daftar-pertanyaan">
                                <!-- Pertanyaan akan ditambahkan di sini secara dinamis -->
                            </div>
                            
                            <!-- Navigasi Pertanyaan -->
                            <div class="text-center mt-3 mb-3" id="navigasi-pertanyaan" style="display: none;">
                                <button type="button" class="btn btn-secondary" id="sebelumnya">
                                    <i class="fa fa-arrow-left"></i> Sebelumnya
                                </button>
                                <span id="info-pertanyaan" class="mx-3">Pertanyaan 0 dari 0</span>
                                <button type="button" class="btn btn-secondary" id="berikutnya">
                                    Berikutnya <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                            
                            <button type="button" class="btn btn-secondary btn-block" id="tambah-pertanyaan">
                                <i class="fa fa-plus"></i> Tambah Pertanyaan
                            </button>
                        </div>
                        
                        <!-- Tombol Simpan -->
                        <div class="text-center mt-4">
                            <button type="submit" class="hover-btn-new orange"><span>Simpan Ujian</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Buat Ujian Section -->

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

    <!-- Script untuk Menambah Pertanyaan -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let questionCount = 0;
        let currentQuestionIndex = 0;

        const daftarPertanyaan = document.getElementById('daftar-pertanyaan');
        const navigasi = document.getElementById('navigasi-pertanyaan');
        const tombolSebelumnya = document.getElementById('sebelumnya');
        const tombolBerikutnya = document.getElementById('berikutnya');
        const infoSoal = document.getElementById('info-pertanyaan');

        // Fungsi untuk memperbarui tampilan pertanyaan
        function updateQuestionVisibility() {
            const semuaPertanyaan = daftarPertanyaan.querySelectorAll('.question-card');
            
            if (semuaPertanyaan.length === 0) {
                navigasi.style.display = 'none';
                infoSoal.textContent = 'Pertanyaan 0 dari 0';
                return;
            }
            
            semuaPertanyaan.forEach((el, i) => {
                el.style.display = (i === currentQuestionIndex) ? 'block' : 'none';
            });

            // Update tombol navigasi
            tombolSebelumnya.disabled = currentQuestionIndex === 0;
            tombolBerikutnya.disabled = currentQuestionIndex === semuaPertanyaan.length - 1;
            navigasi.style.display = 'block';
            
            // Update informasi pertanyaan
            infoSoal.textContent = `Pertanyaan ${currentQuestionIndex + 1} dari ${semuaPertanyaan.length}`;
        }

        // Event untuk tombol tambah pertanyaan
        document.getElementById('tambah-pertanyaan').addEventListener('click', function() {
            questionCount++;
            
            const html = `
                <div class="card mb-3 question-card" data-question-id="${questionCount}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Pertanyaan ${questionCount}</h5>
                            <button type="button" class="btn btn-sm btn-danger remove-question">
                                <i class="fa fa-times"></i> Hapus
                            </button>
                        </div>
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <textarea class="form-control" name="soal[${questionCount}][pertanyaan]" rows="2" placeholder="Masukkan pertanyaan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pertanyaan</label>
                            <select class="form-control jenis-pertanyaan" name="soal[${questionCount}][jenis]" required>
                                <option value="pilihan_ganda">Pilihan Ganda</option>
                                <option value="essay">Essay</option>
                            </select>
                        </div>
                        
                        <!-- Pilihan Ganda -->
                        <div class="pilihan-ganda-options">
                            <div class="form-group">
                                <label>Opsi Jawaban</label>
                                ${['A', 'B', 'C', 'D'].map((letter, i) => `
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="soal[${questionCount}][jawaban_benar]" value="${i}" class="jawaban-benar-radio">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control opsi-pilihan-ganda" name="soal[${questionCount}][opsi][${i}]" placeholder="Opsi ${letter}" data-index="${i}">
                                    </div>
                                `).join('')}
                                <small class="form-text text-muted">Pilih jawaban yang benar dengan mengklik tombol radio di sebelah kiri.</small>
                            </div>
                        </div>

                        <!-- Essay -->
                        <div class="essay-options" style="display: none;">
                            <div class="form-group">
                                <label>Kunci Jawaban (Opsional)</label>
                                <textarea class="form-control" name="soal[${questionCount}][kunci_essay]" rows="2" placeholder="Masukkan kunci jawaban (untuk panduan penilaian)"></textarea>
                                <small class="form-text text-muted">Kunci jawaban ini hanya akan digunakan sebagai panduan untuk penilaian.</small>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            daftarPertanyaan.insertAdjacentHTML('beforeend', html);
            
            // Perbarui event listener untuk jenis pertanyaan
            const newQuestion = daftarPertanyaan.lastElementChild;
            const jenisSelect = newQuestion.querySelector('.jenis-pertanyaan');
            const pilganOptions = newQuestion.querySelector('.pilihan-ganda-options');
            const essayOptions = newQuestion.querySelector('.essay-options');
            
            jenisSelect.addEventListener('change', function() {
                if (this.value === 'essay') {
                    pilganOptions.style.display = 'none';
                    essayOptions.style.display = 'block';
                    
                    // Nonaktifkan required untuk input pilihan ganda
                    const pilganInputs = newQuestion.querySelectorAll('.opsi-pilihan-ganda');
                    pilganInputs.forEach(input => {
                        input.removeAttribute('required');
                    });
                    
                    // Nonaktifkan required untuk radio button jawaban benar
                    const radioButtons = newQuestion.querySelectorAll('.jawaban-benar-radio');
                    radioButtons.forEach(radio => {
                        radio.removeAttribute('required');
                    });
                } else {
                    pilganOptions.style.display = 'block';
                    essayOptions.style.display = 'none';
                    
                    // Aktifkan required untuk input pilihan ganda
                    const pilganInputs = newQuestion.querySelectorAll('.opsi-pilihan-ganda');
                    pilganInputs.forEach(input => {
                        input.setAttribute('required', 'required');
                    });
                    
                    // Aktifkan required untuk radio button jawaban benar
                    const radioButtons = newQuestion.querySelectorAll('.jawaban-benar-radio');
                    radioButtons.forEach(radio => {
                        radio.setAttribute('required', 'required');
                    });
                }
            });

            // Update tampilan
            const semuaPertanyaan = daftarPertanyaan.querySelectorAll('.question-card');
            currentQuestionIndex = semuaPertanyaan.length - 1;
            updateQuestionVisibility();
        });

        // Event untuk tombol navigasi
        tombolSebelumnya.addEventListener('click', function() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                updateQuestionVisibility();
            }
        });

        tombolBerikutnya.addEventListener('click', function() {
            const semuaPertanyaan = daftarPertanyaan.querySelectorAll('.question-card');
            if (currentQuestionIndex < semuaPertanyaan.length - 1) {
                currentQuestionIndex++;
                updateQuestionVisibility();
            }
        });

        // Event untuk tombol hapus pertanyaan
        daftarPertanyaan.addEventListener('click', function(e) {
            if (e.target.closest('.remove-question')) {
                if (confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')) {
                    const card = e.target.closest('.question-card');
                    card.remove();
                    
                    // Perbarui nomor pertanyaan
                    const semuaPertanyaan = daftarPertanyaan.querySelectorAll('.question-card');
                    semuaPertanyaan.forEach((el, i) => {
                        el.querySelector('.card-title').textContent = `Pertanyaan ${i + 1}`;
                    });
                    
                    // Perbarui index saat ini jika diperlukan
                    if (currentQuestionIndex >= semuaPertanyaan.length) {
                        currentQuestionIndex = Math.max(0, semuaPertanyaan.length - 1);
                    }
                    
                    updateQuestionVisibility();
                }
            }
        });

        // Event untuk form submission
        document.getElementById('form-buat-ujian').addEventListener('submit', function(e) {
    const semuaPertanyaan = daftarPertanyaan.querySelectorAll('.question-card');
    let isValid = true;

    semuaPertanyaan.forEach((question, index) => {
        const jenis = question.querySelector('.jenis-pertanyaan').value;

        if (jenis === 'pilihan_ganda') {
            const opsiInputs = question.querySelectorAll('.opsi-pilihan-ganda');
            const radioButtons = question.querySelectorAll('.jawaban-benar-radio');

            // Hanya validasi jika inputnya ada
            if (opsiInputs.length === 0 || radioButtons.length === 0) {
                isValid = false;
                console.warn(`Soal #${index + 1} pilihan ganda tidak lengkap`);
                return;
            }

            const validRadio = Array.from(radioButtons).some(radio => radio.checked);
            const kosongOpsi = Array.from(opsiInputs).some(input => input.value.trim() === '');

            if (!validRadio || kosongOpsi) {
                isValid = false;
                console.warn(`Soal #${index + 1} pilihan ganda belum lengkap atau belum dipilih jawaban benar`);
            }

        } else if (jenis === 'essay') {
            const kunciEssay = question.querySelector('[name$="[kunci_essay]"]');

            if (!kunciEssay || kunciEssay.value.trim() === '') {
                isValid = false;
                console.warn(`Soal #${index + 1} essay belum diisi kunci jawabannya`);
            }
        }
    });

    if (!isValid) {
        e.preventDefault();
        alert('Tolong lengkapi semua soal sebelum disimpan!');
    }
});

        
        // Initialize tampilan awal
        updateQuestionVisibility();
    });
</script>

</body>

</html>