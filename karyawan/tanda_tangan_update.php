<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['id'];


$rand = rand();
$allowed =  array('png');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	header("location:index.php?alert=tanda_tangan");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
		header("location:index.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/tanda_tangan/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi,"update tbl_karyawan set karyawan_tanda_tangan='$file_gambar' where karyawan_id='$id'");
		header("location:index.php?alert=berhasil");
	}
}
