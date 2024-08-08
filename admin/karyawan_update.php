<?php 
include '../koneksi.php';
$id = $_POST['id'];
$devisi = $_POST['devisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$kontak = $_POST['kontak'];

$username = $_POST['username'];
$password = md5($_POST['password']);


$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update tbl_karyawan set karyawan_devisi='$devisi', karyawan_nip='$nip', karyawan_nama='$nama', karyawan_jabatan='$jabatan', karyawan_kelamin='$kelamin', karyawan_kontak='$kontak', karyawan_alamat='$alamat', karyawan_username='$username' where karyawan_id='$id'")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update tbl_karyawan set karyawan_devisi='$devisi', karyawan_nip='$nip', karyawan_nama='$nama', karyawan_kelamin='$kelamin', karyawan_kontak='$kontak', karyawan_alamat='$alamat', karyawan_username='$username', karyawan_password='$password' where karyawan_id='$id'")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:manajer.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
		mysqli_query($koneksi, "update tbl_karyawan set karyawan_devisi='$devisi', karyawan_nip='$nip', karyawan_nama='$nama', karyawan_kelamin='$kelamin', karyawan_kontak='$kontak', karyawan_alamat='$alamat', karyawan_username='$username', karyawan_foto='$file_gambar' where karyawan_id='$id'")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update tbl_karyawan set karyawan_devisi='$devisi', karyawan_nip='$nip', karyawan_nama='$nama', karyawan_kelamin='$kelamin', karyawan_kontak='$kontak', karyawan_alamat='$alamat', karyawan_username='$username', karyawan_password='$password', karyawan_foto='$file_gambar' where karyawan_id='$id'")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}
	}
}

