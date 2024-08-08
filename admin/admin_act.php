<?php 
include '../koneksi.php';
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "INSERT INTO tbl_admin VALUES(NULL,'$nama','$kontak','$username','$password','admin_foto.png')")or die(mysqli_error($koneksi));
	header("location:admin.php?alert=tambah");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "INSERT INTO tbl_admin VALUES(NULL,'$nama','$kontak','$username','$password','$file_gambar')")or die(mysqli_error($koneksi));
	header("location:admin.php?alert=tambah");
	}
}

