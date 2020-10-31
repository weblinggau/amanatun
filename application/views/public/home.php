		<div class="container-fluid">

	          <!-- Page Heading -->
	          <div class="d-sm-flex align-items-center justify-content-between mb-4">
	            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	          </div>
	        <div class="row">
	        	<!-- Earnings (Monthly) Card Example -->
	            <div class="col-xl-4 col-md-6 mb-4">
	              <div class="card border-left-info shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pegawai</div>
	                      <div class="row no-gutters align-items-center">
	                        <div class="col-auto">
	                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pegawai; ?></div>
	                        </div>
	                        <div class="col">
	                          <div class="progress progress-sm mr-2">
	                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $pegawai; ?>%" aria-valuenow="<?= $pegawai; ?>" aria-valuemin="0" aria-valuemax="100"></div>
	                          </div>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>

	            <div class="col-xl-4 col-md-6 mb-4">
	              <div class="card border-left-info shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pegawai Laki-Laki</div>
	                      <div class="row no-gutters align-items-center">
	                        <div class="col-auto">
	                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $laki; ?></div>
	                        </div>
	                        <div class="col">
	                          <div class="progress progress-sm mr-2">
	                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= round($laki/$pegawai *100,2); ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	                          </div>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>

	            <div class="col-xl-4 col-md-6 mb-4">
	              <div class="card border-left-info shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pegawai Perempuan</div>
	                      <div class="row no-gutters align-items-center">
	                        <div class="col-auto">
	                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $perempuan; ?></div>
	                        </div>
	                        <div class="col">
	                          <div class="progress progress-sm mr-2">
	                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= round($perempuan/$pegawai * 100,2); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
	                          </div>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>

	            <div class="col-lg-12 mb-4">

	              <!-- Illustrations -->
	                <div class="card shadow mb-4">
	                  <div class="card-header py-3">
	                    <h6 class="m-0 font-weight-bold text-primary">Selamat Datang Kembali di halaman <?php if ($this->session->userdata('role_id') == '1') {echo "Admin";}elseif($this->session->userdata('role_id') == '2'){echo "Pimpinan";}elseif($this->session->userdata('role_id') == '3'){echo "Dosen";}elseif($this->session->userdata('role_id') == '4'){echo "Absensi";}?></h6>
	                  </div>
	                  <div class="card-body">
	                    <div class="text-center">
	                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/'); ?>undraw_posting_photo.svg" alt="">
	                    </div>
	                    <p>“Sunsets are proof that no matter what happens every day can end beautifull,”<br>- Kristen Butler-</p>
	                  </div>
	                </div>
	            </div>
	          </div>
	        </div>
        <!-- /.container-fluid -->
      </div>