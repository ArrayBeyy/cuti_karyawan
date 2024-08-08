<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_cuti where cuti_id='$id'");
header("location:cuti_saya.php?alert=hapus");