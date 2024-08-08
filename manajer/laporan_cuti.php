<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Laporan Pemohonan Cuti</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Laporan Pemohonan Cuti </li>
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
						<h3 class="card-title">Laporan Pemohonan Cuti</h3>	
						<div class="float-right">
							<a href="laporan_cuti_print.php" target="_BLANK" class="btn btn-sm btn-success">
								<i class="fa fa-print"></i> &nbsp Print
							</a>							
						</div>					
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Karyawan</th>
										<th>Cuti</th>	
										<th>Jumlah Cuti</th>									
										<th>Supervisor</th>									
										<th>Status Saya</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;	
									$devisi = $_SESSION['devisi'];								
									$data = mysqli_query($koneksi,"select * from tbl_cuti,tbl_karyawan,tbl_devisi where cuti_devisi='$devisi' and cuti_pegawai=karyawan_id and cuti_devisi=devisi_id order by cuti_id desc");
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
	</section>
</div>


<?php include 'footer.php'; ?>