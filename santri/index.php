<?php
@session_start();
include '../config/db.php';

if (!isset($_SESSION['santri'])) {
?> <script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = '../user.php';
	</script>
<?php
}
?>

<?php
$id_login = @$_SESSION['santri'];
$sql = mysqli_query($con, "SELECT * FROM tb_santri
	INNER JOIN tb_mkelas ON tb_santri.id_mkelas=tb_mkelas.id_mkelas
 WHERE tb_santri.id_santri = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

// tampilkan data mengajar
$mengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 
INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_thajaran.status=1 ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Santri | Aplikasi Monitoring Al-ihsan Berau</title>
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
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="green">
				<a href="index.php" class="logo">
					<img src="../assets/img/h.png" alt="navbar brand" class="navbar-brand" width="40">
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
			<nav class="navbar navbar-header navbar-expand-lg " data-background-color="green">
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
											<div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $data['nama_santri'] ?></h4>
												<p class="text-muted"><?= $data['nip'] ?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="?page=change">Ganti Password</a>
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
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $data['nama_santri'] ?>
									<span class="user-level">Kelas <?= $data['nama_kelas'] ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="?page=change">
											<span class="link-collapse">Ganti Password</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-success">
						<li class="nav-item active">
							<a href="index.php" class="collapsed">
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
							<a href="?page=kehadiran">
								<i class="fas fa-clipboard-list"></i>
								<p>Presensi</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=kehadiran&act=diagram">
								<i class="fas fa-chart-pie"></i>
								<p>Diagram</p>
							</a>
						</li>

						<li class="nav-item active mt-3">
							<a href="logout.php" class="collapsed">
								<i class="fas fa-times"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<!-- Halaman dinamis -->
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];

				if ($page == 'kehadiran') {
					if ($act == '') {
						include 'modul/absen/kehadiran.php';
					} elseif ($act == 'diagram') {
						include 'modul/absen/diagram.php';
					}
				} elseif ($page == 'change') {
					include 'modul/user/ganti_password.php';
				} elseif ($page == '') {
					include 'modul/home.php';
				} else {
					echo "<b>Tidak ada Halaman</b>";
				}

				?>

				<!-- end -->

			</div>

			<!-- footer -->
			<footer class="footer">
				<div class="container">
					<div class="copyright ml-auto">
						&copy; <?php echo date('Y'); ?> Aplikasi Monitoring Santri Al-Ihsan Berau (<a href="index.php">Ruhul </a> )
					</div>
				</div>
			</footer>
			<!-- End footer -->

		</div>
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

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- cart js -->
	<!-- <script src="../assets/css/cart/js/vendor.bundle.base.js"></script> -->
	<script src="../assets/css/cart/chart.js/Chart.min.js"></script>
	<!-- <script src="../assets/css/cart/js/chart.js"></script> -->

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<script>
		const labels = [
			'Hadir',
			'sakit',
			'Izin ',
			'Alfa '

		];

		const data = {
			labels: labels,
			datasets: [{
				label: 'Data Kehadiran',
				data: [<?php
								$hadir = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS hadir FROM _logabsensi 
								WHERE id_santri='$data[id_santri]' and ket='H'"));
								echo $hadir['hadir'];
								?>,
					<?php
					$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS sakit FROM _logabsensi 
					WHERE id_santri='$data[id_santri]' and ket='S' "));
					echo $sakit['sakit'];
					?>,
					<?php
					$izin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS izin FROM _logabsensi
					WHERE id_santri='$data[id_santri]' and ket='I' "));
					echo $izin['izin'];
					?>,
					<?php
					$alfa = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS alfa FROM _logabsensi 
					WHERE id_santri='$data[id_santri]' and ket='A' "));
					echo $alfa['alfa'];
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
			type: 'bar',
			data: data,
			options: {},
		};
		const myChart = new Chart(
			document.getElementById('data'),
			config
		);
	</script>
</body>

</html>