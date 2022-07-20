	<?php
	$edit = mysqli_query($con, "SELECT * FROM tb_guru WHERE id_guru='$_GET[id]' ");
	foreach ($edit as $d) ?>
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
					<a href="#">Edit Guru</a>
				</li>
			</ul>
		</div>
		<div class="row was-validated">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h3 class="h4">Form Edit Guru</h3>
					</div>
					<div class="card-body">
						<form action="?page=guru&act=proses" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>NIP/NUPTK</label>
								<input type="hidden" name="id" value="<?= $d['id_guru'] ?>">
								<input name="nip" type="text" class="form-control" value="<?= $d['nip'] ?>" readonly>
							</div>

							<div class="form-group ">
								<label>Nama Guru</label>
								<input name="nama" type="text" class="form-control" value="<?= $d['nama_guru'] ?>" required>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input name="email" type="text" class="form-control" value="<?= $d['email'] ?>" required>
							</div>

							<div class="form-group">
								<button name="editGuru" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
								<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>