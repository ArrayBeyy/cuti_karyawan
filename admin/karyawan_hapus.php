<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from tbl_karyawan where karyawan_id='$id'");
$c = mysqli_fetch_assoc($cek);
$foto = $c['supervisor_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from tbl_karyawan where karyawan_id='$id'");
mysqli_query($koneksi,"delete from tbl_cuti where cuti_pegawai='$id'");
header("location:karyawan.php?alert=hapus");