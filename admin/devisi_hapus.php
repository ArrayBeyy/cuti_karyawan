<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from tbl_devisi where devisi_id='$id'");
mysqli_query($koneksi, "delete from tbl_cuti where cuti_devisi='$id'");
header("location:devisi.php?alert=hapus");