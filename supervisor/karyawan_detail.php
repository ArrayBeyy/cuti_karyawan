<?php include 'header.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail  Karyawan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Karyawan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <?php
          $idkaryawan = $_GET['id'];
          $data = mysqli_query($koneksi,"select * from tbl_karyawan, tbl_devisi where karyawan_id='$idkaryawan' and karyawan_devisi=devisi_id");
          $d = mysqli_fetch_assoc($data);
          ?>

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <?php
                if($d['karyawan_foto']=="karyawan_foto.png"){
                  ?>
                  <img class="profile-user-img img-fluid img-circle"
                  src="../dist/img/karyawan_foto.png"
                  alt="User profile picture">
                  <?php
                }else{
                  ?>
                  <img class="profile-user-img img-fluid img-circle"
                  src="../gambar/user/<?php echo $d['karyawan_foto'] ?>"
                  alt="User profile picture">
                  <?php
                }

                ?>               
              </div>

              <h3 class="profile-username text-center"><?php echo $d['karyawan_nama'] ?></h3>
              <p class="text-muted text-center"><?php echo $d['karyawan_nip'] ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Devisi</b> <a class="float-right"><?php echo $d['devisi_nama'] ?></a>
                </li>                              
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">

            <div class="card-header">
              <h3 class="card-title">Data Pengajuan Cuti</h3>
              <div class="float-right">
                <a href="karyawan.php" class="btn btn-sm btn-warning"><i class="fa fa-minus"></i> Kembali</a>
               
              </div>
            </div>

            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane">
                  <!-- Post -->
                  <div class="post">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th width="1%">Nomor</th>
                              <th>Jenis Cuti</th>                 
                              <th>Tanggal Request</th>                  
                              <th>Mulai Cuti</th>                 
                              <th>Akhir Cuti</th>                 
                              <th>Jumlah Cuti</th>                                      
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $idkaryawan = $_GET['id'];                  
                            $no=1;
                            $data = mysqli_query($koneksi,"select * from tbl_cuti, tbl_jenis_cuti where cuti_pegawai='$idkaryawan' and cuti_jenis=jenis_id");
                            while($d = mysqli_fetch_array($data)){
                              ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['jenis_nama'] ?></td> 
                                <td><?php echo date('d-m-Y', strtotime($d['cuti_tanggal'])) ?></td> 
                                <td><?php echo date('d-m-Y', strtotime($d['cuti_dari'])) ?></td>  
                                <td><?php echo date('d-m-Y', strtotime($d['cuti_sampai'])) ?></td>  
                                <td>
                                  <?php
                                  $x = date("d", strtotime($d['cuti_dari']));
                                  $xx = date("d", strtotime($d['cuti_sampai']));
                                  $hasil = abs($x-$xx);
                                  echo $hasil." Hari";
                                  ?>
                                </td>

                              </tr>
                              <?php
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>

                    </div>


                </div>

              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>

<?php include 'footer.php' ?>