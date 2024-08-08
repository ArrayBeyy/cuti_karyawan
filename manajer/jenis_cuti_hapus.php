<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_jenis_cuti where jenis_id='$id'");
header("location:jenis_cuti.php?alert=hapus");