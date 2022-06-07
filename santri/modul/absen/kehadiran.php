<div class="card">
	<div class="card-body">
		<h4 class="card-title">SANTRI | <b style="text-transform: uppercase;"><code> <?= $data['nama_santri'] ?> </code></b></h4>
		<hr>
		<div class="row">
			<?php
			// tampilkan data absen setiap bulan, berdasarkan tahun ajaran yg aktif
			$qry = mysqli_query($con, "SELECT * FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				WHERE _logabsensi.id_santri='$data[id_santri]' and tb_thajaran.status=1 and tb_semester.status=1 ");
			foreach ($qry as $bulan) { ?>
				<?php
				$bulan = date('m', strtotime($bulan['tgl_absen']));
				?>
				<div class="col-xl-12">
					<div class="card text-left">
						<div class="card-body">
							<b class="text-secondary" style="text-transform: uppercase;">HARI <?= date('D-M-Y') ?></b>
							<hr>
							<table cellpadding="5" width="100%">
								<tr>
									<td>Hadir</td>
									<td>:</td>
									<td>
										<?php
										$hadir = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS hadir FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='H' and MONTH(tgl_absen)='$bulan' "));
										echo $hadir['hadir'];
										?>
									</td>
								</tr>
								<tr>
									<td>Sakit</td>
									<td>:</td>
									<td>
										<?php
										$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS sakit FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='S' and MONTH(tgl_absen)='$bulan' "));
										echo $sakit['sakit'];
										?>
									</td>
								</tr>
								<tr>
									<td>Izin</td>
									<td>:</td>
									<td>
										<?php
										$izin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS izin FROM _logabsensi WHERE id_santri='$data[id_santri]' and ket='I' and MONTH(tgl_absen)='$bulan' "));
										echo $izin['izin'];
										?>
									</td>
								</tr>
								<tr>
									<td>Absen</td>
									<td>:</td>
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
			<?php } ?>
		</div>
	</div>
</div>

<a href="javascript:history.back()" class="btn btn-secondary btn-block"><i class="fas fa-arrow-circle-left"></i> Kembali</a>