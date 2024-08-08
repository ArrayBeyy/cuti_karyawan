<?php include 'header.php'; ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Karyawan</a></li>              
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
     
     <div class="row">
      <div class="col-md-3">

        <?php
        $saya = $_SESSION['id'];
        $data = mysqli_query($koneksi,"select * from tbl_karyawan, tbl_devisi where karyawan_id='$saya' and karyawan_devisi=devisi_id");
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
              <li class="list-group-item">
                <b>Kontak</b> <a class="float-right"><?php echo $d['karyawan_kontak'] ?></a>
              </li>                          
            </ul>
            <center>
              <img style="width:80px; height: 80px;" src="../gambar/tanda_tangan/<?php echo $d['karyawan_tanda_tangan'] ?>">
            </center>
          </div>
          <!-- /.card-body -->
          <center>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addAdmin">
              &nbsp EDIT PROFIL
            </button>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addTTD">
              &nbsp EDIT TANDA TANGAN
            </button>
          </center>


          <form action="tanda_tangan_update.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="addTTD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tanda Tangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                  </div>
                  <div class="modal-body">                    
                    <div class="form-group">
                      <label>Foto</label>
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


          <form action="profil_update.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <textarea class="form-control" name="alamat"><?php echo $d['karyawan_alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kontak</label>
                      <input type="number" name="kontak" value="<?php echo $d['karyawan_kontak'] ?>" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" value="<?php echo $d['karyawan_username'] ?>" required="required" class="form-control" placeholder="Username">
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
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">

         

          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane">
                <!-- Post -->
                <div class="post">
                  <h5 class="card-title">Pengajuan Cuti Terakhir</h5>
                  <br>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="1%">Nomor</th>
                          <th>Jenis Cuti</th>                 
                          <th>Tanggal Request</th>                                                            
                          <th>Jumlah Cuti</th>
                          <th>Status Supervisor</th>
                          <th>Status manajer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $saya = $_SESSION['id'];                  
                        $no=1;
                        $data = mysqli_query($koneksi,"select * from tbl_cuti, tbl_jenis_cuti where cuti_pegawai='$saya' and cuti_jenis=jenis_id");
                        while($d = mysqli_fetch_array($data)){
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['jenis_nama'] ?></td> 
                            <td><?php echo date('d-m-Y', strtotime($d['cuti_tanggal'])) ?></td>
                            <td>
                              <?php
                              $x = date("d", strtotime($d['cuti_dari']));
                              $xx = date("d", strtotime($d['cuti_sampai']));
                              $hasil = abs($x-$xx);
                              echo $hasil." Hari";
                              ?>
                            </td>
                            <td><?php echo $d['cuti_status_supervisor'] ?></td>
                            <td><?php echo $d['cuti_status_manajer'] ?></td>

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
  </div>    
</div>
</div>


<?php include'footer.php' ?>