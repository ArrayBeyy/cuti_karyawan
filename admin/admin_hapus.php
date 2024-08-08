<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from tbl_admin where admin_id='$id'");
$c = mysqli_fetch_assoc($cek);
$foto = $c['admin_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from tbl_admin where admin_id='$id'");
header("location:admin.php?alert=hapus");