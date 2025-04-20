<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Ujian - Portal Pembelajaran Sejarah</title>

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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
        
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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="logout.html"><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Lihat Nilai Section -->
    <div id="lihat-nilai" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Lihat dan Kelola Nilai Siswa</h2>
                    <p class="text-center">Berikut adalah daftar nilai siswa yang dapat Anda kelola.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Filter dan Pencarian -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <select class="form-control" id="filter-ujian">
                                <option value="">Pilih Ujian</option>
                                <option value="ujian-kemerdekaan">Ujian Sejarah Kemerdekaan Indonesia</option>
                                <option value="ujian-sumpah-pemuda">Ujian Sumpah Pemuda 1928</option>
                                <option value="ujian-perang-dunia-ii">Ujian Perang Dunia II</option>
                                <option value="ujian-kerajaan">Ujian Sejarah Kerajaan di Indonesia</option>
                                <option value="ujian-revolusi-industri">Ujian Revolusi Industri</option>
                                <option value="ujian-asia-tenggara">Ujian Sejarah Asia Tenggara</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" id="ekspor-nilai">
                                <i class="fa fa-download"></i> Ekspor Nilai
                            </button>
                        </div>
                    </div>

                    <!-- Tabel Nilai Siswa dengan DataTables -->
                    <div class="table-responsive">
                        <table id="tabel-nilai" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Ujian</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nilam Maharani</td>
                                    <td>Ujian Sejarah Kemerdekaan Indonesia</td>
                                    <td>85</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editNilaiModal">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Viria Rihadatul Salzabil</td>
                                    <td>Ujian Sumpah Pemuda 1928</td>
                                    <td>90</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editNilaiModal">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <!-- Tambahkan data lain di sini -->
                                <tr>
                                    <td>3</td>
                                    <td>Budi Santoso</td>
                                    <td>Ujian Sejarah Kemerdekaan Indonesia</td>
                                    <td>78</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editNilaiModal">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ani Wijaya</td>
                                    <td>Ujian Perang Dunia II</td>
                                    <td>92</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editNilaiModal">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Lihat Nilai Section -->

    <!-- Modal Edit Nilai -->
    <div class="modal fade" id="editNilaiModal" tabindex="-1" role="dialog" aria-labelledby="editNilaiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNilaiModalLabel">Edit Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit-nilai">
                        <div class="form-group">
                            <label for="nama-siswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama-siswa" value="John Doe" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nilai-siswa">Nilai</label>
                            <input type="number" class="form-control" id="nilai-siswa" value="85" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Edit Nilai -->

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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"></script>
  

    <!-- Custom JS -->
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Script untuk Inisialisasi DataTables -->
    <script>
        $(document).ready(function () {
            $('#tabel-nilai').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" // Bahasa Indonesia
                },
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
            
            // Filter berdasarkan ujian
            $('#filter-ujian').on('change', function() {
                var table = $('#tabel-nilai').DataTable();
                table.column(2).search(this.value).draw();
            });
            
            // Tombol ekspor nilai
            $('#ekspor-nilai').on('click', function() {
                alert('Fitur ekspor nilai akan diimplementasikan di sini');
                // Di sini bisa ditambahkan logika untuk ekspor ke Excel/PDF
            });
            
            // Form edit nilai
            $('#form-edit-nilai').on('submit', function(e) {
                e.preventDefault();
                alert('Nilai berhasil diperbarui!');
                $('#editNilaiModal').modal('hide');
            });
        });
    </script>
</body>

</html>