<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Ujian - Portal Pembelajaran Sejarah</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #34495e;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .result-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .result-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .result-card:hover {
            transform: translateY(-5px);
        }
        
        .score-display {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .question-card {
            border-left: 4px solid var(--primary-color);
            border-radius: 8px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .question-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .correct-answer {
            background-color: rgba(46, 204, 113, 0.1);
            border-left: 4px solid var(--success-color);
        }
        
        .incorrect-answer {
            background-color: rgba(231, 76, 60, 0.1);
            border-left: 4px solid var(--danger-color);
        }
        
        .unanswered {
            background-color: rgba(241, 196, 15, 0.1);
            border-left: 4px solid var(--warning-color);
        }
        
        .badge-custom {
            padding: 8px 12px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 50px;
        }
        
        .progress-thin {
            height: 8px;
            border-radius: 4px;
        }
        
        .answer-bubble {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            margin: 5px;
            font-weight: 500;
        }
        
        .user-answer {
            background-color: var(--primary-color);
            color: white;
        }
        
        .correct-bubble {
            background-color: var(--success-color);
            color: white;
        }
        
        .feedback-box {
            background-color: rgba(52, 152, 219, 0.1);
            border-left: 3px solid var(--primary-color);
            padding: 15px;
            border-radius: 0 5px 5px 0;
            margin-top: 15px;
        }
        
        .summary-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
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

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Result Header Card -->
                <div class="result-card">
                    <div class="result-header text-center">
                        <h2><i class="fas fa-award mr-2"></i> Hasil Ujian Anda</h2>
                        <h4>{{ $hasil->ujian->judul }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row text-center mb-4">
                            <div class="col-md-4">
                                <div class="score-display">{{ number_format($hasil->nilai, 1) }}</div>
                                <p class="text-muted">Nilai Akhir</p>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <div>
                                        <span class="badge badge-custom 
                                            @if($hasil->status == 'completed') bg-success
                                            @elseif($hasil->status == 'graded') bg-primary
                                            @else bg-warning @endif">
                                            @if($hasil->status == 'completed') Selesai
                                            @elseif($hasil->status == 'graded') Dinilai
                                            @else Proses Penilaian @endif
                                        </span>
                                        <p class="text-muted mt-2">Status</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <div>
                                        <i class="far fa-calendar-alt fa-2x mb-2" style="color: var(--primary-color);"></i>
                                        <p>{{ $hasil->created_at->format('d F Y H:i') }}</p>
                                        <p class="text-muted">Waktu Ujian</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="summary-card mb-4">
                            <h5 class="mb-3"><i class="fas fa-chart-pie mr-2"></i>Ringkasan Hasil</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><i class="fas fa-book mr-2"></i>Kategori: <strong>{{ $hasil->ujian->kategori }}</strong></p>
                                    <p><i class="fas fa-question-circle mr-2"></i>Jumlah Soal: <strong>{{ count($hasil->ujian->soal) }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="fas fa-check-circle mr-2 text-success"></i>Benar: <strong>{{ $correctAnswers = collect($hasil->jawaban)->where('correct', true)->count() }}</strong></p>
                                    <p><i class="fas fa-times-circle mr-2 text-danger"></i>Salah: <strong>{{ $wrongAnswers = collect($hasil->jawaban)->where('correct', false)->where('jenis', 'pilihan_ganda')->count() }}</strong></p>
                                </div>
                            </div>
                            <div class="progress progress-thin mt-3">
                                <div class="progress-bar bg-success" role="progressbar" 
                                    style="width: {{ $correctPercentage = $correctAnswers/count($hasil->ujian->soal)*100 }}%" 
                                    aria-valuenow="{{ $correctPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-danger" role="progressbar" 
                                    style="width: {{ $wrongAnswers/count($hasil->ujian->soal)*100 }}%" 
                                    aria-valuenow="{{ $wrongAnswers/count($hasil->ujian->soal)*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <h4 class="mb-4"><i class="fas fa-list-ol mr-2"></i>Review Jawaban</h4>

                        @foreach($hasil->ujian->soal as $index => $soal)
                            @php 
                                $jawabanSiswa = $hasil->jawaban[$soal->id]['jawaban'] ?? null;
                                $isCorrect = $hasil->jawaban[$soal->id]['correct'] ?? false;
                                $cardClass = '';
                                
                                if ($soal->jenis === 'pilihan_ganda') {
                                    $cardClass = $isCorrect ? 'correct-answer' : 'incorrect-answer';
                                } else {
                                    $cardClass = is_null($jawabanSiswa) ? 'unanswered' : '';
                                }
                            @endphp
                            
                            <div class="question-card {{ $cardClass }} p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="mb-3">Soal #{{ $index + 1 }}</h5>
                                    <span class="badge 
                                        @if($soal->jenis === 'pilihan_ganda') bg-primary
                                        @else bg-info @endif">
                                        @if($soal->jenis === 'pilihan_ganda') Pilihan Ganda
                                        @else Essay @endif
                                    </span>
                                </div>
                                <p class="font-weight-bold">{{ $soal->pertanyaan }}</p>
                                
                                @if($soal->jenis === 'pilihan_ganda')
                                    @php $opsi = json_decode($soal->opsi); @endphp
                                    
                                    <div class="mb-3">
                                        <p class="mb-1"><strong>Jawaban Anda:</strong></p>
                                        @if(!is_null($jawabanSiswa) && isset($opsi[$jawabanSiswa]))
                                            <span class="answer-bubble user-answer">
                                                {{ chr(65 + $jawabanSiswa) }}. {{ $opsi[$jawabanSiswa] }}
                                            </span>
                                        @else
                                            <span class="text-danger"><i class="fas fa-times-circle"></i> Tidak dijawab</span>
                                        @endif
                                    </div>
                                    
                                    <div>
                                        <p class="mb-1"><strong>Jawaban Benar:</strong></p>
                                        <span class="answer-bubble correct-bubble">
                                            {{ chr(65 + $soal->jawaban_benar) }}. {{ $opsi[$soal->jawaban_benar] }}
                                        </span>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <p class="mb-1"><strong>Jawaban Anda:</strong></p>
                                        <div class="alert {{ $jawabanSiswa ? 'alert-light' : 'alert-warning' }}">
                                            {!! $jawabanSiswa ? nl2br(e($jawabanSiswa)) : '<i class="fas fa-exclamation-circle"></i> Tidak dijawab' !!}
                                        </div>
                                    </div>
                                    
                                    @if($hasil->status == 'graded' && isset($hasil->jawaban[$soal->id]['feedback']))
                                        <div class="feedback-box">
                                            <p class="mb-1"><strong><i class="fas fa-comment-dots"></i> Feedback Guru:</strong></p>
                                            <p class="mb-0">{{ $hasil->jawaban[$soal->id]['feedback'] }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endforeach

                        <div class="text-center mt-4">
                            <a href="{{ route('siswa.nilai') }}" class="btn btn-primary px-4 py-2">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Nilai
                            </a>
                            <button class="btn btn-outline-primary px-4 py-2 ml-2" onclick="window.print()">
                                <i class="fas fa-print mr-2"></i> Cetak Hasil
                            </button>
                        </div>
                    </div>
                </div>
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
    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.question-card');
            questions.forEach((question, index) => {
                setTimeout(() => {
                    question.style.opacity = 1;
                    question.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>