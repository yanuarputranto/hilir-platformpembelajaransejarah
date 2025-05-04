<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Materi - Portal Pembelajaran Sejarah</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/filepond@4.30.4/dist/filepond.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

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
                <a class="navbar-brand" href="{{ route('guru.dashboard') }}">
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

    <!-- Buat Materi Section -->
    <div id="buat-materi" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Buat Materi Baru</h2>
                    <p class="text-center">Silakan isi formulir di bawah ini untuk membuat materi pembelajaran baru.</p>
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
                <form id="form-buat-materi" method="POST" action="{{ route('guru.simpanmateri') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="judul">Judul Materi</label>
                            <input type="text" class="form-control" id="judul" name="judul" 
                                   placeholder="Masukkan judul materi" value="{{ old('judul') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Materi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" 
                                      placeholder="Masukkan deskripsi materi" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="kategori">Kategori Materi</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="sejarah-kuno" {{ old('kategori') == 'sejarah-kuno' ? 'selected' : '' }}>Sejarah Kuno</option>
                                <option value="sejarah-modern" {{ old('kategori') == 'sejarah-modern' ? 'selected' : '' }}>Sejarah Modern</option>
                                <option value="sejarah-indonesia" {{ old('kategori') == 'sejarah-indonesia' ? 'selected' : '' }}>Sejarah Indonesia</option>
                                <option value="sejarah-dunia" {{ old('kategori') == 'sejarah-dunia' ? 'selected' : '' }}>Sejarah Dunia</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
    <label for="gambar">Gambar Materi</label>
    <input type="file" class="form-control-file" id="gambar" name="gambar[]" accept="image/*" multiple>
    <small class="form-text text-muted">Unggah satu atau lebih gambar (JPEG, PNG, JPG, GIF). Maksimal 2MB per gambar.</small>
    
    @error('gambar.*')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    
    <div id="image-preview" class="mt-3"></div>
</div>
                        
                        <div class="form-group">
                            <label for="tanggal_publikasi">Tanggal Publikasi</label>
                            <input type="date" class="form-control" id="tanggal_publikasi" 
                                   name="tanggal_publikasi" value="{{ old('tanggal_publikasi') }}" required>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="notifikasi_siswa" 
                                   name="notifikasi_siswa" {{ old('notifikasi_siswa') ? 'checked' : '' }}>
                            <label class="form-check-label" for="notifikasi_siswa">Kirim notifikasi ke siswa saat materi dipublikasikan</label>
                        </div>
                        <div class="form-group">
    <label for="file_pdf">File PDF Materi</label>
    <input type="file" class="form-control-file" id="file_pdf" name="file_pdf" accept=".pdf">
    <small class="form-text text-muted">Format file: PDF (maksimal 10MB)</small>
</div>

<div class="form-group">
    <label for="file_video">File Video Materi</label>
    <input type="file" class="form-control-file" id="file_video" name="file_video" accept="video/mp4,video/quicktime">
    <small class="form-text text-muted">Format file: MP4/MOV (maksimal 50MB)</small>
</div>

<div class="form-group">
    <label for="link_video">Atau Link Video (YouTube/Vimeo dll.)</label>
    <input type="url" class="form-control" id="link_video" name="link_video" 
           placeholder="https://www.youtube.com/watch?v=..." value="{{ old('link_video') }}">
    <small class="form-text text-muted">Jika tidak mengupload file video, bisa memasukkan link video</small>
</div>

<script>
    // Preview PDF
    document.getElementById('file_pdf').addEventListener('change', function(e) {
        const file = this.files[0];
        if (file && file.type === 'application/pdf') {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('iframe');
                preview.src = e.target.result;
                preview.width = '100%';
                preview.height = '500px';
                preview.style.border = 'none';
                
                const previewContainer = document.getElementById('pdf-preview');
                previewContainer.innerHTML = '';
                previewContainer.appendChild(preview);
            };
            reader.readAsDataURL(file);
        }
    });

    // Preview Video
    document.getElementById('file_video').addEventListener('change', function(e) {
        const file = this.files[0];
        if (file && file.type.match('video.*')) {
            const url = URL.createObjectURL(file);
            const preview = document.createElement('video');
            preview.src = url;
            preview.controls = true;
            preview.width = '100%';
            
            const previewContainer = document.getElementById('video-preview');
            previewContainer.innerHTML = '';
            previewContainer.appendChild(preview);
        }
    });
</script>

<div id="pdf-preview" class="mt-3 mb-3"></div>
<div id="video-preview" class="mt-3 mb-3"></div>
                        
                        <div class="text-center">
                            <button type="submit" class="hover-btn-new orange"><span>Simpan Materi</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Buat Materi Section -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="footer-company-name">© {{ date('Y') }} Portal Pembelajaran Sejarah. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- JS Scripts -->
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond@4.30.4/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    
    <script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType
    );

    const inputElement = document.querySelector('input[name="gambar[]"]');

    const pond = FilePond.create(inputElement, {
        allowMultiple: true,
        acceptedFileTypes: ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'],
        instantUpload: false, // ❗ WAJIB: agar ikut form submit biasa
        storeAsFile: true     // ❗ WAJIB: agar file dikirim via <form> biasa
    });
</script>


   
</body>

</html>