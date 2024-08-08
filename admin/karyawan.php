<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data Karyawan</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Karyawan</h3>
						<div class="float-right">
							<a href="karyawan_tambah.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> &nbsp Tambah</a>							
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th>Devisi</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Kontak</th>
									<th>Jenis Kelamin</th>
									<th>Username</th>
									<th>Foto</th>
									<th width="10%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								$data = mysqli_query($koneksi,"select * from tbl_karyawan, tbl_devisi where karyawan_devisi=devisi_id");
								while($d = mysqli_fetch_array($data)){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['devisi_nama'] ?></td>
										<td><?php echo $d['karyawan_nip'] ?></td>
										<td><?php echo $d['karyawan_nama'] ?></td>
										<td><?php echo $d['karyawan_kontak'] ?></td>
										<td><?php echo $d['karyawan_kelamin'] ?></td>
										<td><?php echo $d['karyawan_username'] ?></td>                		
										<td>
											<?php 
											if($d['karyawan_foto']=="karyawan_foto.png"){
												?>
												<img
												src="../dist/img/karyawan_foto.png" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px"> 
												<?php 
											}else{ 
												?> 
												<img src="../gambar/user/<?php echo $d['karyawan_foto'] ?>" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px">
												<?php 
											} 
											?>
										</td> 
										<td>
											<center>
												<a href="karyawan_edit.php?id=<?php echo $d['karyawan_id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-cog"></i></a>

												<button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapus_karyawan_<?php echo $d['karyawan_id'] ?>">
													<i class="fas fa-trash"></i>
												</button> 
											</center>
											

											<!-- modal hapus -->
											<div class="modal fade" id="hapus_karyawan_<?php echo $d['karyawan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>

														</div>
														<div class="modal-body">
															<p>Yakin ingin menghapus data ini ?</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
															<a href="karyawan_hapus.php?id=<?php echo $d['karyawan_id'] ?>" class="btn btn-primary">Hapus</a>
														</div>
													</div>
												</div>
											</div>


										</td>
									</tr>
									<?php
								}
								?>

							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php include 'footer.php'; ?>