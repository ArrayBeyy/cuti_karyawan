<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Karyawan - Aplikasi Pengajuan Cuti</title>  

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">  
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

  <?php 
  session_start();
  if($_SESSION['status'] != "Karyawan"){
    header("location:../index.php");
  }
  ?>

  <?php include '../koneksi.php'; ?>

  
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="../logo_delta.png" alt="DeltaGrup" class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Karyawan</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          
          <li class="nav-item">
            <a href="jenis_cuti.php" class="nav-link">Sisa Cuti</a>
          </li>
          <li class="nav-item">
            <a href="cuti_saya.php" class="nav-link">Cuti Saya</a>
          </li>
          <li class="nav-item">
            <a href="ajukan_cuti.php" class="nav-link">Ajukan Cuti</a>
          </li>
         
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
          </li>
          
        </ul>
      
      </div>

     
    </div>
  </nav>
  <!-- /.navbar -->