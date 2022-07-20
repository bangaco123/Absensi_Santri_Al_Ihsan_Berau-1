<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Mata Kegiatan</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="#">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Data Umum</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Daftar Mata Kegiatan</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="card-title ">
            <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kegiatan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $mapel = mysqli_query($con, "SELECT * FROM tb_master_mapel");
                foreach ($mapel as $k) { ?>
                  <tr>
                    <td><?= $no++; ?>.</td>


                    <td><?= $k['mapel']; ?></td>
                    <td>

                      <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_mapel'] ?>"><i class="far fa-edit"></i> Edit</a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delmapel&id=<?= $k['id_mapel'] ?>"><i class="fas fa-trash"></i> Del</a>

                      <!-- Modal -->
                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?= $k['id_mapel'] ?>" class="modal fade" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit kegiatan</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <div class="row">
                                  <div class="col-md-10">
                                    <div class="form-group">
                                      <label>Nama kegiatan</label>
                                      <input name="id" type="hidden" value="<?= $k['id_mapel'] ?>">
                                      <input name="mapel" type="text" value="<?= $k['mapel'] ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                      <button name="edit" class="btn btn-success" type="submit">Edit</button>

                                    </div>
                                  </div>
                                </div>
                              </form>
                              <?php
                              if (isset($_POST['edit'])) {
                                $save = mysqli_query($con, "UPDATE tb_master_mapel SET mapel='$_POST[mapel]' WHERE id_mapel='$_POST[id]' ");
                                if ($save) {
                                  echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=mapel';
                        </script>";
                                }
                              }

                              ?>


                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->



                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>




          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Tambah kegiatan</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <label>Kode kegiatan</label>
            <input name="kode" type="text" value="MP-<?= date('d-y') ?>" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Nama kegiatan</label>
            <input name="mapel" type="text" placeholder="Nama Kegiatan" class="form-control" required>
          </div>


          <div class="form-group">
            <button name="save" class="btn btn-success" type="submit">Save</button>
          </div>
        </form>
        <?php
        if (isset($_POST['save'])) {
          $a = $_POST['kode'];
          $b = $_POST['mapel'];

          $q = mysqli_query($con, "SELECT * FROM tb_master_mapel WHERE mapel='$b'");
          $cek = mysqli_num_rows($q);

          if ($cek == 0) {
            $save = mysqli_query($con, "INSERT INTO tb_master_mapel VALUES(NULL,'$_POST[kode]','$_POST[mapel]') ");
            if ($save) {
              echo "<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[mapel])','Berhasil Di Tambah' ,{
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=master&act=mapel');
				} ,3000);   
				</script>";
            }
          } else {
            echo "<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[mapel])','Data Sudah Di Pakai' ,{
				icon : 'error',
				buttons: {        			
				confirm: {
				className : 'btn btn-danger'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=master&act=mapel');
				} ,3000);   
				</script>";
          }
        }

        ?>


      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->