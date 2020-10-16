<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

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
                          <th>Aksi</th>
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
                          <td>
                              <a href="" data-toggle="modal" data-target="#editpegawai" data-id="<?= $pg->id_kepegawaian; ?>">
                              <span class="badge badge-success">Edit</span>
                              </a>
                              <a href="<?= base_url("pegawai/hapus/").$pg->id_kepegawaian.'/'.$pg->id_jabatan;?>">
                              <span class="badge badge-danger">Hapus</span>
                              </a>
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

            <div class="col-lg-4 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
                  </div>
                  <div class="card-body">
                    <p>Untuk menambahkan klik tombol berikut</p>
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#pegawai">
                      <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                      </span>
                      <span class="text">Tambah Data</span>
                    </a>
                    
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <div class="modal fade" id="pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kepegawaian</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("pegawai/add");?>">
                <div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="text" class="form-control"  name="nip">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="nama">
                </div>
                <div class="form-group">
                  <label>SKS Wajib</label>
                  <input type="text" class="form-control"  name="sks">
                </div>
                <div class="form-group">
                  <label>Masa Kerja</label>
                  <input type="text" class="form-control"  name="mas">
                </div>
                <div class="form-group">
                  <label>Nominal</label>
                  <input type="text" class="form-control"  name="nom">
                </div>
                <div class="form-group">
                  <label>Gapok</label>
                  <input type="number" class="form-control"  name="gapok">
                </div>
                <div class="form-group">
                  <label>Tunjangan</label>
                  <input type="number" class="form-control"  name="tunjangan">
                </div>
                <div class="form-group">
                  <label>Transport</label>
                  <input type="number" class="form-control"  name="trans">
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Save Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editpegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Kepegawaian</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("pegawai/update")?>">
              <div class="modal-data"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Edit Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#editpegawai').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("pegawai/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'pegawai='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>