
<?php
session_start();
 include '../../config/db.php';

if (@$_SESSION['Guru']) {
?>
<?php
if (@$_SESSION['Guru']) {
$sesi = @$_SESSION['Guru'];
}
$sql = mysqli_query($con,"SELECT * FROM tb_guru WHERE id_guru = '$sesi'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

 ?>



<?php 
// kelas ujian
$kelas = mysqli_query($con, "SELECT * FROM kelas_ujian
INNER JOIN tb_master_kelas ON kelas_ujian.id_kelas=tb_master_kelas.id_kelas
INNER JOIN tb_master_jurusan ON kelas_ujian.id_jurusan=tb_master_jurusan.id_jurusan
WHERE kelas_ujian.id_ujian='$_GET[ujian]' AND kelas_ujian.id_kelas='$_GET[kelas]' AND kelas_ujian.id_jurusan='$_GET[jurusan]' ");
foreach ($kelas as $k)

 ?>

<?php 
// data ujian
$ujian = mysqli_query($con,"SELECT * FROM ujian
INNER JOIN tb_jenisujian ON ujian.id_jenis=tb_jenisujian.id_jenis
INNER JOIN tb_master_mapel ON ujian.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_master_semester ON ujian.id_semester=tb_master_semester.id_semester
WHERE ujian.id_ujian='$_GET[ujian]' ORDER BY id_ujian DESC");
foreach ($ujian as $du) ?>
<style type="text/css">
	body{
		font-family: Verdana, Geneva, Tahoma, sans-serif;
	}
	.kopsurat{width: 980px;
		margin: 0 auto;
		height: 500px;
		padding: 20px;
	}
	
	
	.tengah{
		text-align: center;
		line-height: 5px;
	}

	</style>
	        
	         	<div ckass="kopsurat">
					 <table width="100%" style= "border-bottom: 5px solid #000; padding: 2px">
						 <tr>
							 <td class="tengah"><img src="../../vendor/images/jawabarat.png" width="60px"></td>
							 <td class="tengah">
								 <h3>PEMERINTAH KOTA BEKASI</h3>
								 <h3>DINAS PENDIDIKAN</h3>
								 <h3>SMP NEGERI 42 KOTA BEKASI</h3>
								 <h3>NPSN: 69962413 &nbsp &nbsp &nbsp NSS: 202026506113</h3>
								 <p>Jl. Perumahan Taman Harapan Baru Rt. 9 Rw. 22 Kel. Pejuang</p>
								 <p>Kec. Medan Satria, Kode Pos 17131 Kota Bekasi Telp. (021)88383723</p>
								 <p>email: <a href="smpn42bekasikota@gmail.com">smpn42bekasikota@gmail.com</a> Website <a href="https://smpn42kotabekasi.sch.id">https://smpn42kotabekasi.sch.id</a></p><br>
							 </td>
							 <td><img src="../../vendor/images/logosmpn42.jpeg" width="60px" ></td>
						 </tr>
					 </table>
				 </div><br>
				 <h4></h4>
<table class="table" style="font-weight:bold;width: 400px;font-size: 12px;">
	<tr>
		<td>MATA PELAJARAN</td>
		<td>:</td>
		<td><?php echo $du['mapel']; ?></td>
	</tr>
	<tr>
		<td>KELAS</td>
		<td>:</td>
		<td><?php echo $k['kelas']; ?> </td>
	</tr>
	<tr>
		<td>SEMESTER</td>
		<td>:</td>
		<td><?php echo $du['semester']; ?></td>
	</tr>
	<tr>
		<td>JENIS UJIAN</td>
		<td>:</td>
		<td><?php echo $du['jenis_ujian']; ?></td>
	</tr>
</table>


 <hr>
      



	<table width="100%" border="1" style="border-collapse: collapse;" cellpadding="3">
	<thead>
	<tr style="height: 40px;background-color: #00BCD4;">
	<th width="10">No</th>	
	<th>Nama Siswa</th>
	<th>Jawaban Benar</th>
	<th>Jawaban Salah</th>
	<th>Jawaban Kosong</th>
	<th>NILAI</th>	
	</tr>
	</thead>
	<tbody>
	<?php 
	$no = 1;
	$tampil = mysqli_query($con, "SELECT * FROM tb_siswa WHERE id_kelas='$_GET[kelas]' AND id_jurusan='$_GET[jurusan]' ORDER BY nama_siswa ASC");
	while($r=mysqli_fetch_array($tampil)){
	$nli = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM nilai WHERE id_ujian='$_GET[ujian]' AND id_siswa ='$r[id_siswa]'"));
	?>
	<tr>
		<td><?=$no++; ?>.</td>
		<td><?=$r['nama_siswa']; ?></td>
		<td><?=$nli['jml_benar']; ?></td>
		<td><?=$nli['jml_salah']; ?></td>
		<td><?=$nli['jml_kosong']; ?></td>
		<td><?=$nli['nilai']; ?></td>
	</tr>
<?php } ?>
	</tbody>
	</table>
	<br>
    <table width="100%">
            <!--    <a href="#" class="no-print" onclick="window.print();"> <button style="height: 40px; width: 70px; background-color: dodgerblue;border:none; color: white; border-radius:7px;font-size: 17px; " type=""> Cetak</button> </a> -->
              <tr>
                <td align="right" colspan="6" rowspan="" headers="">
                    <p>Mengetahui, </p>
					<p><?php echo date (" d F Y") ?></p>
                    <p> Guru Mata Pelajaran </p>
                     <br> <br>
                    <p><?php echo $data['nama_guru'];?><br>
                    ---------------------------------- </p>
                </td>
              </tr>
            </table>
            <script>
	window.print();
</script>

<?php
} else{

	

echo "<script>
window.location='../../index.php';</script>";

}