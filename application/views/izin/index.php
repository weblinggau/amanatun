<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

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
                          <th>Aksi</th>
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
                          <td>
                              <a href="" data-toggle="modal" data-target="#editizin" data-id="<?= $iz->id_izin; ?>">
                              <span class="badge badge-success">Edit</span>
                              </a>
                              <a href="<?= base_url("izin/hapus/").$iz->id_izin.'/'.$iz->id_detail_izin;?>">
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
            <!-- batas akhir -->
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
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#izin">
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
      <div class="modal fade" id="izin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Izin</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("izin/add");?>">
                <div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="text" class="form-control"  name="nip">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control"  name="tgl">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control"  name="jenis">
                </div>
                <div class="form-group">
                  <label>Lama</label>
                  <input type="text" class="form-control"  name="lama">
                </div>
                <div class="form-group">
                  <label>Keperluan</label>
                  <input type="text" class="form-control"  name="kep">
                </div>
                <div class="form-group">
                  <label>Rentang Tanggal</label>
                  <input type="text" class="form-control"  name="ren">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control"  name="ket">
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
      <div class="modal fade" id="editizin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Izin</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("izin/update")?>">
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
        $('#editizin').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("izin/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'izin='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>