<!-- 
	NAMA   	: MUHAMMAD RIZQI RUHUL F
	NIM		: 18112437
-->
<?php
session_start();
include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../assets/img/h.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Login
					</span>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100 has-val" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100" data-placeholder="Username">Username</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="password">
						<input class="input100 has-val" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100" data-placeholder="Password">Password</span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							<i class="fa fa-sign-in fa-lg">masuk</i>
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('../assets/img/as.jpg');">
				</div>
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$pass = sha1($_POST['password']);
					$sqlCek = mysqli_query($con, "SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");
					$jml = mysqli_num_rows($sqlCek);
					$d = mysqli_fetch_array($sqlCek);

					if ($jml > 0) {
						$_SESSION['admin'] = $d['id_admin'];
						echo "
									<script type='text/javascript'>
									setTimeout(function () { 
									
									swal('(Berhasil) ', '', {
									icon : 'success',
									buttons: {        			
									confirm: {
									className : 'btn btn-success'
									}
									},
									});    
									},10);  
									window.setTimeout(function(){ 
									window.location.replace('./dashboard.php');
									} ,1000);   
									</script>";
					} else {
						echo "
									<script type='text/javascript'>
									setTimeout(function () { 
									
									swal('Gagal!', 'Username / Password Salah', {
									icon : 'error',
									buttons: {        			
									confirm: {
									className : 'btn btn-danger'
									}
									},
									});    
									},10);  
									window.setTimeout(function(){ 
									window.location.replace('index.php');
									} ,3000);   
									</script>";
					}
				}
				?>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/_login/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="../assets/_login/js/main.js"></script>


</body>

</html>