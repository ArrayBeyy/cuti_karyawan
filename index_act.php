<?php 
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = "Admin";

if($level == "Admin"){
	$cek = mysqli_query($koneksi,"select * from tbl_admin where admin_username='$username' and admin_password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['admin_id'];
		$_SESSION['nama'] = $d['admin_nama'];
		$_SESSION['status'] = "Admin";
		header("location:admin/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else if($level=="Manajer"){
	$cek = mysqli_query($koneksi,"select * from tbl_manajer where manajer_username='$username' and manajer_password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['manajer_id'];
		$_SESSION['nama'] = $d['manajer_nama'];
		$_SESSION['devisi'] = $d['manajer_devisi'];
		$_SESSION['status'] = "Manajer";
		header("location:manajer/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else if($level=="Supervisor"){
	$cek = mysqli_query($koneksi,"select * from tbl_supervisor where supervisor_username='$username' and supervisor_password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['supervisor_id'];
		$_SESSION['nama'] = $d['supervisor_nama'];
		$_SESSION['devisi'] = $d['supervisor_devisi'];
		$_SESSION['status'] = "Supervisor";
		header("location:supervisor/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else if($level=="Karyawan"){
	$cek = mysqli_query($koneksi,"select * from tbl_karyawan where karyawan_username='$username' and karyawan_password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['karyawan_id'];
		$_SESSION['nama'] = $d['karyawan_nama'];
		$_SESSION['devisi'] = $d['karyawan_devisi'];
		$_SESSION['status'] = "Karyawan";
		header("location:karyawan/");
	}else{
		header("location:index.php?alert=gagal");
	}
}



?>