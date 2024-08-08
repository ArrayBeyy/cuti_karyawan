<?php include 'header.php'; ?>
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tambah Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Tambah Data Karyawan</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Karyawan</h3>
            <div class="float-right">
              <a href="karyawan.php" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i> &nbsp Kembali</a>              
            </div>
            <div class="card-tools">
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              	<form action="karyawan_act.php" method="POST">
              		<div class="form-group">
              			<label>NIP</label>
              			<input type="number" name="nip" class="form-control" required placeholder="Misal : 11121***">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Nama </label>
              			<input type="text" name="nama" class="form-control" required placeholder="Misal : Hamdan, Ali, ...">
              		</div>
                  <div class="form-group">
                    <label>Jabatan </label>
                    <input type="text" name="jabatan" class="form-control" required placeholder="Jabatan">
                  </div>
              		<div class="form-group">
              			<label>Kontak </label>
              			<input type="number" name="kontak" class="form-control" required placeholder="Misal : 0822**, ...">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Username </label>
              			<input type="text" name="username" class="form-control" required placeholder="Misal : Hamdan, Ali, ...">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Password </label>
              			<input type="password" name="password" class="form-control" required placeholder=" ***">
              		</div>
              	</div>
              	<!-- /.col -->
              	<div class="col-md-6">
              		<div class="form-group">
              			<label>Devisi</label>
              			<select class="form-control" name="devisi" required>
              				<option value="">--Pilih--</option>
              				<?php 
              				$devisi = mysqli_query($koneksi,"select * from tbl_devisi");
              				while($dv = mysqli_fetch_array($devisi)){
              					?>
              					<option value="<?php echo $dv['devisi_id'] ?>"><?php echo $dv['devisi_nama'] ?></option>
              					<?php
              				}

              				?>
              			</select>
              		</div>
              		<div class="form-group">
              			<label>Kelamin</label>
              			<select class="form-control" name="kelamin" required>
              				<option value="">--Pilih--</option>
              				<option value="Laki-Laki">Laki-Laki</option>
              				<option value="Perempuan">Perempuan</option>
              			</select>
              		</div>
              		<div class="form-group">
              			<label>Alamat</label>
              			<textarea class="form-control" name="alamat" required></textarea>
              		</div>
              		<div class="form-group">
              			<label>Foto</label>
              			<input type="file" name="foto">
              		</div>                
              		<div class="modal-footer">
              			<button type="submit" class="btn btn-primary">Simpan</button>
              		</div>
              	</form>
                
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<?php include 'footer.php'; ?>