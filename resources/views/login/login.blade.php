<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal Pembelajaran Sejarah - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom branding styles -->
    <style>
        body {
            background: linear-gradient(to right, #1c2e4a, #2d3f5c);
            font-family: 'Nunito', sans-serif;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .btn-primary {
            background-color: #fca311;
            border-color: #fca311;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #e59500;
            border-color: #e59500;
        }

        .form-control:focus {
            border-color: #fca311;
            box-shadow: 0 0 0 0.2rem rgba(252, 163, 17, 0.25);
        }

        label,
        .text-gray-900,
        .custom-control-label {
            color: #ffffff !important;
        }

        .card-body {
            background-color: #2d3f5c;
        }

        select.form-control {
            background-color: #fff;
            color: #000;
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #fca311;
            border-color: #fca311;
        }

        a.small {
            color: #fca311 !important;
        }

        a.small:hover {
            text-decoration: underline;
        }

        h1, h3 {
            color: #ffffff;
        }

        /* Responsive logo on small screens */
        @media (max-width: 768px) {
            .col-lg-6.d-none.d-lg-block {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- Logo Section -->
                            <div class="col-lg-6 d-none d-lg-block text-center my-auto p-5">
                                <img src="{{ asset('admin/img/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 400px;">
                                <h3 class="mt-3"></h3>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login.submit') }}">
    @csrf
    
    <!-- Role Selection -->
    <div class="form-group">
        <label for="role">Login Sebagai:</label>
        <select class="form-control" id="role" name="role" required>
            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
        </select>
        @error('role')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email Input -->
    <div class="form-group">
        <input type="email" class="form-control form-control-user"
            id="email" name="email" value="{{ old('email') }}"
            placeholder="Masukkan Alamat Email..." required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password Input -->
    <div class="form-group">
        <input type="password" class="form-control form-control-user"
            id="password" name="password" placeholder="Password" required>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Remember Me Checkbox -->
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
            <label class="custom-control-label" for="remember">Ingat Saya</label>
        </div>
    </div>

    <!-- Login Button -->
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/daftar">Buat Akun Baru!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
