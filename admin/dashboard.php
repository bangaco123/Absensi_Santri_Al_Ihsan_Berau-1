	<?php
	session_start();
	include '../config/db.php';

	if (!isset($_SESSION['admin'])) {
	?> <script>
			alert('Maaf ! Anda Belum Login !!');
			window.location = 'index.php';
		</script>
	<?php
	}
	?>

	<?php
	// jumlah santri
	$jumlahsantri = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_santri WHERE status=1 "));
	// jumlah guru
	$jumlahGuru = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_guru WHERE status='Y' "));

	$id_login = @$_SESSION['admin'];

	$sql = mysqli_query($con, "SELECT * FROM tb_admin
	WHERE id_admin = '$id_login'") or die(mysqli_error($con));
	$data = mysqli_fetch_array($sql);
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Administrator | Aplikasi Monitoring Al-ihsan Berau</title>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="icon" href="../assets/img/h.png" type="image/x-icon" />
		<!-- Fonts and icons -->
		<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Lato:300,400,700,900"]
				},
				custom: {
					"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
					urls: ['../assets/css/fonts.min.css']
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<!-- CSS Files -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/atlantis.min.css">

		<!-- CSS Just for demo purpose, don't include it in your project -->
		<!-- <link rel="stylesheet" href="../assets/css/demo.css"> -->
	</head>

	<body>
		<!--start awal-->
		<div class="wrapper">
			<div class="main-header">

				<!-- Logo Header -->
				<div class="logo-header" data-background-color="green">
					<a href="dashboard.php" class="logo">
						<img src="../assets/img/h.png" alt="navbar brand" class="navbar-brand" width="50">
						<b class="text-white">AL-IHSAN</b>
					</a>
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
					<div class="nav-toggle">
						<button class="btn btn-toggle toggle-sidebar">
							<i class="icon-menu"></i>
						</button>
					</div>
				</div>
				<!-- End Logo Header -->

				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green">
					<div class="container-fluid">
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<li class="nav-item dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg">
													<img src="../assets/img/user/<?= $data['foto'] ?>" alt="image profile" class="avatar-img rounded">
												</div>
												<div class="u-text">
													<h4><?= $data['nama_guru'] ?></h4>
													<p class="text-muted "><?= $data['email'] ?></p>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#gantiPassword" class="collapsed">Ganti Password</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#pengaturanAkun" class="collapsed fa-menu">Account Setting</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="logout.php">Keluar</a>
										</li>
									</div>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>

			<!-- Sidebar -->
			<div class="sidebar sidebar-style-2 ">
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">

						<div class="user">
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<?= $data['nama_lengkap'] ?>
										<span class="user-level">ADMIN</span>
										<span class="caret"></span>
									</span>
								</a>
								<div class="clearfix"></div>
								<div class="collapse in" id="collapseExample">
									<ul class="nav">
										<li>
											<a href="#" data-toggle="modal" data-target="#pengaturanAkun" class="collapsed">
												<span class="link-collapse ">Pengaturan Akun</span>
											</a>
										</li>
										<li>
											<a href="#" data-toggle="modal" data-target="#gantiPassword" class="collapsed">
												<span class="link-collapse">Ganti Password</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<ul class="nav nav-success">
							<li class="nav-item active">
								<a href="dashboard.php" class="collapsed">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>
								</a>
							</li>

							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Main Utama</h4>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#base">
									<i class="fas fa-folder-open"></i>
									<p>Data Umum</p>
									<span class="caret"></span>
								</a>

								<div class="collapse" id="base">
									<ul class="nav nav-collapse">
										<li>
											<a href="?page=master&act=kelas">
												<span class="sub-item">Kelas</span>
											</a>
										</li>
										<li>
											<a href="?page=master&act=semester">
												<span class="sub-item">Semester</span>
											</a>
										</li>
										<li>
											<a href="?page=master&act=ta">
												<span class="sub-item">Tahun Ajaran</span>
											</a>
										</li>
										<li>
											<a href="?page=master&act=mapel">
												<span class="sub-item">Mata Kegiatan</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarLayouts">
									<i class="fas fa-calendar-check"></i>
									<p>Jadwal Kegiatan</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts">
									<ul class="nav nav-collapse">
										<li>
											<a href="?page=jadwal&act=add ">
												<span class="sub-item"> Tambah Jadwal</span>
											</a>
										</li>
										<li>
											<a href="?page=jadwal">
												<span class="sub-item"> Daftar Kegiatan</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#guru">
									<i class="fas fa-user-tie"></i>
									<p>Data Guru</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="guru">
									<ul class="nav nav-collapse">
										<li>
											<a href="?page=guru&act=add ">
												<span class="sub-item"> Tambah Guru </span>
											</a>
										</li>
										<li>
											<a href="?page=guru">
												<span class="sub-item"> Daftar Guru </span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#santri">
									<i class="fas fa-user-graduate"></i>
									<p>Data Santri</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="santri">
									<ul class="nav nav-collapse">
										<li>
											<a href="?page=santri&act=add ">
												<span class="sub-item"> Tambah Santri </span>
											</a>
										</li>
										<li>
											<a href="?page=santri">
												<span class="sub-item"> Daftar Santri </span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#rekapAbsen">
									<i class="fas fa-clipboard-check"></i>
									<p>Rekap Absen</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="rekapAbsen">
									<ul class="nav nav-collapse">
										<?php
										$kelas = mysqli_query($con, "SELECT * FROM tb_mkelas ORDER BY id_mkelas");
										foreach ($kelas as $k) { ?>
											<li>
												<a href="?page=rekap&kelas=<?= $k['id_mkelas'] ?> ">
													<span class="sub-item">KELAS <?= strtoupper($k['nama_kelas']); ?></span>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>

							<li class="nav-item active mt-3">
								<a href="logout.php" class="collapsed">
									<i class="fas fa-times "></i>
									<p>Logout</p>
								</a>
							</li>

							<li class="nav-item active mt-3">
								<a href="logout.php" class="collapsed">
									<p>coba keluar</p>

								</a>

							</li>

						</ul>
					</div>
				</div>
			</div>
			<!-- End Sidebar -->

			<!-- Halaman Dinamis -->
			<div class="main-panel">
				<div class="content">
					<!-- Halaman dinamis -->
					<?php
					error_reporting();
					$page = @$_GET['page'];
					$act = @$_GET['act'];

					if ($page == 'master') {
						// kelas
						if ($act == 'kelas') {
							include 'modul/master/kelas/data_kelas.php';
						} elseif ($act == 'delkelas') {
							include 'modul/master/kelas/del.php';
							// semster
						} elseif ($act == 'semester') {
							include 'modul/master/semester/data.php';
						} elseif ($act == 'delsemester') {
							include 'modul/master/semester/del.php';
						} elseif ($act == 'set_semester') {
							include 'modul/master/semester/set.php';
						}
						// tahun ajaran
						elseif ($act == 'ta') {
							include 'modul/master/ta/data.php';
						} elseif ($act == 'delta') {
							include 'modul/master/ta/del.php';
						} elseif ($act == 'set_ta') {
							include 'modul/master/ta/set.php';
							// mapel
						} elseif ($act == 'mapel') {
							include 'modul/master/mapel/data.php';
						} elseif ($act == 'delmapel') {
							include 'modul/master/mapel/del.php';
						}
						//guru
					} elseif ($page == 'guru') {
						if ($act == '') {
							include 'modul/guru/data.php';
						} elseif ($act == 'add') {
							include 'modul/guru/add.php';
						} elseif ($act == 'edit') {
							include 'modul/guru/edit.php';
						} elseif ($act == 'del') {
							include 'modul/guru/del.php';
						} elseif ($act == 'proses') {
							include 'modul/guru/proses.php';
						}
						//sanrti
					} elseif ($page == 'santri') {
						if ($act == '') {
							include 'modul/santri/data.php';
						} elseif ($act == 'add') {
							include 'modul/santri/add.php';
						} elseif ($act == 'edit') {
							include 'modul/santri/edit.php';
						} elseif ($act == 'del') {
							include 'modul/santri/del.php';
						} elseif ($act == 'proses') {
							include 'modul/santri/proses.php';
						}
						//jadwal
					} elseif ($page == 'jadwal') {
						if ($act == '') {
							include 'modul/jadwal/data_mengajar.php';
						} elseif ($act == 'add') {
							include 'modul/jadwal/tambah.php';
						} elseif ($act == 'cancel') {
							include 'modul/jadwal/cancel.php';
						}
						//rekap
					} elseif ($page == 'rekap') {
						if ($act == '') {
							include 'modul/rekap/rekap_absen.php';
						} elseif ($act = 'rekap-perbulan') {
							include 'modul/rekap/rekap_perbulan.php';
						}
						//jadwal
					} elseif ($page == 'jadwal') {
						if ($act == '') {
							include 'modul/jadwal/data_mengajar.php';
						} elseif ($act == 'add') {
							include 'modul/jadwal/tambah.php';
						} elseif ($act == 'cancel') {
							include 'modul/jadwal/cancel.php';
						}
					} elseif ($page == '') {
						include 'modul/home.php';
					} else {
						echo "<b>Tidak ada Halaman</b>";
					}
					?>
					<!-- end -->
				</div>

				<!-- modal ganti password -->
				<div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPass">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header  bg-success">
								<h4 class="modal-title" id="gantiPass">Ganti Password</h4>
							</div>
							<form action="" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label">Password Lama</label>
										<input name="pass" type="text" class="form-control" placeholder="Password Lama">
									</div>
									<div class="form-group">
										<label class="control-label">Password Baru</label>
										<input name="pass1" type="text" class="form-control" placeholder="Password Baru">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button name="changePassword" type="submit" class="btn btn-secondary">Ganti Password</button>
								</div>
							</form>
							<?php
							if (isset($_POST['changePassword'])) {
								$passLama = $data['password'];
								$pass = sha1($_POST['pass']);
								$newPass = sha1($_POST['pass1']);

								if ($passLama == $pass) {
									$set = mysqli_query($con, "UPDATE tb_admin SET password='$newPass' WHERE id_admin='$data[id_admin]' ");
									echo "<script type='text/javascript'>
											alert('Password Telah berubah')
											window.location.replace('dashboard.php'); 
											</script>";
								} else {
									echo "<script type='text/javascript'>
											alert('Password Lama Tidak cocok')
											window.location.replace('dashboard.php'); 
											</script>";
								}
							}
							?>
						</div>
					</div>
				</div>

				<!--end modal ganti password -->

				<!-- Modal pengaturan akun-->
				<div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header  bg-success">
								<h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan Akun</h3>
							</div>
							<form action="" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="form-group">
										<label>Nama Lengkap</label>
										<input type="text" name="nama" class="form-control" value="<?= $data['nama_lengkap'] ?>">
										<input type="hidden" name="id" value="<?= $data['id_admin'] ?>">
									</div>
									<div class="form-group">
										<label>Nama Admin</label>
										<input type="text" name="username" class="form-control" value="<?= $data['username'] ?>">
									</div>
									<div class="form-group">
										<label>Foto Profile</label>
										<p>
											<img src="../assets/img/user/<?= $data['foto'] ?>" class="img-thumbnail" style="height: 50px;width: 50px;">
										</p>
										<input type="file" name="foto">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button name="updateProfile" type="submit" class="btn btn-secondary">Simpan</button>
								</div>
							</form>
							<?php
							if (isset($_POST['updateProfile'])) {

								$gambar = @$_FILES['foto']['name'];
								if (!empty($gambar)) {
									move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
									$ganti = mysqli_query($con, "UPDATE tb_admin SET foto='$gambar' WHERE id_admin='$_POST[id]' ");
								}

								$sqlEdit = mysqli_query($con, "UPDATE tb_admin SET nama_lengkap='$_POST[nama]',username='$_POST[username]' 
                                WHERE id_admin='$_POST[id]'") or die(mysqli_error($konek));

								if ($sqlEdit) {
									echo "<script>
							alert('Sukses ! Data berhasil diperbarui');
							window.location='dashboard.php';
							</script>";
								}
							}
							?>
						</div>
					</div>
				</div>
				<!-- end modal pengaturan akun -->

			</div>
			<!-- End Halaman Dinamis -->

		</div>

		<!--   Core JS Files   -->
		<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>

		<!-- jQuery UI -->
		<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

		<!-- jQuery Scrollbar -->
		<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

		<!-- Datatables -->
		<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

		<!-- Sweet Alert -->
		<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

		<!-- cart js -->
		<!-- <script src="../assets/css/cart/js/vendor.bundle.base.js"></script> -->
		<script src="../assets/css/cart/chart.js/Chart.min.js"></script>
		<!-- <script src="../assets/css/cart/js/chart.js"></script> -->
		<!-- Atlantis JS -->
		<script src="../assets/js/atlantis.min.js"></script>

		<!-- Atlantis DEMO methods, don't include it in your project! -->
		<script src="../assets/js/setting-demo.js"></script>

		<!--penting-->
		<script>
			$(document).ready(function() {
				$('#basic-datatables').DataTable({});

				$('#multi-filter-select').DataTable({
					"pageLength": 5,
					initComplete: function() {
						this.api().columns().every(function() {
							var column = this;
							var select = $('<select class="form-control"><option value=""></option></select>')
								.appendTo($(column.footer()).empty())
								.on('change', function() {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val()
									);

									column
										.search(val ? '^' + val + '$' : '', true, false)
										.draw();
								});

							column.data().unique().sort().each(function(d, j) {
								select.append('<option value="' + d + '">' + d + '</option>')
							});
						});
					}
				});

				// Add Row
				$('#add-row').DataTable({
					"pageLength": 5,
				});

				var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

				$('#addRowButton').click(function() {
					$('#add-row').dataTable().fnAddData([
						$("#addName").val(),
						$("#addPosition").val(),
						$("#addOffice").val(),
						action
					]);
					$('#addRowModal').modal('hide');

				});
			});
		</script>
		<!--penting-->

		<!-- chart -->
		<script>
			const labels = [
				'2022',
				'2021',
				'2020',

			];

			const data = {
				labels: labels,
				datasets: [{
					// label: '',
					data: [<?php $qry = $con->query("SELECT th_angkatan FROM tb_santri WHERE th_angkatan='2022'");
									$q = $qry->num_rows;
									echo $q;
									?>,
						<?php $qry = $con->query("SELECT th_angkatan FROM tb_santri WHERE th_angkatan='2021'");
						$q = $qry->num_rows;
						echo $q;
						?>,
						<?php $qry = $con->query("SELECT th_angkatan FROM tb_santri WHERE th_angkatan='2020'");
						$q = $qry->num_rows;
						echo $q;
						?>
					],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(255, 159, 64, 0.2)',
						'rgba(255, 205, 100, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(201, 203, 207, 0.2)'
					],
					borderColor: [
						'rgb(255, 99, 132)',
						'rgb(255, 159, 64)',
						'rgb(255, 205, 86)',
						'rgb(75, 192, 192)',
						'rgb(54, 162, 235)',
						'rgb(153, 102, 255)',
						'rgb(201, 203, 207)'
					],
					borderWidth: 1
				}]
			};

			const config = {
				type: 'pie',
				data: data,
				options: {},
			};
			const myChart = new Chart(
				document.getElementById('data'),
				config
			);
		</script>
		<!-- chart -->

	</body>

	</html>