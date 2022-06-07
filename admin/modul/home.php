<div class="panel-header bg-success-gradient ">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Admin</h2>
				<h5 class="text-white op-7 mb-2">Selamat Datang, <b class="text-warning"><?= $data['nama_lengkap']; ?></b> | Aplikasi Monitoring Santri</h5>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">
						<center>

							<div class="card-category">
								<center><img src="../assets/img/h.png" width="200">
									<hr>
									<p>Hidayatullah adalah organisasi massa Islam yang terbentuk di Kalimantan Timur pada 5 Februari 1973.
										Organisasi ini memiliki cabang tersebar di seluruh Indonesia.
										Hidayatullah juga dikenal sebagai organisasi yang banyak mengirimkan dai-dai ke daerah-daerah terisolasi.
									</p>
								</center>
							</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-5">
											<p class="card-category">Total Santri</p>
											<h4 class="card-title"><?php echo $jumlahsantri; ?></h4>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-friends fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-5">
											<p class="card-category">Total Guru</p>
											<h4 class="card-title"><?php echo $jumlahGuru; ?></h4>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-tie fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>