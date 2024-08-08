<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pengajuan Cuti</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Pengajuan Cuti</li>
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
						<h3 class="card-title">Pengajuan Cuti</h3>
						<div class="float-right">
							

							
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Karyawan</th>
										<th>Cuti</th>	
										<th>Jumlah Cuti</th>									
										<th>Supervisor</th>									
										<th>Manajer</th>									
										<th width="15%">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;									
									$data = mysqli_query($koneksi,"select * from tbl_cuti,tbl_karyawan,tbl_devisi where cuti_pegawai=karyawan_id and cuti_devisi=devisi_id");
									while($d = mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td>
												<b>Nama : </b><?php echo $d['karyawan_nama'] ?><br>
												<b>Devisi : </b><?php echo $d['devisi_nama'] ?>
											</td>
											<td>
												<b>Request : </b><?php echo date('d-m-Y', strtotime($d['cuti_tanggal'])) ?><br>
												<b>Mulai : </b><?php echo date('d-m-Y', strtotime($d['cuti_dari'])) ?><br>
												<b>Akhir : </b><?php echo date('d-m-Y', strtotime($d['cuti_sampai'])) ?>
											</td>												
											<td>
												<?php
												echo $d['cuti_jumlah']." Hari";
												?>
											</td>
											<td><?php echo $d['cuti_status_supervisor'] ?></td>
											<td><?php echo $d['cuti_status_manajer'] ?></td>
											<td>
												<center>
													<?php
													if($d['cuti_status_manajer'] !=""){
														?>
														<a href="cuti_print.php?id=<?php echo $d['cuti_id'] ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></a>
														<?php
													}else{

													}
													?>
													
													<a href="cuti_detail.php?id=<?php echo $d['cuti_id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
													
												</center>

												<form action="cuti_update.php" method="post" enctype="multipart/form-data">
													<div class="modal fade" id="edit_cuti_<?php echo $d['cuti_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update Status Cuti</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<div class="form-group">
																		<label>Status</label>
																		<input type="hidden" name="id" value="<?php echo $d['cuti_id'] ?>">
																		<select class="form-control" name="status" required>
																			<option value="">--Pilih--</option>
																			<option <?php if($d['cuti_status_manajer']=="Terima"){echo "selected='selected'";} ?> value="Terima">Terima</option>
																			<option <?php if($d['cuti_status_manajer']=="Tolak"){echo "selected='selected'";} ?> value="Tolak">Tolak</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label>Status</label>
																		<textarea class="form-control" name="keterangan"><?php echo $d['cuti_keterangan_manajer'] ?></textarea>
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
		</div>
	</section>
</div>


<?php include 'footer.php'; ?>