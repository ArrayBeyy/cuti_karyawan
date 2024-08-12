<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manajer - Aplikasi Pengajuan Cuti</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">  
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">  
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">  
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">  
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">  
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


  <?php 
  session_start();
  if($_SESSION['status'] != "Manajer"){
    header("location:../index.php");
  }
  ?>

  <?php include '../koneksi.php'; ?>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <img src="../logo_delta.png" alt="DeltaGrup" class="brand-image"
    style="opacity: .8">
      <span class="brand-text font-weight-light">DeltaGrup</span>
    </a>

     <?php
    $saya = $_SESSION['id'];
    $devisi = $_SESSION['devisi'];
    $data = mysqli_query($koneksi,"select * from tbl_manajer where manajer_id='$saya'");
    $d = mysqli_fetch_assoc($data);
     ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if($d['manajer_foto']=="manajer_foto.png"){
            ?>
            <img src="../dist/img/manajer_foto.png" class="img-circle elevation-2" alt="User Image">
            <?php
          }else{
            ?>
            <img src="../gambar/user/<?php echo $d['manajer_foto'] ?>" class="img-circle elevation-2" alt="User Image">
            <?php
          }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $d['manajer_nama'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
          
          </li> 
          <li class="nav-item">
            <a href="supervisor.php" class="nav-link">              
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                 <?php
                $supervisor = mysqli_query($koneksi,"select * from tbl_supervisor where supervisor_devisi='$devisi'");
                $sp = mysqli_num_rows($supervisor);
                 ?>
                <span class="badge badge-info right"><?php echo $sp ?></span>
                Supervisor                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="karyawan.php" class="nav-link">              
              <i class="nav-icon fas fa-users"></i>
              <p>
                Karyawan
                <?php

                $karyawan = mysqli_query($koneksi,"select * from tbl_karyawan where karyawan_devisi='$devisi'");
                $k = mysqli_num_rows($karyawan);
                 ?>
                <span class="badge badge-info right"><?php echo $k ?></span>
              </p>
            </a>
          </li>                  
          <li class="nav-item">
            <a href="cuti.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Pengajuan Cuti              
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="laporan_karyawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan_supervisor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supervisor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan_cuti.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cuti</p>
                </a>
              </li>
                          
            </ul>
          </li>
           <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
                          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>