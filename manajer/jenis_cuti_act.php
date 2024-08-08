<?php 
include '../koneksi.php';
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
mysqli_query($koneksi,"insert into tbl_jenis_cuti values(NULL,'$jenis','$jumlah')");
header("location:jenis_cuti.php?alert=tambah");