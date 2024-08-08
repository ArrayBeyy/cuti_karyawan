<?php include'header.php' ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Ajukan Cuti</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Ajukan Cuti</a></li>              
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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">

							<?php 
							if(isset($_GET['alert'])){
								if($_GET['alert']=="gagal"){
									?>
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h5><i class="icon fas fa-info"></i> Alert!</h5>
										Permintaan cuti gagal, silahkan cek tanggal .
									</div>
									<?php
								}
							}

							?>


							<center>
								<h2 class="card-title">Form Pengajuan Cuti</h2>
							</center>
							<br>						
							<div class="row">
								<div class="col-md-12">
									<form action="ajukan_cuti_act.php" method="POST">
										<div class="form-group">
											<table class="table table-bordered">
												<tr>
													<th width="1%">Pilih</th>
													<th>Cuti</th>
													<th>Sisa Cuti</th>													
												</tr>
												<?php 
												$cek = mysqli_query($koneksi,"select * from tbl_jenis_cuti");
												while($c = mysqli_fetch_array($cek)){
													$idjenis = $c['jenis_id'];
													$saya = $_SESSION['id'];
													?>
													<tr>
														<td><input type="radio" name="jenis" value="<?php echo $c['jenis_id'] ?>" required></td>
														<td><?php echo $c['jenis_nama'] ?></td>
														<td>
															<?php 
															$xx = mysqli_query($koneksi,"select sum(cuti_jumlah) as total from tbl_cuti where cuti_jenis='$idjenis' and cuti_pegawai='$saya'");
															$x = mysqli_fetch_assoc($xx);
															$xtotoal = $x['total'];
															$diberikan = $c['jenis_jumlah'];

															$sisa = $diberikan-$xtotoal;
															echo $sisa;
															?>
															<input type="hidden" name="sisa" value="<?php echo $sisa ?>">
														</td>

													</tr>
													<?php
												}
												?>
											</table>
											
										</div>
										<div class="form-group">
											<label>Mulai Cuti</label>
											<input type="date" name="mulai" class="form-control" required>
										</div>
										<!-- /.form-group -->
										<div class="form-group">
											<label>Akhir Cuti </label>
											<input type="date" name="akhir" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Alasan Cuti </label>
											<textarea class="form-control" name="alasan" required></textarea>
										</div>
										<div class="form-group">
											<label>Alamat Selama Cuti </label>
											<textarea class="form-control" name="alamat" required></textarea>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>									
									</form>
								</div>
								<!-- /.col -->
							</div>				
							
						</div>
					</div>

				</div>        
			</div>
		</div>    
	</div>
</div>

<?php include'footer.php' ?>