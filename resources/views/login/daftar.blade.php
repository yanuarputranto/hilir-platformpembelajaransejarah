<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal Pembelajaran Sejarah - Daftar</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

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

        h1,
        h3 {
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .col-lg-6.d-none.d-lg-block {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- Logo -->
                            <div class="col-lg-6 d-none d-lg-block text-center my-auto p-5">
                                <img src="{{ asset('admin/img/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 400px;">
                                <h3 class="mt-3"></h3>
                            </div>
                            <!-- Form -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4">Buat Akun Baru!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('daftar.submit') }}">
    @csrf
    
    <!-- Role Selection -->
    <div class="form-group">
        <label for="role">Daftar Sebagai:</label>
        <select class="form-control" id="role" name="role" onchange="toggleFields()">
            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
        </select>
        @error('role')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Nama -->
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="nama" name="nama" 
               placeholder="Nama Lengkap" value="{{ old('nama') }}">
        @error('nama')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group">
        <input type="email" class="form-control form-control-user" id="email" name="email" 
               placeholder="Alamat Email" value="{{ old('email') }}">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- NIP/NIS -->
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="nip_nis" name="nip_nis" 
               placeholder="NIP" value="{{ old('nip_nis') }}">
        @error('nip_nis')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- No. HP -->
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" 
               placeholder="Nomor HP" value="{{ old('no_hp') }}">
        @error('no_hp')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Kelas (Hanya untuk Siswa) -->
    <div class="form-group" id="kelas-field" style="display: none;">
        <input type="text" class="form-control form-control-user" id="kelas" name="kelas" 
               placeholder="Kelas" value="{{ old('kelas') }}">
        @error('kelas')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" 
                   id="password" name="password" placeholder="Password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" 
                   id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password">
        </div>
    </div>

    <!-- Button -->
    <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
</form>

<script>
function toggleFields() {
    const role = document.getElementById("role").value;
    const nipNisInput = document.getElementById("nip_nis");
    const kelasField = document.getElementById("kelas-field");

    if (role === "guru") {
        nipNisInput.placeholder = "NIP";
        kelasField.style.display = "none";
    } else {
        nipNisInput.placeholder = "NIS";
        kelasField.style.display = "block";
    }
}

// Initialize on load
window.onload = function() {
    toggleFields();
    
    // Set nilai sebelumnya jika ada error
    const role = "{{ old('role', 'guru') }}";
    if (role) {
        document.getElementById("role").value = role;
        toggleFields();
    }
};
</script>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/login">Sudah punya akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JS -->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Dynamic Form Fields Script -->
    <script>
        function toggleFields() {
            const role = document.getElementById("role").value;
            const nipNisInput = document.getElementById("nip_nis");
            const kelasField = document.getElementById("kelas-field");

            if (role === "guru") {
                nipNisInput.placeholder = "NIP";
                kelasField.style.display = "none";
            } else {
                nipNisInput.placeholder = "NIS";
                kelasField.style.display = "block";
            }
        }

        // Initialize on load
        window.onload = toggleFields;
    </script>

</body>

</html>
