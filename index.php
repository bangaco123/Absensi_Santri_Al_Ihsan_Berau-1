<!-- 
	NAMA   	: MUHAMMAD RIZQI RUHUL F
	NIM		: 18112437
-->
<?php
session_start();
include './config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="./assets/img/h.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
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
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz" autofocus required>
						<input class="input100 has-val" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100" data-placeholder="Username" autofocus required>username</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="password" autofocus required>
						<input class="input100 has-val" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100" data-placeholder="Password" autofocus required>Password</span>
					</div>
					<div class="flex-sb-lg w-full p-t-3 p-b-4">
						<div class="form-group mb-3">
							<select class="form-control" name="level">
								<option>USER</option>
								<option value="1">GURU</option>
								<option value="2">ORANG TUA SANTRI</option>
							</select>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn bg-dark">
							<i class="fa fa-sign-in fa-lg"> masuk</i>
						</button>
					</div>
				</form>
				<div class="login100-more" style=" background-image: url('./assets/img/as.jpg');">
				</div>
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$level = $_POST['level'];
					$pass = sha1($_POST['password']);
					if ($level == 1) {
						// Guru
						$sqlCek = mysqli_query($con, "SELECT * FROM tb_guru WHERE nip='$_POST[username]' AND password='$pass' AND status='Y'");
						$jml = mysqli_num_rows($sqlCek);
						$d = mysqli_fetch_array($sqlCek);
						if ($jml > 0) {
							$_SESSION['guru'] = $d['id_guru'];
							echo "
						<script type='text/javascript'>
						setTimeout(function () { 
						
						swal('($d[nama_guru]) ', 'Login berhasil', {
						icon : 'success',
						buttons: {        			
						confirm: {
						className : 'btn btn-success'
						}
						},
						});    
						},10);  
						window.setTimeout(function(){ 
						window.location.replace('./guru/');
						} ,3000);   
						</script>";
						} else {
							echo "
						<script type='text/javascript'>
						setTimeout(function () { 
						
						swal('Sorry!', 'Username / Password Salah', {
						icon : 'error',
						buttons: {        			
						confirm: {
						className : 'btn btn-danger'
						}
						},
						});    
						},10);  
						window.setTimeout(function(){ 
						window.location.replace('./');
						} ,3000);   
						</script>";
						}
					} elseif ($level == 2) {
						// santri
						$sqlCek = mysqli_query($con, "SELECT * FROM tb_santri WHERE nis='$_POST[username]' AND password='$pass' AND status='1'");
						$jml = mysqli_num_rows($sqlCek);
						$d = mysqli_fetch_array($sqlCek);
						if ($jml > 0) {
							$_SESSION['santri'] = $d['id_santri'];
							echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('($d[nama_santri]) ', 'Login berhasil', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./santri/');
								} ,1000);   
								</script>";
						} else {
							echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('Sorry!', 'Username / Password Salah', {
								icon : 'error',
								buttons: {        			
								confirm: {
								className : 'btn btn-danger'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./');
								} ,1000);   
								</script>";
						}
					} elseif ($level == 3) {
					} else {
						echo "<script type='text/javascript'>
								setTimeout(function () { 
								swal('Sorry!', 'Pilih Level User', {
								icon : 'error',
								buttons: {        			
								confirm: {
								className : 'btn btn-danger'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./');
								} ,1000);   
								</script>";
					}
				}
				?>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<!--===============================================================================================-->
	<script src="./assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/bootstrap/js/popper.js"></script>
	<script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="./assets/js/main.js"></script>


</body>

</html>