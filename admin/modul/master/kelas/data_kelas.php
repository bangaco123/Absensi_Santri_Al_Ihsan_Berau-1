<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Kelas</h4>
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
                <a href="#">Daftar Kelas</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#addKelas"><i class="fa fa-plus-circle"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kelas = mysqli_query($con, "SELECT * FROM tb_mkelas");
                            foreach ($kelas as $k) { ?>
                                <tr>
                                    <td><b><?= $no++; ?>.</b></td>

                                    <td><?= $k['nama_kelas']; ?></td>
                                    <td>

                                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_mkelas'] ?>"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delkelas&id=<?= $k['id_mkelas'] ?>"><i class="fas fa-trash"></i> Del</a>

                                        <!-- Modal -->
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?= $k['id_mkelas'] ?>" class="modal fade" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 id="exampleModalLabel" class="modal-title">Edit Kelas</h4>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <label>Nama Kelas</label>
                                                                        <input name="id" type="hidden" value="<?= $k['id_mkelas'] ?>" required>
                                                                        <input name="kelas" type="text" value="<?= $k['nama_kelas'] ?>" class="form-control" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button name="edit" class="btn btn-success" type="submit">Edit</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                        if (isset($_POST['edit'])) {
                                                            $save = mysqli_query($con, "UPDATE tb_mkelas SET nama_kelas='$_POST[kelas]' WHERE id_mkelas='$_POST[id]' ");
                                                            if ($save) {
                                                                echo "<script>
                                                alert('Data diubah !');
                                                window.location='?page=master&act=kelas';
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



            <!-- Modal -->
            <div id="addKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah Kelas</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label>Kode Kelas</label>
                                    <input name="kode" type="text" value="KL-<?= date('d'); ?>" class="form-control" readonly>
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <input name="kelas" type="text" placeholder="Nama kelas .." class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <button name="save" class="btn btn-success" type="submit">Simpan</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                                    </div>
                            </form>
                            <?php
                            if (isset($_POST['save'])) {
                                $a = $_POST['id'];
                                $b = $_POST['kelas'];

                                $q = mysqli_query($con, "SELECT * FROM tb_mkelas WHERE nama_kelas='$b'");
                                $cek = mysqli_num_rows($q);

                                if ($cek == 0) {
                                    $save = mysqli_query($con, "INSERT INTO tb_mkelas VALUES(NULL,'$_POST[kode]','$_POST[kelas]') ");
                                    if ($save) {
                                        echo "<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[kelas])','Berhasil Di Tambah' ,{
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=master&act=kelas');
				} ,3000);   
				</script>";
                                    }
                                } else {
                                    echo "<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[kelas])','Data Sudah Di Pakai' ,{
				icon : 'error',
				buttons: {        			
				confirm: {
				className : 'btn btn-danger'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=master&act=kelas');
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

        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>