<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

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
                          <th>Aksi</th>
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
                          <td>
                              <a href="" data-toggle="modal" data-target="#editfungsi" data-id="<?= $f->id_jabatan_fungsional; ?>">
                              <span class="badge badge-success">Edit</span>
                              </a>
                              <a href="<?= base_url("fungsi/hapus/").$f->id_jabatan_fungsional;?>">
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
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#fungsi">
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
      <div class="modal fade" id="fungsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan Fungsional</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("fungsi/add");?>">
                <div class="form-group">
                  <label>Nip Dosen</label>
                  <input type="text" class="form-control"  name="nip">
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" class="form-control"  name="tglstr">
                </div>
                <div class="form-group">
                  <label>Tanggal Berakhir</label>
                  <input type="date" class="form-control"  name="tglend">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control"  name="jabatan">
                </div>
                <div class="form-group">
                  <label>Nomor Sk</label>
                  <input type="text" class="form-control"  name="sk">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" class="form-control"  name="status">
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
      <div class="modal fade" id="editfungsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan Fungsional</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("fungsi/update")?>">
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
        $('#editfungsi').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("fungsi/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'jbt='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>