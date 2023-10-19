<script type="text/javascript" src="pesan.js"></script>
<?php 
// jumlah mapel yg diampu
$mapel = mysqli_num_rows(mysqli_query($con,"SELECT id_mapel FROM tb_roleguru WHERE id_guru='$sesi' "));
//perangkat
$perangkat = mysqli_num_rows(mysqli_query($con,"SELECT id_tugas FROM tb_tugas WHERE id_guru='$sesi' "));

// materi
$materi = mysqli_num_rows(mysqli_query($con,"SELECT id_materi FROM tb_materi
   INNER JOIN tb_roleguru ON tb_materi.id_roleguru=tb_roleguru.id_roleguru
 WHERE tb_roleguru.id_guru='$sesi' "));
// ujian
$objektif = mysqli_num_rows(mysqli_query($con,"SELECT id_ujian FROM ujian WHERE id_guru='$sesi' "));
$essay = mysqli_num_rows(mysqli_query($con,"SELECT id_ujianessay FROM ujian_essay WHERE id_guru='$sesi' "));
$ujian = $objektif+$essay;

 ?>
<div class="content-wrapper">
<h3>
<!-- <img class="menu-icon" src="../vendor/images/menu_icons/01.png" width="20"> -->
 <b>Dashboard</b>
<small class="text-muted">/
Guru
</small>
</h3>
<hr>
<div class="row">
  <div class="col-md-9 col-xs-12">

    <div class="row">

      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #2ad572;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-globe icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold">Jumlah Mata Pelajaran</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0"><?=$mapel; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=mapel" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>

      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #56b0ea;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-file-text-o icon-lg text-white"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold text-white">Jumlah Tugas</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0 text-white"><?=$perangkat; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=tugas&act=view
" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>


      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #bd0c15;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-file-text-o icon-lg text-white"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold text-white">Jumlah Materi</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0 text-white"><?=$materi; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=materi" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>

      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics" style="background-color: #e080f2;border-radius: 10px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="fa fa-pencil icon-lg text-white"></i>
              </div>
              <div class="float-right">
                <p class="card-text text-right font-weight-bold text-white">Jumlah Ujian</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-center mb-0 text-white"><?=$ujian; ?></h3>
                </div>
              </div>
            </div>
            <hr>            
              <a href="?page=ujian" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Views</a>           
          </div>
        </div>
      </div>



    </div>
    <div class="row">
     <!-- info materi -->
     <?php 
	 $tgl=date('Y-m-d');
     $mtri = mysqli_query($con,"SELECT * FROM tb_materi 

      INNER JOIN tb_roleguru ON tb_materi.id_roleguru=tb_roleguru.id_roleguru

     INNER JOIN tb_master_kelas ON tb_roleguru.id_kelas=tb_master_kelas.id_kelas

     INNER JOIN tb_master_mapel ON tb_roleguru.id_mapel=tb_master_mapel.id_mapel

     INNER JOIN tb_master_jurusan ON tb_roleguru.id_jurusan=tb_master_jurusan.id_jurusan
     
     WHERE tb_roleguru.id_guru='$sesi' AND tb_materi.public='Y' AND tb_materi.tgl_entry='$tgl'
     ");
     foreach ($mtri as $mtr) { ?>
      <div class="col-md-10">
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Info!</strong> Anda telah Membagikan Materi <b><?=$mtr['mapel'] ?></b> Untuk Kelas <b><?=$mtr['kelas'] ?>-<?=$mtr['jurusan'] ?></b>
    
            <?php
            if ($mtr['public']=='Y') {
            echo "<a href='?page=materi&act=activate&id=$mtr[id_materi]&status=$mtr[public]'>Klik disini</a>";
            }else{
            echo "<a href='?page=materi&act=activate&id=$mtr[id_materi]&status=$mtr[public]'>Klik disini</a>";
            }

            ?>

          untuk Membatalkan !
        </div>
      </div>
     <?php
     }
      ?>

    </div>  
    </div> 
	





      <!-- Aktifitas Ujian Siswa -->
      <!-- cek Jika ketersediaan ujian Objektif -->
    

    


 <!--       <div class="card" style="overflow: scroll;min-height: 600px;">
                <div class="card-body">
                  <h4 class="card-title">Status Ujian</h4>
                  <p class="card-description">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sw = mysqli_query($con,"SELECT * FROM tb_siswa
                        INNER JOIN tb_master_kelas ON tb_siswa.id_kelas=tb_master_kelas.id_kelas
                        INNER JOIN tb_master_jurusan ON tb_siswa.id_jurusan=tb_master_jurusan.id_jurusan
                       WHERE tb_siswa.id_kelas='$role[id_kelas]' AND tb_siswa.id_jurusan='$role[id_jurusan]' ");
                      foreach ($sw as $s) { ?>
                      <tr>
                        <td>
                          <a href="" class="btn btn-danger btn-xs"> <i class="fa fa-undo"></i> </a>
                        </td>
                         <td> <img src="../vendor/images/img_Siswa/<?=$s['foto']; ?>" alt="image" style=" border-radius: 100%;width: 30px;height: 30px;"/></td>
                        <td><?=$s['nama_siswa']; ?></td>
                        <td><?=$s['kelas']; ?>-<?=$s['jurusan']; ?></td>
                        <td>
                          <?php 
                          if ($s['status']=='off') {
                            ?>
                            <label class="badge badge-danger"> <?=$s['status']; ?></label>
                            <?php
                          }elseif ($s['status']=='Online') {
                            ?>
                            <label class="badge badge-dark"> <?=$s['status']; ?></label>
                            <?php
                          }elseif ($s['status']=='selesai') {
                            ?>
                            <label class="badge badge-success"> <?=$s['status']; ?></label>
                            <?php
                          }else{
                             ?>
                            <label class="badge badge-info"> <?=$s['status']; ?></label>
                            <?php
                          }


                           ?>
                         </td>
                      </tr>
                    <?php } ?>

                    </tbody>
                  </table>
                </div>
                </div>
              </div> -->




    </div>  
</div>





</div>

<!--         <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-file text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Total Pelajaran</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">65</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Orders</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">3455</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-teal icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Sales</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">5693</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Employees</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">246</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Targets</h5>
                  <canvas id="dashoard-area-chart" height="100px"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
 -->