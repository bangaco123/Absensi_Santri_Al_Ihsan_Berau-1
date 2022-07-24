<?php
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

foreach ($kelasMengajar as $d)



?>

<div class="page-inner">

	<div class="page-header">
		<h4 class="page-title">KELAS (<?= strtoupper($d['nama_kelas']) ?> )</h4>
		<ul class="breadcrumbs" style="font-weight: bold;">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">KELAS (<?= strtoupper($d['nama_kelas']) ?> )</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#"><?= strtoupper($d['mapel']) ?></a>
			</li>
		</ul>
	</div>

	<div class="row p-6">
		<?php
		// dapatkan pertemuan terakhir 
		$last_pertemuan = mysqli_query($con, "SELECT * FROM _logabsensi WHERE id_mengajar='$_GET[pelajaran]' 
		GROUP BY pertemuan_ke ORDER BY pertemuan_ke DESC LIMIT 1  ");
		$cekPertemuan = mysqli_num_rows($last_pertemuan);
		$jml = mysqli_fetch_array($last_pertemuan);

		if ($cekPertemuan > 0) {
			$pertemuan = $jml['pertemuan_ke'] + 1;
		} else {
			$pertemuan = 1;
		}
		?>

		<div class="col-5 card">
			<div class="card-body">
				<form action="" method="post">
					<p>
						<span class="badge badge-default" style="padding: 7px;font-size: 14px;"><b>Daftar Hadir santri</b>
						</span>
						<span class="badge badge-primary" style="padding: 7px;font-size: 14px;">
							Pertemuan Ke : <b><?= $pertemuan; ?></b>
						</span>
					</p>

					<div class="card-list">
						<input type="date" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>" style="background-color: #212121;color: #FFEB3B;">
						<input type="hidden" name="pertemuan" class="form-control" value="<?= $pertemuan; ?>">
						<?php
						// tampilakan data santri berdasarkan kelas yang dipilih
						$santri = mysqli_query($con, "SELECT * FROM tb_santri WHERE id_mkelas='$d[id_mkelas]'
						ORDER BY id_santri ASC ");
						$jumlahsantri = mysqli_num_rows($santri);
						foreach ($santri as $i => $s) { ?>

							<div class="item-list">
								<div class="avatar">
									<img src="../assets/img/user/<?= $s['foto'] ?>" class="avatar-img rounded-circle">
								</div>
								<div class="info-user">
									<div class="username">
										<h3 class="text-success"><?= $s['nama_santri'] ?></h3>
										(<code><?= $s['nis'] ?></code>)
										<input type="hidden" name="id_santri-<?= $i; ?>" value="<?= $s['id_santri'] ?>">
										<input type="hidden" name="pelajaran" value="<?= $_GET['pelajaran'] ?>">
										<input type="hidden" name="mapel" value="<?= $_GET['mapel'] ?>">
									</div>
									<div class="status">
										<div class="form-check form-check-inline" required>

											<label class="form-check">
												<input name="ket-<?= $i; ?>" class="form-check-input" type="radio" value="H">
												<span class="form-check-sign">H</span>
											</label>

											<!-- <label class="selectgroup-item">
												<input type="radio" name="ket-<?= $i; ?>" value="H" class="selectgroup-input" required>
												<span class="selectgroup-button selectgroup-button-icon">H</span>
											</label> -->

											<label class="form-check 	">
												<input name="ket-<?= $i; ?>" class="form-check-input" type="radio" value="I" required>
												<span class="form-check-sign">I</span>
											</label>

											<!-- <label class="selectgroup-item">
												<input type="radio" name="ket-<?= $i; ?>" value="I" class="selectgroup-input" required>
												<span class="selectgroup-button selectgroup-button-icon">I</span>
											</label> -->


											<label class="form-check">
												<input name="ket-<?= $i; ?>" class="form-check-input" type="radio" value="S" required>
												<span class="form-check-sign">S</span>
											</label>

											<!-- <label class="selectgroup-item">
												<input type="radio" name="ket-<?= $i; ?>" value="S" class="selectgroup-input" required>
												<span class="selectgroup-button selectgroup-button-icon">S</span>
											</label> -->

											<label class="form-check">
												<input name="ket-<?= $i; ?>" class="form-check-input" type="radio" value="A" required>
												<span class="form-check-sign">A</span>
											</label>

											<!-- <label class="selectgroup-item">
												<input type="radio" name="ket-<?= $i; ?>" value="A" class="selectgroup-input" required>
												<span class="selectgroup-button selectgroup-button-icon">A</span>
											</label> -->

										</div>
									</div>
								</div>

							</div>
						<?php } ?>

					</div>

					<center>
						<button type="submit" name="absen" class="btn btn-success mb-1">
							<i class="fa fa-check"></i> Selesai
						</button>
						<a href="?page=absen&act=update&pelajaran=<?= $_GET['pelajaran']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Update Absesnsi</a>
						<!-- 	<a href="index.php" class="btn btn-default"><i class="fas fa-arrow-circle-left"></i> Kembali</a> -->
					</center>
			</div>
			</form>

			<?php
			if (isset($_POST['absen'])) {
				$total = $jumlahsantri - 1;
				$today = $_POST['tgl'];
				$pertemuan = $_POST['pertemuan'];

				for ($i = 0; $i <= $total; $i++) {

					$id_santri = $_POST['id_santri-' . $i];
					$pelajaran = $_POST['pelajaran'];
					$ket = $_POST['ket-' . $i];

					$cekAbsesnHariIni = mysqli_num_rows(mysqli_query($con, "SELECT * FROM _logabsensi WHERE tgl_absen='$today' AND id_mengajar='$pelajaran' AND id_santri='$id_santri' "));
					if ($cekAbsesnHariIni > 0) {
						echo "
													<script type='text/javascript'>
													setTimeout(function () { 
													swal('Sorry!', 'Absen Hari ini sudah dilakukan', {
													icon : 'error',
													buttons: {        			
													confirm: {
													className : 'btn btn-danger'
													}
													},
													});    
													},10);  
													window.setTimeout(function(){ 
													window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
													} ,3000);   
													</script>";
					} else {
						$insert = mysqli_query($con, "INSERT INTO _logabsensi VALUES (NULL,'$pelajaran','$id_santri','$today','$ket','$pertemuan')");
						if ($insert) {
							echo "
											<script type='text/javascript'>
											setTimeout(function () { 
											swal('Berhasil', 'Absen hari ini telah tersimpan!', {
											icon : 'success',
											buttons: {        			
											confirm: {
											className : 'btn btn-success'
											}
											},
											});    
											},10);  
											window.setTimeout(function(){ 
											window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
											} ,3000);   
											</script>";
						}
					}
				}
			}
			?>
		</div>
	</div>