<?php
session_start();
include '../config/db.php';

if (@$_SESSION['Admin']) {
?>
<?php
if (@$_SESSION['Admin']) {
$sesi = @$_SESSION['Admin'];
}
$sql = mysqli_query($con,"SELECT * FROM tb_admin WHERE id_admin = '$sesi'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

// data seklah.apl
$sekolah = mysqli_query($con,"SELECT * FROM tb_sekolah WHERE id_sekolah=1 ");
$apl = mysqli_fetch_array($sekolah);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EBS 42 | <?=$data['nama_lengkap']; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendor/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendor/node_modules/simple-line-icons/css/simple-line-icons.css">
    <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendor/node_modules/font-awesome/css/font-awesome.min.css" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../vendor/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../vendor/images/logosmpn42.jpeg" />
   <link href="../vendor/sweetalert/sweetalert.css" rel="stylesheet" />
  <script type="text/javascript" src="../vendor/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="../vendor/css/jquery.dataTables.css">
</head>

<body>


  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color: #1991eb;">
        <a class="navbar-brand brand-logo" href="index.php" style="font-family:Aegyptus;font-weight: bold;font-size: 30px;">
          <img src="../vendor/images/<?=$apl['logo'];?>" alt="logo" style="height: 45px;width: 45px;border-radius: 10px;">
          <!-- <i class="fa fa-graduation-cap"></i> --><b><?=$apl['textlogo'];?></b>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
          
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

          <li class="nav-item" style="width: 400px;">
            <a href="#" style="color: #fff;text-decoration: none;">
            	
            	<b><?=$apl['nama_sekolah'];?></b></a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right" style="border-top-left-radius:50px;color: black;border-bottom-left-radius:50px;color: #fff;border:1px dashed #00BCD4; ">
          <?php          // menampilkan notifikasi ujian 
          $ujian = mysqli_query($con,"SELECT * FROM ujian
          INNER JOIN tb_master_mapel ON ujian.id_mapel=tb_master_mapel.id_mapel
          INNER JOIN tb_jenisujian ON ujian.id_jenis=tb_jenisujian.id_jenis
          INNER JOIN kelas_ujian ON ujian.id_ujian=kelas_ujian.id_ujian
           WHERE ujian.id_guru='$data[id_guru]' AND kelas_ujian.aktif='Y' GROUP BY kelas_ujian.id_ujian    "); 
           $jm= mysqli_num_rows($ujian);       
            ?>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-ring"></i>
              <span class="count"><?=$jm; ?> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left"> Notifikasi Ujian
                </p>
                <!-- <span class="badge badge-pill badge-warning float-right">View all</span> -->
              </a>
              <?php
              foreach ($ujian as $uj) { ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" href="?page=ujian&act=status&id=<?=$uj['id_ujian'] ?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="fa fa-pencil"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium"><?=$uj['mapel'] ?> </h6>
                  <p class="font-weight-light small-text">
                  <?=$uj['jenis_ujian'] ?>
                  </p>
                </div>
              </a>
              <?php } ?>
               
     
          
            </div>
          </li>
            <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="index.php?page=setting&act=user">              
              <b>My Profile</b>
               <img class="img-xs rounded-circle" src="../vendor/images/img_Guru/<?=$data['foto']; ?>" alt="">
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="../vendor/images/img_Guru/<?=$data['foto']; ?>" alt="image" style="border:3px solid black;"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?=$data['nama_lengkap']; ?></p>
                <p class="designation">Administrasion</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item">
          	<a class="nav-link" href="index.php"><img class="menu-icon" src="../vendor/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">DASHBOARD</span></a>
          </li>
<!-- 
             <li class="nav-item">
            <a class="nav-link" href="?page=mapel"><img class="menu-icon" src="../vendor/images/menu_icons/02.png" alt="menu icon"> <span class="menu-title">MATA PELAJARAN</span></a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#masterData" aria-expanded="false" aria-controls="general-pages"> <i class="fa fa-database"style="font-size:20px;"></i> &nbsp; <span class="menu-title"> MANAJEMEN DATA </span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="masterData" style="background-color:#212121;">
              <ul class="nav flex-column sub-menu">
                <p></p>
                <li class="nav-item">
                 	 <a class="nav-link" href="?page=kelas" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;color:#fff;"></i> &nbsp;
                       <span class="menu-title">Data Kelas</span></a>
               </li>
               
               <li class="nav-item">
                 	 <a class="nav-link" href="?page=semester" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">Data Semester</span></a>
               </li>

               <li class="nav-item">
                 	 <a class="nav-link" href="?page=mapel" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">Data Mata Pelajaran</span></a>
               </li>

               <li class="nav-item">
                 	 <a class="nav-link" href="?page=jenisujian" style="color:#fff;">
                    <i class="fa fa-angle-double-right" style="font-size:20px;color:#fff;"></i> &nbsp;<span class="menu-title">Data Ujian</span></a>
               </li>
    
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#evaluasi" aria-expanded="false" aria-controls="general-pages"> <i class="fa fa-spin fa-gear icon-md"style="font-size:20px;"></i> &nbsp; <span class="menu-title"> MANAJEMEN USER </span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="evaluasi" style="background-color:#212121;">

              <ul class="nav flex-column sub-menu">
                   <p></p>
                <li class="nav-item">
                 	 <a class="nav-link" href="?page=userguru" style="color:#fff;">
                    <i class="fa fa-user-circle" style="font-size:20px;color:#fff;"></i> &nbsp;&nbsp;
                       <span class="menu-title">GURU</span></a>
             	</li>
                <li class="nav-item">
                 	 <a class="nav-link" href="?page=usersiswa" style="color:#fff;">
                    <i class="fa fa-user-circle-o" style="font-size:20px;color:#fff;"></i> &nbsp;&nbsp;<span class="menu-title">SISWA</span></a>
             	</li>
             	</li>
              </ul>
            </div>
          </li>
      <li class="nav-item">
                   <a class="nav-link" href="?page=setting">
                    <i class="fa fa-gears" style="font-size:20px;"></i> &nbsp;&nbsp;<span class="menu-title">PENGATURAN APLIKASI</span></a>
              </li>

                <li class="nav-item">
                   <a class="nav-link" href="?page=setting&act=user">
                    <i class="fa fa-user" style="font-size:20px;"></i> &nbsp;&nbsp;<span class="menu-title">MY PROFILE</span></a>
              </li>
          <hr>

          <li class="nav-item purchase-button">
          	<a class="nav-link" href="logout.php">
          	LOGOUT</a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">

            <!-- Konten -->
            <?php
            error_reporting();
            $page = @$_GET['page'];
            $act = @$_GET['act'];

            if ($page=='kelas') {
            if ($act=='') {
            include 'modul/kelas/data_kelas.php';
            }elseif ($act=='hapuskelas') {
            include 'modul/kelas/hapus_kelas.php';
            }

            }elseif ($page=='semester') {
            if ($act=='') {
            include 'modul/semester/data_semester.php';
            }elseif ($act=='hapus_semester') {
            include 'modul/semester/hapus_semester.php';
            }
            }elseif ($page=='mapel') {
            if ($act=='') {
            include 'modul/mapel/data_mapel.php';
            }elseif ($act=='hapusmapel') {
            include 'modul/mapel/hapus_mapel.php';
            }
            }elseif ($page=='jenisujian') {
            if ($act=='') {
            include 'modul/ujian/data_jenisujian.php';
            }elseif ($act=='hapus') {
            include 'modul/ujian/hapus_jenisujian.php';
            }
            }elseif ($page=='userguru') {
            if ($act=='') {
            include 'modul/user/guru/user_guru.php';
            }elseif ($act=='hapusguru') {
            include 'modul/user/guru/hapus_guru.php';
            }elseif ($act=='confirmguru') {
            include 'modul/user/guru/confirm_guru.php';
            }elseif ($act=='unconfirmguru') {
            include 'modul/guru/unconfirm_guru.php';
            }elseif ($act=='tambahguru') {
            include 'modul/user/guru/tambah_guru.php';
            }elseif ($act=='edit') {
            include 'modul/user/guru/edit_guru.php';
            }
            }elseif ($page=='usersiswa') {
            if ($act=='') {
            include 'modul/user/siswa/user_siswa.php';
            }elseif ($act=='hapus_siswa') {
            include 'modul/user/siswa/hapus_siswa.php';
            }elseif ($act=='confirmsiswa') {
            include 'modul/user/siswa/confirm_siswa.php';
            }elseif ($act=='unconfirmsiswa') {
            include 'modul/user/siswa/unconfirm_siswa.php';
            }elseif ($act=='tambahsiswa') {
            include 'modul/user/siswa/tambah_siswa.php';
            }elseif ($act=='editsiswa') {
            include 'modul/user/siswa/edit_siswa.php';
            }
            }elseif ($page=='setting') {
            if ($act=='') {
             include 'modul/setting/setting.php';
           }elseif ($act=='user') {
             include 'modul/setting/myprofile.php';
           }
            }elseif ($page=='proses') {
            include 'modul/proses.php';
            }elseif ($page=='') {
            include 'Home.php';
            }else{
            echo "<b>404</b> Tidak ada halaman !";
            }

            ?>
           <!-- End-kontent -->
   
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-info d-block text-center text-sm-left d-sm-inline-block">
              <?=$apl['copyright'];?>
            </span>

            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?php echo $apl['nama_sekolah']; ?> <i class="fa fa-graduation-cap text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendor/js/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->


   <script src="../vendor/js/jquery.dataTables.js"></script>
  <script src="../vendor/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="../vendor/sweetalert/sweetalert.min.js"></script>
      <script src="script.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../vendor/js/off-canvas.js"></script>
  <script src="../vendor/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->




     <script>
        CKEDITOR.replace('ckeditor',{
            
            filebrowserImageBrowseUrl : '../vendor/kcfinder',
            // uiColor:'#1991eb'
        });
    </script>
        <script>
      $(document).ready(function() {
    $('#data').DataTable();
    } );
    </script>







</body>

</html>


<?php
} else{

	include 'modul/500.html';

// echo "<script>
// window.location='../index.php';</script>";

}