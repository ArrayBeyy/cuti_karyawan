<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from tbl_supervisor where supervisor_id='$id'");
$c = mysqli_fetch_assoc($cek);
$foto = $c['supervisor_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from tbl_supervisor where supervisor_id='$id'");
header("location:supervisor.php?alert=hapus");