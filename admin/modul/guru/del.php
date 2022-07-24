<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($con, "DELETE FROM user WHERE id='$id'");

header("location:index.php?pesan=hapus");
