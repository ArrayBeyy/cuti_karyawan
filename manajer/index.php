<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">        
        <div class="row">
          <div class="col-lg-3 col-6">            
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $devisi = mysqli_query($koneksi,"select * from tbl_devisi");
                $dv = mysqli_num_rows($devisi);
                 ?>
                <h3><?php echo $dv ?></h3>
                <p>Total Devisi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 <?php
                $jenis_cuti = mysqli_query($koneksi,"select * from tbl_jenis_cuti");
                $jc = mysqli_num_rows($jenis_cuti);
                 ?>
                <h3><?php echo $jc ?></h3>                
                <p>Jenis Cuti</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
               <?php
               $supervisor = mysqli_query($koneksi,"select * from tbl_supervisor");
               $sv = mysqli_num_rows($supervisor);
               ?>
               <h3><?php echo $sv ?></h3>
                <p>Supervisor</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $karyawan = mysqli_query($koneksi,"select * from tbl_karyawan");
                $kr = mysqli_num_rows($karyawan);
                ?>
                <h3><?php echo $kr ?></h3>
                <p>Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
         <div class="col-md-3">

        <?php
        $saya = $_SESSION['id'];
        $data = mysqli_query($koneksi,"select * from tbl_manajer, tbl_devisi where manajer_id='$saya' and manajer_devisi=devisi_id");
        $d = mysqli_fetch_assoc($data);
        ?>

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php
              if($d['manajer_foto']=="manajer_foto.png"){
                ?>
                <img class="profile-user-img img-fluid img-circle"
                src="../dist/img/manajer_foto.png"
                alt="User profile picture">
                <?php
              }else{
                ?>
                <img class="profile-user-img img-fluid img-circle"
                src="../gambar/user/<?php echo $d['manajer_foto'] ?>"
                alt="User profile picture">
                <?php
              }

              ?>               
            </div>

            <h3 class="profile-username text-center"><?php echo $d['manajer_nama'] ?></h3>
            <p class="text-muted text-center"><?php echo $d['manajer_nip'] ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Devisi</b> <a class="float-right"><?php echo $d['devisi_nama'] ?></a>
              </li>
              <li class="list-group-item">
                <b>Kontak</b> <a class="float-right"><?php echo $d['manajer_kontak'] ?></a>
              </li>                              
            </ul>
            <center>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSupervisor">
                &nbsp EDIT
              </button>
            </center>
            <form action="profil_update.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="editSupervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"><?php echo $d['manajer_alamat'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Kontak</label>
                        <input type="number" name="kontak" value="<?php echo $d['manajer_kontak'] ?>" required="required" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $d['manajer_username'] ?>" required="required" class="form-control" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="******">
                        <small><p style="color:red;">* input jika akan diganti</p></small>
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto">
                        <small><p style="color:red;">* input jika akan diganti</p></small>
                      </div>                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">Profil Saya</h3>              
          </div>

          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane">
                <!-- Post -->
                <div class="post">


                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <tr>
                        <th>Nama</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['manajer_nama'] ?></td>
                      </tr>
                      <tr>
                        <th>NIK/NIP</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['manajer_nip'] ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['manajer_kelamin'] ?></td>
                      </tr>
                      <tr>
                        <th>Kontak</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['manajer_kontak'] ?></td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['manajer_alamat'] ?></td>
                      </tr>
                      <tr>
                        <th>Username</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['manajer_username'] ?></td>
                      </tr>
                      <tr>
                        <th>Tanda Tangan</th>
                        <th width="1%">:</th>
                        <td>
                          <img style="width: 90px; height: 90px;" src="../gambar/tanda_tangan/<?php echo $d['manajer_tanda_tangan'] ?>">
                        </td>
                      </tr> 


                    </table>

                    <center>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTandaTangan">
                        &nbsp UPDATE TANDA TANGAN
                      </button>
                    </center>
                    <form action="tanda_tangan_update.php" method="post" enctype="multipart/form-data">
                      <div class="modal fade" id="editTandaTangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">EDIT TANDA TANGAN</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">                      
                              <div class="form-group">
                                <label>FOTO TANDA TANGAN</label>
                                <input type="file" name="foto">
                                <br>
                                <small style="color: red;"><b>FILE TANDA TANGAN BEREKTENSI .PNG </b><p>* input jika akan diganti </p></small>
                              </div>                      
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

 <?php include 'footer.php'; ?>