<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['id'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi,"update tbl_supervisor set supervisor_alamat='$alamat', supervisor_kontak='$kontak', supervisor_username='$username' where supervisor_id='$id'");
		header("location:index.php?alert=profil");
	}else{
		mysqli_query($koneksi,"update tbl_supervisor set supervisor_alamat='$alamat', supervisor_kontak='$kontak', supervisor_username='$username', supervisor_password='$password' where supervisor_id='$id'");
		header("location:index.php?alert=profil");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
			mysqli_query($koneksi,"update tbl_supervisor set supervisor_alamat='$alamat', supervisor_kontak='$kontak', supervisor_username='$username', supervisor_foto='$file_gambar' where supervisor_id='$id'");
			header("location:index.php?alert=profil");
		}else{
			mysqli_query($koneksi,"update tbl_supervisor set supervisor_alamat='$alamat', supervisor_kontak='$kontak', supervisor_username='$username', supervisor_password='$password', supervisor_foto='$file_gambar' where supervisor_id='$id'");
			header("location:index.php?alert=profil");
		}
	}
}
