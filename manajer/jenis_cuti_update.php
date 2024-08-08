<?php 
include '../koneksi.php';
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi,"update tbl_jenis_cuti set jenis_nama='$jenis', jenis_jumlah='$jumlah' where jenis_id='$id'");
header("location:jenis_cuti.php?alert=edit");