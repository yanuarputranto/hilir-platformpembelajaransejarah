<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nilai - Portal Pembelajaran Sejarah</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        .grade-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .grade-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .grade-value {
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .table-grade {
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        
        .table-grade thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        
        .table-grade tbody tr {
            background-color: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .table-grade tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .badge-grade {
            padding: 8px 12px;
            font-size: 0.8rem;
            font-weight: 500;
            border-radius: 50px;
        }
        
        .progress-grade {
            height: 8px;
            border-radius: 4px;
        }
        
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 20px;
            padding: 5px 15px;
            border: 1px solid #ddd;
        }
        
        .dataTables_wrapper .dataTables_length select {
            border-radius: 20px;
            padding: 5px;
        }
        
        .btn-detail {
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 0.8rem;
        }
        
        .average-score {
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>
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

    <!-- Grade Summary Section -->
    <div class="container mt-4">
        <div class="grade-header text-center">
            <h2><i class="fas fa-trophy mr-2"></i> Daftar Nilai Anda</h2>
            <p class="mb-0">Pantau perkembangan belajar Anda melalui hasil ujian berikut</p>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="grade-card p-4 text-center">
                    <h5><i class="fas fa-check-circle text-success mr-2"></i> Nilai Tertinggi</h5>
                    <div class="grade-value text-success">
                        {{ number_format($hasilUjians->max('nilai'), 1) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grade-card p-4 text-center">
                    <h5><i class="fas fa-chart-line text-primary mr-2"></i> Rata-rata</h5>
                    <div class="grade-value text-primary">
                        {{ number_format($hasilUjians->avg('nilai'), 1) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grade-card p-4 text-center">
                    <h5><i class="fas fa-clipboard-list text-info mr-2"></i> Total Ujian</h5>
                    <div class="grade-value text-info">
                        {{ $hasilUjians->count() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Grade Table -->
        <div class="grade-card p-4">
            <div class="table-responsive">
                <table id="grade-table" class="table table-grade table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Ujian</th>
                            <th>Kategori</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasilUjians as $index => $hasil)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $hasil->ujian->judul }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $hasil->ujian->kategori }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress-grade flex-grow-1 me-2" style="height: 8px;">
                                        <div class="progress-bar 
                                            @if($hasil->nilai >= 80) bg-success
                                            @elseif($hasil->nilai >= 60) bg-warning
                                            @else bg-danger @endif" 
                                            role="progressbar" style="width: {{ $hasil->nilai }}%" 
                                            aria-valuenow="{{ $hasil->nilai }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <span class="fw-bold">{{ number_format($hasil->nilai, 1) }}</span>
                                </div>
                            </td>
                            <td>
                                @if($hasil->status == 'completed')
                                    <span class="badge-grade bg-success"><i class="fas fa-check-circle mr-1"></i> Selesai</span>
                                @elseif($hasil->status == 'graded')
                                    <span class="badge-grade bg-primary"><i class="fas fa-star mr-1"></i> Dinilai</span>
                                @else
                                    <span class="badge-grade bg-warning"><i class="fas fa-spinner mr-1"></i> Proses</span>
                                @endif
                            </td>
                            <td>{{ $hasil->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('siswa.hasilujian', $hasil->id) }}" class="btn btn-sm btn-primary btn-detail">
                                    <i class="fas fa-eye mr-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            // Sembunyikan preloader
            $('#preloader').fadeOut(500, function() {
                $('.main-content').fadeIn(500);
                
                // Inisialisasi DataTables
                $('#grade-table').DataTable({
                    responsive: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                    }
                });
            });

            // Fallback jika ada error
            setTimeout(function() {
                $('#preloader').fadeOut(500);
                $('.main-content').fadeIn(500);
            }, 5000); // Timeout 5 detik
        });
    </script>
</body>
</html>