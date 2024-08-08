<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Aplikasi Pengajuan Cuti</title>  
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
  if($_SESSION['status'] != "Admin"){
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
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN</span>
    </a>


    <?php
    $saya = $_SESSION['id'];
    $data = mysqli_query($koneksi,"select * from tbl_admin where admin_id='$saya'");
    $d = mysqli_fetch_assoc($data);
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if($d['admin_foto']=="admin_foto.png"){
            ?>
            <img src="../dist/img/admin_foto.png" class="img-circle elevation-2" alt="User Image">
            <?php
          }else{
            ?>
            <img src="../gambar/user/<?php echo $d['admin_foto'] ?>" class="img-circle elevation-2" alt="User Image">
            <?php
          }
          ?>
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $d['admin_nama'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
          
          </li>         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Setting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="devisi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Devisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="jenis_cuti.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Cuti</p>
                </a>
              </li>
                          
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
          <a href="admin.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
          </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="karyawan.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Pegawai
              </p>
          </a>
          </li>
         
          <li class="nav-header">CUTI</li>
          <li class="nav-item">
            <a href="cuti.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                 <?php                
                $cuti = mysqli_query($koneksi,"select * from tbl_cuti");
                $ct = mysqli_num_rows($cuti);
                ?>
                Pengajuan Cuti
                <span class="badge badge-info right"><?php echo $ct ?></span>
              </p>
            </a>
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