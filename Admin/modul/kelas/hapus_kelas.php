<?php
$del = mysqli_query($con,"DELETE FROM tb_master_kelas WHERE id_kelas='$_GET[id]' ") or die(mysqli_error($con));
if ($del) {	

	echo "
	<script type='text/javascript'>
	setTimeout(function () {
	swal({
	title: 'Berhasil',
	text:  'Data Kelas Telah Dihapus',
	type: 'success',
	timer: 4000,
	showConfirmButton: true
	});     
	},10);  
	window.setTimeout(function(){ 
	window.location.replace('?page=kelas');
	} ,3000);   
	</script>";
}

 ?>