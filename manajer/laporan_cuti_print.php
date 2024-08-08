<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manajer - Aplikasi Pengajuan Cuti</title>
  <link rel="stylesheet" type="text/css" href="laporan.css"/>
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body style="padding: 10px;">

  <table width="100%">
     <tr>

        <td width="85" align="center">
           <H5><u>LAPORAN DATA PERMOHONAN CUTI</u></H5>

       </td>

   </tr>
</table>
<table border="1">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th>Devisi</th>
            <th>NIP / Nama</th>
            <th>Kontak</th>
            <th>Tanggal request</th>
            <th>Jenis / Jumlah Cuti</th>            
            <th>Supervisor</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        include '../koneksi.php';
        $devisi = $_SESSION['devisi'];
        $no=1;
        $data = mysqli_query($koneksi,"select * from tbl_cuti, tbl_devisi,tbl_karyawan, tbl_jenis_cuti, tbl_supervisor where cuti_devisi='$devisi' and cuti_devisi=devisi_id and cuti_jenis=jenis_id and cuti_pegawai=karyawan_id and cuti_supervisor=supervisor_id");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['devisi_nama'] ?></td>
                <td><?php echo $d['karyawan_nip']. " /".$d['karyawan_nama'] ?></td>                
                <td><?php echo $d['karyawan_kontak'] ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['cuti_tanggal'])) ?></td>
                <td>
                	<?php
                	echo $d['cuti_jumlah']." Hari";
                	?>                	

                </td>    
                <td><?php echo $d['supervisor_nama'] ?></td>                  
                <td><?php echo $d['cuti_status_supervisor'] ?></td>                  

            </tr>
            <?php
        }
        ?>

    </tfoot>
</table>


</body>
</html>

 <script>
    window.print();
    $(document).ready(function(){

    });
</script>