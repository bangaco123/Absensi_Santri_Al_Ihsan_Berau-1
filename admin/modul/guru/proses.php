<?php

if (isset($_POST['saveGuru'])) {

	$pass = sha1($_POST['nip']);
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_gambar);

	$a = $_POST['nip'];
	$b = $_POST['nama'];
	$c = $_POST['tempat'];
	$d = $_POST['email'];

	$q = mysqli_query($con, "SELECT * FROM tb_guru WHERE nip='$a'");
	$cek = mysqli_num_rows($q);
	if ($cek == 0) {
		if ($pindah) {
			$save = mysqli_query($con, "INSERT INTO tb_guru VALUES(NULL,'$_POST[nip]','$_POST[nama]','$_POST[email]','$pass','$nama_gambar','Y') ");
			if ($save) {
				echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=guru');
				} ,3000);   
				</script>";
			}
		}
	} else {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('GAGAL MEMAMBAH NIP TELAH DIPAKAI ', '($_POST[nip]) ',{
				icon : 'error',
				buttons: {        			
				confirm: {
				className : 'btn btn-danger'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=guru&act=add');
				} ,3000);   
				</script>";
	}
} elseif (isset($_POST['editGuru'])) {

	$pass = sha1($_POST['email']);
	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
		$ganti = mysqli_query($con, "UPDATE tb_guru SET foto='$gambar' WHERE id_guru='$_POST[id]' ");
	}
	$editGuru = mysqli_query($con, "UPDATE tb_guru SET nama_guru='$_POST[nama]',email='$_POST[email]' WHERE id_guru='$_POST[id]' ");

	if ($editGuru) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=guru');
				} ,3000);   
				</script>";
	}
}
