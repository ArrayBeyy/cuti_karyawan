<?php include'header.php' ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Cuti Saya</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Cuti Saya</a></li>              
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
							<h5 class="card-title">Pengajuan Cuti Terakhir</h5>
							<br>						
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="1%">Nomor</th>
										<th>Jenis Cuti</th>									
										<th>Tanggal Request</th>									
										<th>Mulai Cuti</th>									
										<th>Akhir Cuti</th>									
										<th>Jumlah Cuti</th>																	
										<th width="10%">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$tahun = date('Y');
									$saya = $_SESSION['id'];									
									$no=1;
									$data = mysqli_query($koneksi,"select * from tbl_cuti, tbl_jenis_cuti where cuti_pegawai='$saya' and cuti_jenis=jenis_id and year(cuti_tanggal)='$tahun'");
									while($d = mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['jenis_nama'] ?></td>	
											<td><?php echo date('d-m-Y', strtotime($d['cuti_tanggal'])) ?></td>	
											<td><?php echo date('d-m-Y', strtotime($d['cuti_dari'])) ?></td>	
											<td><?php echo date('d-m-Y', strtotime($d['cuti_sampai'])) ?></td>	
											<td>
												<?php echo $d['cuti_jumlah'] ?> Hari
											</td>										
											<td>
												<?php
												if($d['cuti_status_manajer']==""){
													?>
													<center>
														<button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapus_cuti_<?php echo $d['cuti_id'] ?>">
															<i class="fas fa-trash"></i>
														</button> 
														<a href="cuti_saya_detail.php?id=<?php echo $d['cuti_id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
													</center>
													<!-- modal hapus -->
													<div class="modal fade" id="hapus_cuti_<?php echo $d['cuti_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																	<a href="cuti_saya_hapus.php?id=<?php echo $d['cuti_id'] ?>" class="btn btn-primary">Hapus</a>
																</div>
															</div>
														</div>
													</div>
													<?php
												}else{
													?>
													<a href="cuti_saya_print.php?id=<?php echo $d['cuti_id'] ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></a>
													<a href="cuti_saya_detail.php?id=<?php echo $d['cuti_id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
													<?php
												}
												?>
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
	</div>
</div>

	<?php include'footer.php' ?>