<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from tbl_manajer where manajer_id='$id'");
$c = mysqli_fetch_assoc($cek);
$foto = $c['manajer_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from tbl_manajer where manajer_id='$id'");
header("location:manajer.php?alert=hapus");