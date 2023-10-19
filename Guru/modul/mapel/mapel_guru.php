  <div class="content-wrapper">
      <h4>
  Mata Pelajaran
  </h4>
  <hr>
              <?php 
          if (empty($role['id_guru'])) {
            ?>
              <div class="row purchace-popup">
                <div class="col-md-12">
                  <span class="d-flex alifn-items-center">
                  <p>Anda belum memiliki data pelajaran yang diampu, silahkan pilih <strong>Tambah Mata Pelajaran</strong> untuk memulai</p>
                  <a href="?page=mapel&act=tambahmapel" class="btn ml-auto purchase-button"> <i class="fa fa-plus"></i> Tambah Mata Pelajaran</a>
                  <i class="mdi mdi-close popup-dismiss"></i>
                  </span>
                </div>
              </div>
          
            <?php
          }else{
            ?>
              <div class="row purchace-popup">
                <div class="col-md-12">
                  <span class="d-flex alifn-items-center">
                 <a href="?page=mapel&act=tambahmapel" class="btn btn-primary text-white pull-right"> <i class="fa fa-plus"></i> Tambah Mata Pelajaran Baru</a>
                  </span>
                </div>
              </div>




          <div class="row">
           <div class="col-md-12">

               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mata Pelajaran yang Diampu</h4>
                  
                  <div class="table-responsive">   
                  <table class="table table-striped table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                          <?php 
                          $no=1;
                        $sqlrole = mysqli_query($con,"SELECT * FROM tb_roleguru
                          INNER JOIN tb_master_kelas ON tb_roleguru.id_kelas=tb_master_kelas.id_kelas
                          INNER JOIN tb_master_mapel ON tb_roleguru.id_mapel=tb_master_mapel.id_mapel
                          INNER JOIN tb_master_semester ON tb_roleguru.id_semester=tb_master_semester.id_semester
                          WHERE tb_roleguru.id_guru='$sesi' ");
                        foreach ($sqlrole as $row) { ?>       

                      <tr>
                        <td><?=$no++; ?>.</td>
                        <td><?=$row['mapel']; ?></td>
                        <td><?=$row['kelas']; ?></td>
                        <td><?=$row['semester']; ?></td>
                        <td>
                          <a href="?page=mapel&act=edit&ID=<?=$row['id_roleguru']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> EDIT </a>
                          <a href="modul/mapel/hapus_mapel_guru.php?ID=<?= $row['id_roleguru']; ?>" onclick="return confirm('Ingin menghapus mata pelajaran ini?')" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i> HAPUS </a>
                        </td>

                      </tr>
                    <?php } ?>

                   </tbody>
                 </table>
               </div>
               </div>
             </div>


           </div>
          </div>
      

            <?php
           
          }
          ?>

  </div>