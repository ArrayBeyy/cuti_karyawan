<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supervisor - Aplikasi Pengajuan Cuti</title>
    <link rel="stylesheet" type="text/css" href="laporan.css"/>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

 </head>
 <body style="padding: 10px;">
     <?php
     include '../koneksi.php';
     $idcuti = $_GET['id'];
     $data = mysqli_query($koneksi,"select * from tbl_cuti, tbl_karyawan, tbl_manajer, tbl_devisi,tbl_jenis_cuti,tbl_supervisor where cuti_id='$idcuti' and cuti_pegawai=karyawan_id and cuti_devisi=devisi_id and cuti_jenis=jenis_id and cuti_supervisor=supervisor_id and cuti_manajer=manajer_id");
     $d = mysqli_fetch_assoc($data);
     $idkaryawan = $d['cuti_pegawai'];
     ?>

    <table width="100%">
        <tr>
            
            <td width="85" align="center">
                <H5><u>SURAT PERMOHONAN DAN SURAT IJIN CUTI</u><br> <small><?php echo $d['jenis_nama'] ?></small></H5>
               
            </td>

        </tr>
    </table>
    
    <p>Bersama surat ini diberitahukan bahwa :</p>
    <table class="table">
        <tr>
            <td>Nama </td>
            <th>:</th>
            <td><?php echo $d['karyawan_nama']; ?></td>
        </tr>
        <tr>
            <td>NIP/NIK</td>
            <th>:</th>
            <td><?php echo $d['karyawan_nip']; ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <th>:</th>
            <td><?php echo $d['karyawan_jabatan']; ?></td>
        </tr> 
         <tr>
            <td>Devisi</td>
            <th>:</th>
            <td><?php echo $d['devisi_nama']; ?></td>
        </tr>    
        <tr>
            <td>Jenis Cuti</td>
            <th>:</th>
            <td><?php echo $d['jenis_nama']; ?></td>
        </tr>  
        <tr>
            <td>Lama Cuti</td>
            <th>:</th>
            <td>
               <?php
             
               $tgl1 = strtotime($d['cuti_dari']); 
               $tgl2 = strtotime($d['cuti_sampai']); 

               $jarak = $tgl2 - $tgl1;

               $hari = $jarak / 60 / 60 / 24;
               echo $hari;
               ?>
            </td>
        </tr> 
        <tr>
            <td>Dari Tanggal s/d Tanggal</td>
            <th>:</th>
            <td><?php echo date('d-m-Y', strtotime($d['cuti_dari'])). " s/d ". date('d-n-Y',strtotime($d['cuti_sampai'])) ?></td>
        </tr> 
        <tr>
            <td>Alasan Cuti</td>
            <th>:</th>
            <td><?php echo $d['cuti_alasan']; ?></td>
        </tr>
        <tr>
            <td>Alamat Cuti</td>
            <th>:</th>
            <td><?php echo $d['cuti_alamat']; ?></td>
        </tr>  
       
        <tr>
            <td>Keterangan</td>
            <th>:</th>
            <td><?php echo $d['cuti_keterangan_supervisor']; ?></td>
        </tr>                           
    </table> 

  

    <div class="tandatangan" >            
       <p><?php echo $d['cuti_status_supervisor'] ?><br>
          <?php echo "Devisi ".$d['devisi_nama'] ?></p>
          <img style="width:70px; height: 70px;" src="../gambar/tanda_tangan/<?php echo $d['supervisor_tanda_tangan'] ?>"> 
          <br/>      
          <?php echo $d['supervisor_nama']; ?>  
      </div>
      <div class="tandatangan2">      
          <p>Deli Serdang, <?php echo date('d-m-Y') ?> <br>
          Pemohon, </p>      
          <img style="width:70px; height: 70px;" src="../gambar/tanda_tangan/<?php echo $d['karyawan_tanda_tangan'] ?>"><br>             
          <?php echo $d['karyawan_nama'] ?>
      </div>

      <div class="tandatangan" >
          <br/>
          <p>Mengetahui, <br> Manager</p>
          <img style="width:70px; height: 70px;" src="../gambar/tanda_tangan/<?php echo $d['manajer_tanda_tangan'] ?>"></br>        
          <?php echo $d['manajer_nama'] ?>
      </div>
 </body>
 </html>


 <script>
    window.print();
    $(document).ready(function(){

    });
</script>