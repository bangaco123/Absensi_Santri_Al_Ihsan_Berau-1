<?php

if (isset($_POST['saveSantri'])) {
	$pass = sha1($_POST['nis']);
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_gambar);

	$a = $_POST['nis'];
	$b = $_POST['nama'];
	$c = $_POST['tempat'];
	$d = $_POST['tgl'];
	$f = $_POST['jk'];
	$g = $_POST['alamat'];
	$h = $_POST['kelas'];

	$q = mysqli_query($con, "SELECT * FROM tb_santri WHERE nis='$a'");
	$cek = mysqli_num_rows($q);
	if ($cek == 0) {
		if ($pindah) {
			$simpan = mysqli_query($con, "INSERT INTO tb_santri VALUES(NULL,'$_POST[nis]','$_POST[nama]','$_POST[tempat]','$_POST[tgl]','$_POST[jk]','$_POST[alamat]',
		'$pass','$nama_gambar','1','$_POST[th_masuk]','$_POST[no_wa]','$_POST[kelas]') ");

			if ($simpan) {
				echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama])','Berhasil Di Tamabah' ,{
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=santri');
				} ,3000);   
				</script>";
			}
		}
	} else {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('Gagal Menamabah NIS Telah Di Pakai ', '($_POST[nis]) ',{
				icon : 'error',
				buttons: {        			
				confirm: {
				className : 'btn btn-danger'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=santri&act=add');
				} ,3000);   
				</script>";
	}
} elseif (isset($_POST['editSantri'])) {

	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
		$ganti = mysqli_query($con, "UPDATE tb_santri SET foto='$gambar' WHERE id_santri='$_POST[id]' ");
	}

	$editSantri = mysqli_query($con, "UPDATE tb_santri SET nama_santri='$_POST[nama]',tempat_lahir='$_POST[tempat]',tgl_lahir='$_POST[tgl]',jk='$_POST[jk]',alamat='$_POST[alamat]',id_mkelas='$_POST[kelas]',th_angkatan='$_POST[th_masuk]' WHERE id_santri='$_POST[id]' ");
	if ($editSantri) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil di Ubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=santri');
				} ,3000);   
				</script>";
	}
}
