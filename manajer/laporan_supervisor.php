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
						<li class="breadcrumb-item active">Laporan Supervisor</li>
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
						<h3 class="card-title">laporan Supervisor</h3>	
						<div class="float-right">
							<a href="laporan_supervisor_print.php" target="_BLANK" class="btn btn-sm btn-success">
								<i class="fa fa-print"></i> &nbsp Print
							</a>							
						</div>					
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th>Devisi</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Kontak</th>
									<th>Jenis Kelamin</th>
									<th>Username</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$devisi = $_SESSION['devisi'];
								$no=1;
								$data = mysqli_query($koneksi,"select * from tbl_supervisor, tbl_devisi where supervisor_devisi='$devisi' and supervisor_devisi=devisi_id");
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