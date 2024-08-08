<?php 
include '../koneksi.php';
$nama = $_POST['nama'];
mysqli_query($koneksi,"insert into tbl_devisi values(NULL,'$nama')");
header("location:devisi.php?alert=tambah");