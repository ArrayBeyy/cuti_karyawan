<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Supervisor - Aplikasi Pengajuan Cuti</title>  
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
  if($_SESSION['status'] != "Supervisor"){
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
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <img src="../logo_delta.png" style= "width: 40px; height: 200px;" alt="" class="brand-image "
    style="opacity: .8">
      <span class="brand-text font-weight-light">DeltaGrup</span>
    </a>

    <?php
    $saya = $_SESSION['id'];
    $data = mysqli_query($koneksi,"select * from tbl_supervisor where supervisor_id='$saya'");
    $d = mysqli_fetch_assoc($data);
     ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if($d['supervisor_foto']=="supervisor_foto.png"){
            ?>
            <img src="../dist/img/supervisor_foto.png" class="img-circle elevation-2" alt="User Image">
            <?php
          }else{
            ?>
            <img src="../gambar/user/<?php echo $d['supervisor_foto'] ?>" class="img-circle elevation-2" alt="User Image">
            <?php
          }
          ?>
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $d['supervisor_nama'] ?></a>
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
          <li class="nav-item">
            <a href="karyawan.php" class="nav-link">              
              <i class="nav-icon fas fa-user"></i>
              <p>
                Karyawan
                <?php
                $devisi = $_SESSION['devisi'];
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