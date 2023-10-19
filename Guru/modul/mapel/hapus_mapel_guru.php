<?php
 
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $host ="localhost";
 $user ="root";
 $pass = "";
 $db= "elearningdb";
 
 $con = new mysqli($host,$user,$pass,$db) or die(mysqli_error($con));
 
 date_default_timezone_set('Asia/Jakarta'); 

 
$id = $_GET['ID'];
var_dump($id);

$del = mysqli_query($con,"DELETE FROM tb_roleguru WHERE id_roleguru='$id' ") or die(mysqli_error($con));
var_dump($del);
if ($del) {	

	echo "
	<script type='text/javascript'>
	window.location.href='/EBS42/Guru/index.php?page=mapel';
	</script>";
}

 ?>