<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portal Pembelajaran Sejarah dengan AI dan AR">
    <meta name="author" content="Tim Pengembang">

    <title>Kelola Registrasi - Portal Pembelajaran Sejarah</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <style>
        .nav-tabs .nav-link {
            color: #4e73df;
            font-weight: 600;
        }
        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }
        .action-buttons .btn {
            margin-right: 5px;
            min-width: 30px;
        }
        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
        .modal-detail-table td {
            padding: 8px 12px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">HILIR-ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Sistem
            </div>

            <!-- Nav Item - Kelola Registrasi -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.kelolaregistrasi') }}">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Kelola Registrasi</span>
                </a>
            </li>

            <!-- Nav Item - Kelola Login -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.kelolalogin') }}">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Kelola Login</span>
                </a>
            </li>

            <!-- Nav Item - Kelola Sistem -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('admin.kelolasistem') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Kelola Sistem</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari pengguna..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="{{ asset('admin/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Kelola Registrasi</h1>
                    <p class="mb-4">Kelola data pengguna yang terdaftar di Portal Pembelajaran Sejarah.</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="siswa-tab" data-toggle="tab" href="#siswa" role="tab" aria-controls="siswa" aria-selected="true">
                                <i class="fas fa-user-graduate mr-1"></i> Data Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="guru-tab" data-toggle="tab" href="#guru" role="tab" aria-controls="guru" aria-selected="false">
                                <i class="fas fa-chalkboard-teacher mr-1"></i> Data Guru
                            </a>
                        </li>
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Data Siswa Tab -->
                        <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                            <div class="card shadow mb-4 mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTableSiswa" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($siswa))
                                                    @foreach($siswa as $index => $s)
                                                    <tr data-id="{{ $s->id }}">
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $s->nis }}</td>
                                                        <td>{{ $s->nama }}</td>
                                                        <td>{{ $s->email }}</td>
                                                        <td>{{ $s->kelas }}</td>
                                                        <td class="action-buttons">
                                                            <button class="btn btn-info btn-sm btn-detail" data-id="{{ $s->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-warning btn-sm btn-edit" data-id="{{ $s->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm btn-hapus" data-id="{{ $s->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data siswa</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Guru Tab -->
                        <div class="tab-pane fade" id="guru" role="tabpanel" aria-labelledby="guru-tab">
                            <div class="card shadow mb-4 mt-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTableGuru" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($guru))
                                                    @foreach($guru as $index => $g)
                                                    <tr data-id="{{ $g->id }}">
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $g->nip }}</td>
                                                        <td>{{ $g->nama }}</td>
                                                        <td>{{ $g->email }}</td>
                                                        <td class="action-buttons">
                                                            <button class="btn btn-info btn-sm btn-detail-guru" data-id="{{ $g->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-warning btn-sm btn-edit-guru" data-id="{{ $g->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm btn-hapus-guru" data-id="{{ $g->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center">Tidak ada data guru</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Portal Pembelajaran Sejarah {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Detail Siswa -->
    <div class="modal fade" id="detailSiswaModal" tabindex="-1" role="dialog" aria-labelledby="detailSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailSiswaModalLabel">Detail Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table modal-detail-table">
                        <tr>
                            <th>NIS</th>
                            <td id="detail-nis">-</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td id="detail-nama">-</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="detail-email">-</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td id="detail-kelas">-</td>
                        </tr>
                        <tr>
                            <th>Tanggal Daftar</th>
                            <td id="detail-tanggal">-</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Siswa -->
    <div class="modal fade" id="editSiswaModal" tabindex="-1" role="dialog" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditSiswa" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-nis">NIS</label>
                            <input type="text" class="form-control" id="edit-nis" name="nis" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-kelas">Kelas</label>
                            <input type="text" class="form-control" id="edit-kelas" name="kelas" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Siswa -->
    <div class="modal fade" id="hapusSiswaModal" tabindex="-1" role="dialog" aria-labelledby="hapusSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSiswaModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formHapusSiswa" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data siswa berikut?</p>
                        <p class="font-weight-bold" id="siswa-yang-akan-dihapus">Nama Siswa</p>
                        <p class="text-danger">Data yang dihapus tidak dapat dikembalikan!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail Guru -->
    <div class="modal fade" id="detailGuruModal" tabindex="-1" role="dialog" aria-labelledby="detailGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailGuruModalLabel">Detail Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table modal-detail-table">
                        <tr>
                            <th>NIP</th>
                            <td id="detail-nip">-</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td id="detail-nama-guru">-</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="detail-email-guru">-</td>
                        </tr>
                        <tr>
                            <th>Tanggal Daftar</th>
                            <td id="detail-tanggal-guru">-</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Guru -->
    <div class="modal fade" id="editGuruModal" tabindex="-1" role="dialog" aria-labelledby="editGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGuruModalLabel">Edit Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditGuru" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-nip">NIP</label>
                            <input type="text" class="form-control" id="edit-nip" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-nama-guru">Nama Lengkap</label>
                            <input type="text" class="form-control" id="edit-nama-guru" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-email-guru">Email</label>
                            <input type="email" class="form-control" id="edit-email-guru" name="email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Guru -->
    <div class="modal fade" id="hapusGuruModal" tabindex="-1" role="dialog" aria-labelledby="hapusGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusGuruModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formHapusGuru" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data guru berikut?</p>
                        <p class="font-weight-bold" id="guru-yang-akan-dihapus">Nama Guru</p>
                        <p class="text-danger">Data yang dihapus tidak dapat dikembalikan!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
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

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#dataTableSiswa').DataTable();
        $('#dataTableGuru').DataTable();

        // Handler untuk tombol detail siswa
        $(document).on('click', '.btn-detail', function() {
            var row = $(this).closest('tr');
            $('#detail-nis').text(row.find('td:eq(1)').text());
            $('#detail-nama').text(row.find('td:eq(2)').text());
            $('#detail-email').text(row.find('td:eq(3)').text());
            $('#detail-kelas').text(row.find('td:eq(4)').text());
            $('#detail-no_hp').text(row.find('td:eq(5)').text());
            $('#detailSiswaModal').modal('show');
        });

        // Handler untuk tombol edit siswa
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var row = $(this).closest('tr');
            
            $('#edit-nis').val(row.find('td:eq(1)').text());
            $('#edit-nama').val(row.find('td:eq(2)').text());
            $('#edit-email').val(row.find('td:eq(3)').text());
            $('#edit-kelas').val(row.find('td:eq(4)').text());
            $('#edit-no_hp').val(row.find('td:eq(5)').text());
            
            // Perbaikan: Menggunakan route dengan parameter ID yang benar
            var updateUrl = "{{ route('admin.siswa.update', ['id' => ':id']) }}";
            updateUrl = updateUrl.replace(':id', id);
            $('#formEditSiswa').attr('action', updateUrl);
            
            $('#editSiswaModal').modal('show');
        });

        // Handler untuk tombol hapus siswa
        $(document).on('click', '.btn-hapus', function() {
            var id = $(this).data('id');
            var nama = $(this).closest('tr').find('td:eq(2)').text();
            
            $('#siswa-yang-akan-dihapus').text(nama);
            
            // Perbaikan: Menggunakan route dengan parameter ID yang benar
            var deleteUrl = "{{ route('admin.siswa.destroy', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);
            $('#formHapusSiswa').attr('action', deleteUrl);
            
            $('#hapusSiswaModal').modal('show');
        });

        // Handler untuk tombol detail guru
        $(document).on('click', '.btn-detail-guru', function() {
            var row = $(this).closest('tr');
            $('#detail-nip').text(row.find('td:eq(1)').text());
            $('#detail-nama-guru').text(row.find('td:eq(2)').text());
            $('#detail-email-guru').text(row.find('td:eq(3)').text());
            $('#detail-no_hp-guru').text(row.find('td:eq(4)').text());
            $('#detailGuruModal').modal('show');
        });

        // Handler untuk tombol edit guru
        $(document).on('click', '.btn-edit-guru', function() {
            var id = $(this).data('id');
            var row = $(this).closest('tr');
            
            $('#edit-nip').val(row.find('td:eq(1)').text());
            $('#edit-nama-guru').val(row.find('td:eq(2)').text());
            $('#edit-email-guru').val(row.find('td:eq(3)').text());
            $('#edit-no_hp-guru').val(row.find('td:eq(4)').text());
            
            // Perbaikan: Menggunakan route dengan parameter ID yang benar
            var updateUrl = "{{ route('admin.guru.update', ['id' => ':id']) }}";
            updateUrl = updateUrl.replace(':id', id);
            $('#formEditGuru').attr('action', updateUrl);
            
            $('#editGuruModal').modal('show');
        });

        // Handler untuk tombol hapus guru
        $(document).on('click', '.btn-hapus-guru', function() {
            var id = $(this).data('id');
            var nama = $(this).closest('tr').find('td:eq(2)').text();
            
            $('#guru-yang-akan-dihapus').text(nama);
            
            // Perbaikan: Menggunakan route dengan parameter ID yang benar
            var deleteUrl = "{{ route('admin.guru.destroy', ['id' => ':id']) }}";
            deleteUrl = deleteUrl.replace(':id', id);
            $('#formHapusGuru').attr('action', deleteUrl);
            
            $('#hapusGuruModal').modal('show');
        });
    });
</script>

</body>

</html>