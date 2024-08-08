<?php include 'header.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail  Supervisor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Supervisor</li>
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
          $idsupervisor = $_GET['id'];
          $data = mysqli_query($koneksi,"select * from tbl_supervisor, tbl_devisi where supervisor_id='$idsupervisor' and supervisor_devisi=devisi_id");
          $d = mysqli_fetch_assoc($data);
          ?>

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <?php
                if($d['supervisor_foto']=="supervisor_foto.png"){
                  ?>
                  <img class="profile-user-img img-fluid img-circle"
                  src="../dist/img/supervisor_foto.png"
                  alt="User profile picture">
                  <?php
                }else{
                  ?>
                  <img class="profile-user-img img-fluid img-circle"
                  src="../gambar/user/<?php echo $d['supervisor_foto'] ?>"
                  alt="User profile picture">
                  <?php
                }

                ?>               
              </div>

              <h3 class="profile-username text-center"><?php echo $d['supervisor_nama'] ?></h3>
              <p class="text-muted text-center"><?php echo $d['supervisor_nip'] ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Devisi</b> <a class="float-right"><?php echo $d['devisi_nama'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Kelamin</b> <a class="float-right"><?php echo $d['supervisor_kelamin'] ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Kontak</b> <a class="float-right"><?php echo $d['supervisor_kontak'] ?></a>
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
              <h3 class="card-title">Data karyawan </h3>
              <div class="float-right">
                <a href="supervisor.php" class="btn btn-sm btn-warning"><i class="fa fa-minus"></i> Kembali</a>
               
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
                              <th>NIP</th>                 
                              <th>Nama</th>                 
                              <th>Kontak</th>                                    
                              <th>Kelamin</th>                                    
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $devisi = $d['devisi_id'];                  
                            $no=1;
                            $data = mysqli_query($koneksi,"select * from tbl_karyawan where karyawan_devisi='$devisi'");
                            while($d = mysqli_fetch_array($data)){
                              ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['karyawan_nip'] ?></td> 
                                <td><?php echo $d['karyawan_nama'] ?></td> 
                                <td><?php echo $d['karyawan_kontak'] ?></td> 
                                <td><?php echo $d['karyawan_kelamin'] ?></td> 

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