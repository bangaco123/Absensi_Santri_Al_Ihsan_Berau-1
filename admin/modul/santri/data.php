<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Santri</h4>
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
        <a href="#">Data Santri</a>
      </li>

    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <div class="d-flex align-items-center">
              <h2>Data Santri</h2>

              <a href="?page=santri&amp;act=add" class="btn btn btn-success btn-round ml-auto text-white">
                <i class="fa fa-plus"></i>
                Tambah
              </a>

              <!-- <a href="?page=santri&amp;act=add" class="btn btn-success btn-sm text-white">
                <i class="fa fa-plus"></i>
                Tambah</a> -->
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama santri</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Tahun Masuk</th>
                  <th>No Whatsapp</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $santri = mysqli_query($con, "SELECT * FROM tb_santri
                INNER JOIN tb_mkelas ON tb_santri.id_mkelas=tb_mkelas.id_mkelas
                ORDER BY id_santri ASC
                ");
                foreach ($santri as $g) { ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $g['nis']; ?></td>
                    <td><?= $g['nama_santri']; ?></td>
                    <td><?= $g['nama_kelas']; ?></td>
                    <td><?= $g['alamat']; ?></td>
                    <td><?= $g['th_angkatan']; ?></td>
                    <td><?= $g['no_wa']; ?></td>
                    <td><?php if ($g['status'] == 1) {
                          echo "<span class='badge badge-success'>Aktif</span>";
                        } else {
                          echo "<span class='badge badge-danger'>Off</span>";
                        } ?></td>
                    <td><img src="../assets/img/user/<?= $g['foto'] ?>" width="45" height="45"></td>
                    <td>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=santri&act=del&id=<?= $g['id_santri'] ?>"><i class="fas fa-trash"></i></a>
                      <a class="btn btn-info btn-sm" href="?page=santri&act=edit&id=<?= $g['id_santri'] ?>"><i class="far fa-edit"></i></a>
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