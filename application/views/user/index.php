<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username/Email</th>
                          <th>Jenis User</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($usera as $us) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $us->username; ?></td>
                          <td><?= $us->role; ?></td>
                          <td>
                              <a href="" data-toggle="modal" data-target="#edituser" data-id="<?= $us->id; ?>">
                              <span class="badge badge-success">Edit</span>
                              </a>
                              <a href="<?= base_url("usera/hapus/").$us->id;?>">
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
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#user">
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
      <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("usera/add");?>">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control"  name="email">
                </div>
                <div class="form-group">
                  <label>Jenis User</label>
                  <select class="form-control" name="role">
                    <option value="1">Admin</option>
                    <option value="2">Pimpinan</option>
                    <option value="3">Dosen</option>
                    <option value="4">Absensi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control"  name="pas">
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
      <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("usera/update")?>">
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
        $('#edituser').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("usera/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'user='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>