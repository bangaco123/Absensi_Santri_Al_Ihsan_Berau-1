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
<div class="row-lg">
	<div class="col-lg-12 mt-3">
		<div class="card">
			<div class="card-body">
				<h1 class="text-center text-success">PONDOK AL-IHSAN</h1>
				<h4 class="card-title">Kehadiran Keseluruhan :
					<b class="text-success" style="text-transform: uppercase;"><?= $data['nama_santri'] ?></b>
				</h4>
				<div class="card-title my-3 ">Kegiatan Keseluruhan :
					<b class="text-success">
						<?php
						$q = "SELECT * FROM  tb_master_mapel
						-- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
						-- ORDER BY mapel DESC limit 3
						";
						$sql = mysqli_query($con, $q) or die(mysqli_error($con));
						while ($dat = mysqli_fetch_array($sql)) { ?>
							<?= $dat['mapel'] ?>|
						<?php
						} ?>
					</b>

				</div>
			</div>
		</div>
	</div>



	<?php
	// tampilkan data absen setiap bulan, berdasarkan tahun ajaran yg aktif
	$qry = mysqli_query($con, "SELECT * FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
	INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	WHERE _logabsensi.id_santri='$data[id_santri]' and tb_thajaran.status=1 and tb_semester.status=1
	GROUP BY MONTH(tgl_absen) ORDER BY MONTH(tgl_absen) DESC");
	foreach ($qry as $bulan) { ?>
		<?php
		$bulan = date('m', strtotime($bulan['tgl_absen']));
		?>
		<div class="container ">
			<div class="row ">
				<div class="col-lg-7 ">
					<div class="card text-left shadow table-responsive ">
						<div class="card-body">
							<h4 class="card-title text-center">Tabel Kehadiran Santri</h4>
							<h5 class="card-title text-center">Bulan <?= 'namaBulan'($bulan); ?> <?= date('Y') ?></h5>
							<hr>
							<table class="table text-center">
								<thead>
									<tr>
										<th scope="col">Hadir</th>
										<th scope="col">sakit</th>
										<th scope="col">Izin</th>
										<th scope="col">Alfa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<?php
											$hadir = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS hadir FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='H' and MONTH(tgl_absen)='$bulan' "));
											echo $hadir['hadir'];
											?>
										</td>
										<td>
											<?php
											$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS sakit FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='S' and MONTH(tgl_absen)='$bulan' "));
											echo $sakit['sakit'];
											?>
										</td>
										<td>
											<?php
											$izin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS izin FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='I' and MONTH(tgl_absen)='$bulan' "));
											echo $izin['izin'];
											?>
										</td>
										<td>
											<?php
											$alfa = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS alfa FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='A' and MONTH(tgl_absen)='$bulan' "));
											echo $alfa['alfa'];
											?>
										</td>
									</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="card shadow">
						<div class="card-body">
							<h4 class="card-title text-center mt-0">Diagram Kehadiran Santri</h4>
							<div>
								<canvas id="data"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>

		<div class="row-lg my-2">
			<div class="col">
				<a href="javascript:history.back()" class="btn btn-default btn-block"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
			</div>
		</div>
</div>