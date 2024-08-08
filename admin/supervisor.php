<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Supervisor</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data Supervisor</li>
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
						<h3 class="card-title">Data Supervisor</h3>
						<div class="float-right">
							<a href="supervisor_tambah.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> &nbsp Tambah</a>							
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
								$data = mysqli_query($koneksi,"select * from tbl_supervisor, tbl_devisi where supervisor_devisi=devisi_id");
								while($d = mysqli_fetch_array($data)){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['devisi_nama'] ?></td>
										<td><?php echo $d['supervisor_nip'] ?></td>
										<td><?php echo $d['supervisor_nama'] ?></td>
										<td><?php echo $d['supervisor_kontak'] ?></td>
										<td><?php echo $d['supervisor_kelamin'] ?></td>
										<td><?php echo $d['supervisor_username'] ?></td>                		
										<td>
											<?php 
											if($d['supervisor_foto']=="supervisor_foto.png"){
												?>
												<img
												src="../dist/img/supervisor_foto.png" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px"> 
												<?php 
											}else{ 
												?> 
												<img src="../gambar/user/<?php echo $d['supervisor_foto'] ?>" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px">
												<?php 
											} 
											?>
										</td> 
										<td>
											<center>
												<a href="supervisor_edit.php?id=<?php echo $d['supervisor_id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-cog"></i></a>

												<button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapus_supervisor_<?php echo $d['supervisor_id'] ?>">
													<i class="fas fa-trash"></i>
												</button> 
											</center>
											

											<!-- modal hapus -->
											<div class="modal fade" id="hapus_supervisor_<?php echo $d['supervisor_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
															<a href="supervisor_hapus.php?id=<?php echo $d['supervisor_id'] ?>" class="btn btn-primary">Hapus</a>
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