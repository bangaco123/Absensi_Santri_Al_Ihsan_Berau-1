<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">santri</h4>
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
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Tambah Santri</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-12 pt-8">
      <div class="col-md-8 grid-margin">
        <div class="card">
          <div class="card-body">
            <h3 class="h4">Masukkan Data Santri</h3>
          </div>
          <div class="card-body">
            <form action="?page=santri&act=proses" method="post" enctype="multipart/form-data">
              <table cellpadding="10" style="font-weight: bold;">
                <hr>
                <tr>
                  <td>Nama Santri </td>
                  <td>:</td>
                  <td><input type="text" class="form-control" name="nama" placeholder="Nama lengkap"></td>
                </tr>
                <tr>
                  <td>Nomor Induk Santri</td>
                  <td>:</td>
                  <td><input name="nis" type="text" class="form-control" placeholder="Nomor Induk Santri"> </td>
                </tr>
                <tr>
                  <td>Tempat,Tanggal Lahir </td>
                  <td>:</td>
                  <td><input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir"></td>
                  <td>/</td>
                  <td><input type="date" class="form-control" name="tgl" placeholder="Tanggal Lahir"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin </td>
                  <td>:</td>
                  <td>
                    <select name="jk" class="form-control">
                      <option value="L">Laki-laki</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <td>Alamat Santri</td>
                  <td>:</td>
                  <td><textarea name="alamat" class="form-control" placeholder="Alamat Santri"></textarea></td>
                </tr>

                <tr>
                  <td>Kelas santri</td>
                  <td>:</td>
                  <td>
                    <select class="form-control" name="kelas">
                      <option>Pilih Kelas</option>
                      <?php
                      $sqlKelas = mysqli_query($con, "SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC");
                      while ($kelas = mysqli_fetch_array($sqlKelas)) {
                        echo "<option value='$kelas[id_mkelas]'>$kelas[nama_kelas]</option>";
                      }
                      ?>
                    </select>
                  </td>
                </tr>

                </tr>
                <tr>
                  <td>Tahun Masuk</td>
                  <td>:</td>
                  <td><input name="th_masuk" type="number" class="form-control" placeholder="2021-2022"></td>
                </tr>
                <tr>
                  <td>No Whatsapp</td>
                  <td>:</td>
                  <td><input name="no_wa" type="text" class="form-control" placeholder="+621234567890"></td>
                </tr>
                <tr>
                  <td>Pas Foto</td>
                  <td>:</td>
                  <td><input type="file" class="form-control" name="foto"></td>
                </tr>
                <tr>
                  <td colspan="3 mt-2">
                    <button name="saveSantri" type="submit" class="btn btn-secondary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>