<div class="container-fluid">

        <div class="row">

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kepegawaian</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Pegawai</th>
                          <th>Nama</th>
                          <th>Sks Wajib</th>
                          <th>Masa Kerja</th>
                          <th>Nominal</th>
                          <th>Gapok</th>
                          <th>Tunjangan</th>
                          <th>Transport</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($pega as $pg) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $pg->nip_pegawai; ?></td>
                          <td><?= $pg->nama; ?></td>
                          <td><?= $pg->sks_wajib; ?></td>
                          <td><?= $pg->masa_kerja; ?></td>
                          <td><?= $pg->nominal; ?></td>
                          <td><?= $pg->gapok; ?></td>
                          <td><?= $pg->tunjangan; ?></td>
                          <td><?= $pg->transport; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>
            <!-- batas akhir -->

        <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Izin</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Pegawai</th>
                          <th>Tanggal</th>
                          <th>Jenis</th>
                          <th>Lama</th>
                          <th>Keperluan</th>
                          <th>Rentang Tanggal</th>
                          <th>Keterangan</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($izin as $iz) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $iz->nip_pegawai; ?></td>
                          <td><?= $iz->tgl_izin; ?></td>
                          <td><?= $iz->jenis; ?></td>
                          <td><?= $iz->lama; ?></td>
                          <td><?= $iz->keperluan; ?></td>
                          <td><?= $iz->rentang_tanggal; ?></td>
                          <td><?= $iz->keterangan; ?></td>
                          <td><?= $iz->status; ?></td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
              </div>
                </div>
            </div>
            <!-- batas akhir -->
        <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kepanitiaan</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Pegawai</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Lokasi</th>
                          <th>Honor</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($panitia as $pan) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $pan->nip_pegawai; ?></td>
                          <td><?= $pan->nama; ?></td>
                          <td><?= $pan->tanggal; ?></td>
                          <td><?= $pan->lokasi; ?></td>
                          <td><?= $pan->honor; ?></td>
                          <td><?= $pan->keterangan; ?></td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>

            <!-- batas akhir -->
        <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absen Dosen</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Pegawai</th>
                          <th>Tanggal</th>
                          <th>Hari</th>
                          <th>Masuk</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($absdos as $dos) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $dos->nip_pegawai; ?></td>
                          <td><?= $dos->tanggal; ?></td>
                          <td><?= $dos->hari; ?></td>
                          <td><?= $dos->masuk; ?></td>
                          <td><?= $dos->keterangan; ?></td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>

        <!-- batas akhir -->
        <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absen Pegawai</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Pegawai</th>
                          <th>Tanggal</th>
                          <th>Hari</th>
                          <th>Jam</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($abspeg as $peg) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $peg->nip_pegawai; ?></td>
                          <td><?= $peg->tanggal; ?></td>
                          <td><?= $peg->hari; ?></td>
                          <td><?= $peg->jam; ?></td>
                          <td><?= $peg->keterangan; ?></td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>
        <!-- batas akhir -->
        <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Surat Peringatan</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Pegawai</th>
                          <th>Nama</th>
                          <th>Jenis SP</th>
                          <th>Perihal</th>
                          <th>Tanggal</th>
                          <th>File</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($peringatan as $sp) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $sp->nip_pegawai; ?></td>
                          <td><?= $sp->nama; ?></td>
                          <td><?= $sp->jenis_sp; ?></td>
                          <td><?= $sp->perihal; ?></td>
                          <td><?= $sp->tanggal; ?></td>
                          <td>
                            <?php if ($sp->file == 'nofiles.pdf'){?>
                            <a href="">FILES TIDAK ADA</a>
                            <?php }else{?>
                            <a href="<?= base_url("upload/peringatan/").$sp->file;?>">DOWNLOAD FILES</a><?php } ?>
                          </td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>
        <!-- batas akhir -->
        <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Jabatan Fungsional</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip Dosen</th>
                          <th>Jabatan</th>
                          <th>Nomor SK</th>
                          <th>Tgl Mulai</th>
                          <th>Tgl Berakhir</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($fungsi as $f) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $f->nip_dosen; ?></td>
                          <td><?= $f->jabatan; ?></td>
                          <td><?= $f->nomor_sk; ?></td>
                          <td><?= $f->tgl_mulai; ?></td>
                          <td><?= $f->tgl_berakhir; ?></td>
                          <td><?= $f->status; ?></td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>
            

        </div>
      </div>
        <!-- /.container-fluid -->
</div>
      