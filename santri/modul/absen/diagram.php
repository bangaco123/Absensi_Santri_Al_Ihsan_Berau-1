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
<div class="row-md">
	<div class="col-lg-12 mt-3">
		<div class="card shadow">
			<div class="card-body">
				<h4 class="card-title text-center mt-0">Diagram Kehadiran Keseluruhan <code>
						<?= $data['nama_santri'] ?>
					</code></h4>
				<div>
					<canvas id="data"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row-lg my-2">
	<div class="col">
		<a href="javascript:history.back()" class="btn btn-default btn-block"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
	</div>
</div>
</div>