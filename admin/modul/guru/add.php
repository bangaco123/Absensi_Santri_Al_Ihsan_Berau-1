<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Guru</h4>
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
        <a href="#">Data Guru</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Tambah Guru</a>
      </li>
    </ul>
  </div>
  <div class="row">

    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Masukkan Data Guru</h3>
        </div>
        <div class="card-body">
          <form action="?page=guru&act=proses" method="post" enctype="multipart/form-data" required>
            <div class="form-group">
              <label>NIP/NUPTK</label>
              <input name="nip" type="text" class="form-control" placeholder="NIP/NUPTK" required>
            </div>

            <div class="form-group">
              <label>Nama Guru</label>
              <input name="nama" type="text" class="form-control" placeholder="Nama dan Gelar" required>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input name="email" type="text" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group" required>
              <p>
                <img src="../assets/img/user/<?= $data['foto']; ?>" class="img-fluid rounded-circle kotak" style="height: 65px; width: 65px;" required>
              </p>
              <label>Foto</label>
              <input type="file" name="foto" required>
            </div>



            <div class="form-group">
              <button name="saveGuru" type="submit" class="btn btn-secondary"><i class="fa fa-save"></i> Simpan</button>
              <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>