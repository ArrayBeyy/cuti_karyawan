<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Devisi</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data Devisi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Devisi</h3>
						<div class="float-right">
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDevisi">
								<i class="fa fa-plus"></i> &nbsp Tambah
							</button>


							<form action="devisi_act.php" method="post" enctype="multipart/form-data">
								<div class="modal fade" id="addDevisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tambah Data Devisi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>

											</div>
											<div class="modal-body">

												<div class="form-group">
													<label>Nama Devisi</label>
													<input type="text" name="nama" required="required" class="form-control" placeholder="Nama Devisi">
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
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="1%">Nomor</th>
									<th>Nama Devisi</th>									
									<th width="10%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								$data = mysqli_query($koneksi,"select * from tbl_devisi");
								while($d = mysqli_fetch_array($data)){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['devisi_nama'] ?></td>
										<td>
											<center>
												<button type="button" class="btn btn-warning btn-sm btn-icon" data-toggle="modal" data-target="#edit_devisi_<?php echo $d['devisi_id'] ?>">
													<i class="fas fa-cog"></i>
												</button> 

												<button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapus_devisi_<?php echo $d['devisi_id'] ?>">
													<i class="fas fa-trash"></i>
												</button> 
											</center>

											<form action="devisi_update.php" method="post" enctype="multipart/form-data">
												<div class="modal fade" id="edit_devisi_<?php echo $d['devisi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Data Devisi</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>

															</div>
															<div class="modal-body">

																<div class="form-group">
																	<label>Nama Devisi</label>
																	<input type="hidden" name="id" value="<?php echo $d['devisi_id'] ?>">
																	<input type="text" name="nama" value="<?php echo $d['devisi_nama'] ?>" required="required" class="form-control" placeholder="Nama Devisi">
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


											<!-- modal hapus -->
											<div class="modal fade" id="hapus_devisi_<?php echo $d['devisi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
															<a href="devisi_hapus.php?id=<?php echo $d['devisi_id'] ?>" class="btn btn-primary">Hapus</a>
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