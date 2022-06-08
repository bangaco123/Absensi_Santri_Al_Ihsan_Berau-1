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
			<h4 class="page-title">Presensi</h4>
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

		<div class="row">
			<div class="card">
				<div class="card-body">
					<form action="" method="post">
						<p>
							<span class="badge badge-default" style="padding: 7px;font-size: 14px;"><b>Daftar Kegiatan Santri</b>
							</span>
						</p>

						<div class="card-list">
							<input type="date" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>" style="background-color: #212121;color: #FFEB3B;">
							<?php
							// tampilakan data santri berdasarkan kelas yang dipilih
							$santri = mysqli_query($con, "SELECT * FROM tb_santri WHERE id_mkelas='$d[id_mkelas]' ORDER BY id_santri ASC ");
							$jumlahsantri = mysqli_num_rows($santri);
							foreach ($santri as $i => $s) { ?>
								<div class="item-list">
									<div class="info-user">
										<div class="username">
											<b class="text-success"><?= $s['nama_santri'] ?></b>
											<?php
											// tampilkan data yg sudah absen
											$tgl_hari_ini = date('Y-m-d');
											$santri_telah_absen_hari_ini = mysqli_query($con, "SELECT * FROM _logabsensi 
											INNER JOIN tb_santri ON _logabsensi.id_santri=tb_santri.id_santri 
											WHERE _logabsensi.id_santri='$s[id_santri]' AND _logabsensi.tgl_absen='$tgl_hari_ini' 
											AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND _logabsensi.ket='1'");
											if (mysqli_num_rows($santri_telah_absen_hari_ini) < 1) {
											}

											?>
											<code><?= $s['nis'] ?></code>
											<input type="hidden" name="id_santri-<?= $i; ?>" value="<?= $s['id_santri'] ?>">

											<input type="hidden" name="pelajaran" value="<?= $_GET['pelajaran'] ?>">
										</div>
										<div class="status mt-0">
											<div class="form-check">
												<label class="form-check-label">
													<input name="ket-<?= $i; ?>" class="form-check-input" type="checkbox" value="H">
													<span class="form-check-sign">H</span>
												</label>

												<label class="form-check-label">
													<input name="ket-<?= $i; ?>" class="form-check-input" type="checkbox" value="I">
													<span class="form-check-sign">I</span>
												</label>
												<label class="form-check-label">
													<input name="ket-<?= $i; ?>" class="form-check-input" type="checkbox" value="S">
													<span class="form-check-sign">S</span>
												</label>

												<label class="form-check-label">
													<input name="ket-<?= $i; ?>" class="form-check-input" type="checkbox" value="A">
													<span class="form-check-sign">A</span>
												</label>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

						</div>
						<center>
							<button type="submit" name="absen" class="btn btn-success ">
								<i class="fa fa-check"></i> Selesai
							</button>
							<a href="?page=absen&act=update&pelajaran=<?= $_GET['pelajaran']; ?>" class="btn btn-warning">
								<i class="fas fa-edit"></i> Update Kehadiran</a>
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
	</div>
	</div>