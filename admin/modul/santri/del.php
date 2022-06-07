<?php
$del = mysqli_query($con, "DELETE FROM tb_santri WHERE id_santri=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=santri';
		</script>";
}
