<?php
include '../../../config/db.php';

?>

<?php
$bulan = $_GET['bulan'];
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 
	INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru

	INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
	INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

	INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1  ");

foreach ($kelasMengajar as $d)
	// tampilkan data absen
	$qry = mysqli_query($con, "SELECT * FROM _logabsensi 
		INNER JOIN tb_santri ON _logabsensi.id_santri=tb_santri.id_santri
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1
		GROUP BY _logabsensi.id_santri  ORDER BY _logabsensi.id_santri ASC ");
foreach ($qry as $db)

	$tglBulan = $db['tgl_absen'];
$tglTerakhir = date('t', strtotime(1));

?>
<style>
	body {
		font-family: arial;
	}
</style>
<table width="100%">
	<tr>
		<td>
			<img src="../../../assets/img/h.png" width="130">
		</td>
		<td>
			<center>

				<h1>
					ABSEN KEGIATAN SANTRI <br>
					<small>AL-IHSAN BERAU</small>
				</h1>
				<hr>
				<em>
					JL. P. Hidayatullah, RT.22, Tanjung Redep, Tj. Redeb, Kec. Tj. Redeb, Kabupaten Berau, Kalimantan Timur 77315
					<br>Telp.(0554) 22176
				</em>

			</center>
		</td>
		<td>

			<table width="100%">
				<tr>
					<td colspan="2"><b style="border: 2px solid;padding: 7px;">
							KELAS ( <?= strtoupper($d['nama_kelas']) ?> )
						</b> </td>
					<td>
						<b style="border: 2px solid;padding: 7px;">
							<?= $d['semester'] ?> |
							<?= $d['tahun_ajaran'] ?>
						</b>
					</td>
					<td rowspan="5">
						<ul>
							<li>H = Hadir</li>
							<li>S = Sakit</li>
							<li>I = Izin</li>
							<li>A = Absen</li>
						</ul>

					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Nama Guru </td>
					<td>:</td>
					<td><?= $d['nama_guru'] ?></td>
				</tr>
				<tr>
					<td>Mata Kegiatan </td>
					<td>:</td>
					<td><?= $d['mapel'] ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<hr style="height: 3px;border: 1px solid;">


<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
	<tr>
		<td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
		<td rowspan="2" bgcolor="#EFEBE9">NAMA SANTRI</td>
		<td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
		<td colspan="<?= $tglTerakhir; ?>" style="padding: 8px;">PERTEMUAN BULAN : <b style="text-transform: uppercase;"><?php ($bulan); ?> <?= date('m-Y', strtotime($tglBulan)); ?></b></td>
		<td colspan="5" align="center" bgcolor="#EFEBE9">JUMLAH</td>
	</tr>
	<tr>
		<?php
		for ($i = 1; $i <= $tglTerakhir; $i++) {
			echo "<td bgcolor='#EFEBE9' align='center'>" . $i . "</td>";
		}
		?>
		<td></td>
		<td bgcolor="#FFC107" align="center">S</td>
		<td bgcolor="#4CAF50" align="center">I</td>
		<td bgcolor="#D50000" align="center">A</td>
		<td bgcolor="#2196F3" align="center">H</td>

	</tr>
	<?php
	// tampilkan absen Santri
	$no = 1;
	foreach ($qry as $ds) {
		$warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

	?>
		<tr>

		<tr bgcolor="<?= $warna; ?>">
			<td align="center"><?= $no++; ?></td>
			<td><?= $ds['nama_santri']; ?></td>
			<td align="center"><?= $ds['jk']; ?></td>
			<?php
			for ($i = 0; $i <= $tglTerakhir; $i++) {

			?>
				<td align="center" bgcolor="white">
					<?php
					$ket = mysqli_query($con, "SELECT * FROM _logabsensi
					INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
					INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
					INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
					WHERE DAY(tgl_absen)='$i' AND id_santri='$ds[id_santri]' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 ");
					foreach ($ket as $h)

						// echo $h['ket'];
						if ($h['ket'] == 'H') {
							echo "<b style='color:#2196F3;'>H</b>";
						} elseif ($h['ket'] == 'I') {
							echo "<b style='color:#4CAF50;'>I</b>";
						} elseif ($h['ket'] == 'S') {
							echo "<b style='color:#FFC107;'>S</b>";
						} elseif ($h['ket'] == 'A') {
							echo "<b style='color:#D50000;'>A</b>";
						}
					?>
				</td>
			<?php }
			?>
			<td align="center" style="font-weight: bold;">
				<?php
				$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS sakit FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				WHERE _logabsensi.id_santri='$ds[id_santri]' and _logabsensi.ket='S' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $sakit['sakit'];

				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$izin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS izin FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				WHERE _logabsensi.id_santri='$ds[id_santri]' and _logabsensi.ket='I' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $izin['izin'];

				?>
			</td align="center" style="font-weight: bold;">
			<td align="center" style="font-weight: bold;">
				<?php
				$alfa = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS alfa FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				WHERE _logabsensi.id_santri='$ds[id_santri]' and _logabsensi.ket='A' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $alfa['alfa'];

				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$hadir = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS hadir FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				WHERE _logabsensi.id_santri='$ds[id_santri]' and _logabsensi.ket='H' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $hadir['hadir'];

				?>
			</td>
		</tr>
	<?php } ?>
</table>


<table width="100%">
	<tr>
		<td align="right">
			<p>
				Berau, <?php echo date('d-F-Y'); ?>
			</p>
			<p>
				Kepala Asrama
				<br>
				<br>
				<br>
				<br>
				<br>
				Sabarudin Ado s.pd <br>
				----------------------<br>
				NIP.-
			</p>
		</td>
	</tr>
</table>

<script>
	window.print();
</script>