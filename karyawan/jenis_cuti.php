<?php include'header.php' ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Jenis Cuti</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Jenis Cuti</a></li>              
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
										<th>Jumlah Diberikan</th>	
										<th>Jumlah Diambil</th>									
										<th>Sisa Cuti</th>	
									</tr>
								</thead>
								<tbody>
									<?php
									$saya = $_SESSION['id'];	
									$tahun = date('Y');
									$no=1;
									$data = mysqli_query($koneksi,"select * from tbl_jenis_cuti");
									while($d = mysqli_fetch_array($data)){
										$jenisid = $d['jenis_id'];										

										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['jenis_nama'] ?></td>	
											<td><?php echo $d['jenis_jumlah'] ?> Hari</td>
											<td>												
												<?php 
												// cuti diambil
												$xx = mysqli_query($koneksi,"select sum(cuti_jumlah) as total from tbl_cuti where cuti_jenis='$jenisid' and cuti_pegawai='$saya' and year(cuti_tanggal)='$tahun'");	
												$x = mysqli_fetch_assoc($xx);	
												echo $x['total']


												?>
											</td>
											<td>
												<?php 
												// sisa cuti
												$xx = mysqli_query($koneksi,"select sum(cuti_jumlah) as total from tbl_cuti where cuti_jenis='$jenisid' and cuti_pegawai='$saya' and year(cuti_tanggal)='$tahun'");	
												$x = mysqli_fetch_assoc($xx);	
												$digunakan = $x['total'];
												$diberikan = $d['jenis_jumlah'];

												$sisa = $diberikan-$digunakan;
												echo $sisa." Hari";

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