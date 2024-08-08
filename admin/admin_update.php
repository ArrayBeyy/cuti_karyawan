<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update tbl_admin set admin_nama='$nama', admin_kontak='$kontak', admin_username='$username' where admin_id='$id'")or die(mysqli_error($koneksi));
		header("location:admin.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update tbl_admin set admin_nama='$nama', admin_kontak='$kontak', admin_username='$username', admin_password='$password' where admin_id='$id'")or die(mysqli_error($koneksi));
		header("location:admin.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
			mysqli_query($koneksi, "update tbl_admin set admin_nama='$nama', admin_kontak='$kontak', admin_username='$username', admin_foto='$file_gambar' where admin_id='$id'")or die(mysqli_error($koneksi));
			header("location:admin.php?alert=edit");
		}else{
			mysqli_query($koneksi, "update tbl_admin set admin_nama='$nama', admin_kontak='$kontak', admin_username='$username', admin_password='$password', admin_foto='$file_gambar' where admin_id='$id'")or die(mysqli_error($koneksi));
			header("location:admin.php?alert=edit");
		}
	}
}

