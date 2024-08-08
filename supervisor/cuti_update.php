<?php
session_start();
include'../koneksi.php';
$saya = $_SESSION['id'];
$id = $_POST['id'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"update tbl_cuti set cuti_supervisor='$saya', cuti_status_supervisor='$status', cuti_keterangan_supervisor='$keterangan' where cuti_id='$id'");
header("location:cuti.php?alert=status");