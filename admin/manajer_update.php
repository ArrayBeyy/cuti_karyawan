<?php 
include '../koneksi.php';
$id = $_POST['id'];
$devisi = $_POST['devisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update tbl_manajer set manajer_devisi='$devisi', manajer_nip='$nip', manajer_nama='$nama', manajer_kelamin='$kelamin', manajer_alamat='$alamat', manajer_kontak='$kontak', manajer_username='$username' where manajer_id='$id'")or die(mysqli_error($koneksi));
		header("location:manajer.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update tbl_manajer set manajer_devisi='$devisi', manajer_nip='$nip', manajer_nama='$nama', manajer_kelamin='$kelamin', manajer_alamat='$alamat', manajer_kontak='$kontak', manajer_username='$username', manajer_password='$password' where manajer_id='$id'")or die(mysqli_error($koneksi));
		header("location:manajer.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:manajer.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
			mysqli_query($koneksi, "update tbl_manajer set manajer_devisi='$devisi', manajer_nip='$nip', manajer_nama='$nama', manajer_kelamin='$kelamin', manajer_alamat='$alamat', manajer_kontak='$kontak', manajer_username='$username', manajer_foto='$file_gambar' where manajer_id='$id'")or die(mysqli_error($koneksi));
			header("location:manajer.php?alert=edit");
		}else{
			mysqli_query($koneksi, "update tbl_manajer set manajer_devisi='$devisi', manajer_nip='$nip', manajer_nama='$nama', manajer_kelamin='$kelamin', manajer_alamat='$alamat', manajer_kontak='$kontak', manajer_username='$username', manajer_password='$password', manajer_foto='$file_gambar' where manajer_id='$id'")or die(mysqli_error($koneksi));
			header("location:manajer.php?alert=edit");
		}
	}
}

