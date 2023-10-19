<?php 

$aktif = mysqli_query($con,"UPDATE kelas_tugas SET aktif='Y' WHERE id_tugas='$_GET[tugas]' ");

    if ($aktif) {
		echo "
			<script type='text/javascript'>
			setTimeout(function () {
			swal({
			title: 'Tugas Kelas Diaktifkan',
			text:  '',
			type: 'success',
			timer: 3000,
			showConfirmButton: true
			});     
			},10);  
			window.setTimeout(function(){ 
			window.location.replace('?page=tugas');
			} ,3000);   
		</script>";
  }

 ?>