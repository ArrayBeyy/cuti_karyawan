<?php 
session_start();
include '../koneksi.php';
$karyawan = $_SESSION['id'];
$devisi = $_SESSION['devisi'];
$jenis = $_POST['jenis'];
$tanggal_request = date('Y-m-d');
$mulai = $_POST['mulai'];
$akhir = $_POST['akhir'];
$alasan = $_POST['alasan'];
$alamat = $_POST['alamat'];

$sisa = $_POST['sisa'];



$tanggal_awal = strtotime($mulai); 
$tanggal_akhir = strtotime($akhir); 
$jumlah_hari = $tanggal_akhir - $tanggal_awal;
$total = $jumlah_hari / 60 / 60 / 24;

$hari = $total;


if($total>=$sisa){
	header("location:ajukan_cuti.php?alert=gagal");
}else{
	mysqli_query($koneksi,"insert into tbl_cuti (cuti_id,cuti_devisi,cuti_jenis,cuti_pegawai,cuti_tanggal,cuti_dari,cuti_sampai, cuti_jumlah,cuti_alasan,cuti_alamat) values(NULL,'$devisi','$jenis','$karyawan','$tanggal_request','$mulai','$akhir','$hari','$alasan','$alamat')");
	header("location:cuti_saya.php?alert=tambah");
}



