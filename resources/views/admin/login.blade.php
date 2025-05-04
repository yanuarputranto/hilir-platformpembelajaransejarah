<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portal Pembelajaran Sejarah - Admin Login</title>

    <!-- Custom fonts -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #224abe;
            --accent-color: #f8f9fc;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .login-container {
            animation: fadeIn 0.8s ease-in-out;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: none;
            overflow: hidden;
        }
        
        .logo-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        
        .logo-img {
            max-height: 180px;
            transition: transform 0.3s;
        }
        
        .logo-img:hover {
            transform: scale(1.05);
        }
        
        .welcome-text {
            color: white;
            margin-top: 1rem;
            text-align: center;
        }
        
        .login-form {
            padding: 2.5rem;
        }
        
        .form-control-user {
            border-radius: 50px;
            padding: 12px 20px;
            margin-bottom: 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control-user:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .btn-login {
            border-radius: 50px;
            padding: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: var(--primary-color);
            border: none;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }
        
        .divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e0e0e0;
            z-index: -1;
        }
        
        .divider span {
            background: white;
            padding: 0 10px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .forgot-pass {
            color: var(--primary-color);
            transition: color 0.3s;
        }
        
        .forgot-pass:hover {
            color: var(--secondary-color);
            text-decoration: none;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Efek hover untuk card */
        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- Logo Section dengan efek gradien -->
                            <div class="col-lg-6 d-none d-lg-block logo-section">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid logo-img">
                                <div class="welcome-text">
                                    <h3>Portal Pembelajaran Sejarah</h3>
                                    <p class="mb-0">Mengelola pengetahuan sejarah dengan teknologi modern</p>
                                </div>
                            </div>
                            
                            <!-- Form Section -->
                            <div class="col-lg-6">
                                <div class="p-5 login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                                    </div>
                                    
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    
                                    <form class="user" method="POST" action="{{ route('admin.login.submit') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                placeholder="Masukkan email admin..." required
                                                value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                                <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block btn-login">
                                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                                        </button>
                                    </form>
                                    
                                    <div class="divider">
                                        <span>ATAU</span>
                                    </div>
                                    
                                    <div class="text-center">
                                        <a class="small forgot-pass" href="#">
                                            <i class="fas fa-key mr-1"></i> Lupa Password?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    
    <script>
        // Animasi tambahan
        $(document).ready(function() {
            $('.form-control-user').each(function(i) {
                $(this).delay(100 * i).animate({
                    opacity: 1,
                    marginTop: 0
                }, 300);
            });
        });
    </script>
</body>
</html>