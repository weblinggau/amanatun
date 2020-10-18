<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

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
                          <th>Aksi</th>
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
                          <td>
                              <a href="" data-toggle="modal" data-target="#editsp" data-id="<?= $sp->id_surat_peringatan; ?>">
                              <span class="badge badge-success">Edit</span>
                              </a>
                              <a href="<?= base_url("peringatan/hapus/").$sp->id_surat_peringatan.'/'.$sp->id_jenis_sp;?>">
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
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#peringatan">
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
      <div class="modal fade" id="peringatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Surat Peringatan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("peringatan/add");?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="text" class="form-control"  name="nip">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control"  name="tgl">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="num">
                </div>
                <div class="form-group">
                  <label>Jenis SP</label>
                  <input type="text" class="form-control"  name="sp">
                </div>
                <div class="form-group">
                  <label>Perihal</label>
                  <input type="text" class="form-control"  name="ket">
                </div>
                <div class="form-group">
                    <label>Tipe file .pdf maksimal ukuran 2MB</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="berkas" required>
                      <label class="custom-file-label" for="customFile">Lampiran</label>
                    </div>
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
      <div class="modal fade" id="editsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Surat Peringatan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("peringatan/update")?>" enctype="multipart/form-data">
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
        $('#editsp').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("peringatan/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'sps='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>