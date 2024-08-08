<?php include 'header.php'; ?>
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Edit Data Karyawan</li>
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
            <h3 class="card-title">Edit Data Karyawan</h3>
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
              	<form action="karyawan_update.php" method="POST">
                  <?php 
                  $id = $_GET['id'];
                  $data = mysqli_query($koneksi,"select * from tbl_karyawan where karyawan_id='$id'");
                  $d = mysqli_fetch_assoc($data);
                  ?>
              		<div class="form-group">
              			<label>NIP</label>
                    <input type="hidden" name="id" value="<?php echo $d['karyawan_id'] ?>">
              			<input type="number" name="nip" value="<?php echo $d['karyawan_nip'] ?>" class="form-control" required placeholder="Misal : 11121***">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Nama </label>
              			<input type="text" name="nama" value="<?php echo $d['karyawan_nama'] ?>" class="form-control" required placeholder="Misal : Hamdan, Ali, ...">
              		</div>
                  <div class="form-group">
                    <label>Jabatan </label>
                    <input type="text" name="jabatan" value="<?php echo $d['karyawan_jabatan'] ?>" class="form-control" required placeholder="Jabatan">
                  </div>
              		<div class="form-group">
              			<label>Kontak </label>
              			<input type="number" name="kontak" value="<?php echo $d['karyawan_kontak'] ?>" class="form-control" required placeholder="Misal : 0822**, ...">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Username </label>
              			<input type="text" name="username" value="<?php echo $d['karyawan_username'] ?>" class="form-control" required placeholder="Misal : Hamdan, Ali, ...">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Password </label>
              			<input type="password" name="password" class="form-control" placeholder=" ***">
                    <small><p style="color:red;">* input jika akan diganti</p></small>
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
              					<option <?php if($d['karyawan_devisi']==$dv['devisi_id']){echo "selected='selected'";} ?> value="<?php echo $dv['devisi_id'] ?>"><?php echo $dv['devisi_nama'] ?></option>
              					<?php
              				}

              				?>
              			</select>
              		</div>
              		<div class="form-group">
              			<label>Kelamin</label>
              			<select class="form-control" name="kelamin" required>
              				<option value="">--Pilih--</option>
              				<option <?php if($d['karyawan_kelamin']=="Laki-Laki"){echo "selected='selected'";} ?> value="Laki-Laki">Laki-Laki</option>
              				<option <?php if($d['karyawan_kelamin']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
              			</select>
              		</div>
              		<div class="form-group">
              			<label>Alamat</label>
              			<textarea class="form-control" name="alamat" required><?php echo $d['karyawan_alamat'] ?></textarea>
              		</div>
              		<div class="form-group">
              			<label>Foto</label>
              			<input type="file" name="foto">
                    <small><p style="color:red;">* input jika akan diganti</p></small>
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