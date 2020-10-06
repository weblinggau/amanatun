<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title;?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin')?>">
        <img src="<?= base_url('assets/img/1.png')?>" width="100">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider ">

            <!-- Heading -->
      <div class="sidebar-heading">
        <?= $login['username'];?>
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/kepegawaian')?>">
          <i class="fas fa-users"></i>
          <span>Kepegawaian</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/izin');?>">
          <i class="fas fa-money-bill-wave"></i>
          <span>Izin</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/kepanitian');?>">
          <i class="fas fa-money-bill-wave"></i>
          <span>Kepanitian</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/absen_d');?>">
          <i class="fas fa-money-bill-wave"></i>
          <span>Absen Dosen</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/absen_p');?>">
          <i class="fas fa-users"></i>
          <span>Absen Pegawai</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/sp');?>">
          <i class="fas fa-money-bill-wave"></i>
          <span>Surat Peringatan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/ruang_ja');?>">
          <i class="fas fa-money-bill-wave"></i>
          <span>Ruang Jabatan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/jabatan_fung');?>">
          <i class="fas fa-money-bill-wave"></i>
          <span>Jabatan Fungsional</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout');?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

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

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $login['username'];?></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
                <a class="dropdown-item" href="<?= base_url('auth/logout');?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="container">
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-dark bg-dark">
                      From Ubah Data
                    </div>
                    <div class="card-body">
                      
                      
                  
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Id Jabatan Fungsional</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="id_jabatan_fungsional" value="<?= $jabatan_fung->id_jabatan_fungsional?>" readonly>
                      <small class="form-text text-danger"><?= form_error('id_jabatan_fungsional');?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Jabatan</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="jabatan"value="<?= $jabatan_fung->jabatan?>">
                      <small class="form-text text-danger"><?= form_error('jabatan');?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nomor SK</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="nomor_sk" value="<?= $jabatan_fung->nomor_sk?>">
                      <small class="form-text text-danger"><?= form_error('nomor_sk');?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Tanggal Mulai</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="tgl_mulai" value="<?= $jabatan_fung->tgl_mulai?>">
                      <small class="form-text text-danger"><?= form_error('tgl_mulai');?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Tanggal Berakhir</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="tgl_berakhir" value="<?= $jabatan_fung->tgl_berakhir?>">
                      <small class="form-text text-danger"><?= form_error('tgl_berakhir');?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Status</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="status" value="<?= $jabatan_fung->status?>">
                      <small class="form-text text-danger"><?= form_error('status');?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nip Dosen</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"  name="nip_dosen" value="<?= $jabatan_fung->nip_dosen?>">
                      <small class="form-text text-danger"><?= form_error('nip_dosen');?></small>
                    </div>
                  <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
                  </form>
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
            <span>Copyright &copy; Nanda Putra Selatan <?= date('Y');?></span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout jika Ingin Keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

</body>

</html>
