<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
mysqli_query($koneksi,"update tbl_devisi set devisi_nama='$nama' where devisi_id='$id'");
header("location:devisi.php?alert=edit");