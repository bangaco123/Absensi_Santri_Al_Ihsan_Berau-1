<div class="card-header bg-success-gradient text-white bubble-shadow">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Admin</h2>
				<h5 class="text-white op-7 mb-2">Selamat Datang,
					<b class="text-warning"><?= $data['nama_lengkap']; ?></b> | Aplikasi Monitoring Santri Pondok Al-ihsan Berau
				</h5>
			</div>
		</div>
	</div>
</div>
<div class="page-inner ">
	<div class="row mt--2">
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">
						<center>
							<div class="card-category">
								<h2>PONDOK HIDAYATULLAH AL-IHSAN BERAU</h2>
								<br>
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
							<div class="card card-dark bg-success-gradient">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<p class="card-category">Total Seluruh Santri</p>
											<h4 class="card-title"><?php echo $jumlahsantri; ?></h4>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-friends fa-2x "></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-dark bg-success-gradient">
								<div class=" card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<p class="card-category">Total Seluruh Guru</p>
											<h4 class="card-title"><?php echo $jumlahGuru; ?></h4>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-tie fa-4x"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8 col-md-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title text-center">Data Santri masuk pertahun </h4>
									<div>
										<hr>
										<canvas id="data"></canvas>
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