<?php 
include '../koneksi.php';
$id = $_POST['id'];
$devisi = $_POST['devisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = md5($_POST['password']);


$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update tbl_supervisor set supervisor_devisi='$devisi', supervisor_nip='$nip', supervisor_nama='$nama', supervisor_kelamin='$kelamin', supervisor_kontak='$kontak', supervisor_alamat='$alamat', supervisor_username='$username' where supervisor_id='$id'")or die(mysqli_error($koneksi));
		header("location:supervisor.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update tbl_supervisor set supervisor_devisi='$devisi', supervisor_nip='$nip', supervisor_nama='$nama', supervisor_kelamin='$kelamin', supervisor_kontak='$kontak', supervisor_alamat='$alamat', supervisor_username='$username', supervisor_password='$password' where supervisor_id='$id'")or die(mysqli_error($koneksi));
		header("location:supervisor.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:manajer.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
			mysqli_query($koneksi, "update tbl_supervisor set supervisor_devisi='$devisi', supervisor_nip='$nip', supervisor_nama='$nama', supervisor_kelamin='$kelamin', supervisor_kontak='$kontak', supervisor_alamat='$alamat', supervisor_username='$username', supervisor_foto='$file_gambar' where supervisor_id='$id'")or die(mysqli_error($koneksi));
			header("location:supervisor.php?alert=edit");
		}else{
			mysqli_query($koneksi, "update tbl_supervisor set supervisor_devisi='$devisi', supervisor_nip='$nip', supervisor_nama='$nama', supervisor_kelamin='$kelamin', supervisor_kontak='$kontak', supervisor_alamat='$alamat', supervisor_username='$username', supervisor_password='$password', supervisor_foto='$file_gambar' where supervisor_id='$id'")or die(mysqli_error($koneksi));
			header("location:supervisor.php?alert=edit");
		}
	}
}

