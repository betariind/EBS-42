<?php 
$edit= mysqli_query($con,"SELECT * FROM tb_guru WHERE id_guru='$_GET[id]' ");
foreach ($edit as $d) ?>
        <div class="content-wrapper">
             <h4> <b>User Guru</b> <small class="text-muted">/ Edit</small>
    </h4>
    <hr>
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Guru</h4>
                      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Nip</label>
                          <input type="hidden" name="ID" value="<?=$d['id_guru'] ?>">
                          <input name="nip" type="text" class="form-control" value="<?=$d['nik'] ?>" >
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap, Gelar</label>
                          <input name="nama" type="text" class="form-control" value="<?=$d['nama_guru'] ?>">
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input name="email" type="text" class="form-control" value="<?=$d['email'] ?>">
                        </div>

                        <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control" >
                        </div>

                        <button name="updateGuru" type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button class="btn btn-light">Muat Ulang</button>
                      </form>

                      <?php 

                      if (isset($_POST['updateGuru'])) {

                    $pass= sha1($_POST['nip']);
                   
                    $date = date('Y-m-d');

                      $gambar = time()."-".@$_FILES['foto']['name'];
  if (!empty($_FILES['foto']['name'])) {
  $select=mysqli_query($con,"select foto from tb_guru where id_guru='$_POST[ID]'");
$imagee=mysqli_fetch_array($select);
unlink('../vendor/images/img_Guru/'.$imagee['foto']);
  move_uploaded_file($_FILES['foto']['tmp_name'],"../vendor/images/img_Guru/$gambar");
 $edit= mysqli_query($con,"UPDATE tb_guru SET nama_guru='$_POST[nama]',email='$_POST[email]',foto='$gambar' WHERE id_guru='$_POST[ID]' ");
                    if ($edit) {
                    echo " <script type='text/javascript'>
                    setTimeout(function () {
                    swal({
                    title: 'Berhasil',
                    text:  'User Guru Telah Diedit',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: true
                    });     
                    },10);  
                    window.setTimeout(function(){ 
                    window.location.replace('?page=userguru');
                    } ,3000);   
                    </script>";
                    }
  } 
                    
                  else{
				  $editt= mysqli_query($con,"UPDATE tb_guru SET nip='$_POST[nip]',nama_guru='$_POST[nama]',email='$_POST[email]' WHERE id_guru='$_POST[ID]' ");
                    if ($editt) {
                    echo " <script type='text/javascript'>
                    setTimeout(function () {
                    swal({
                    title: 'Berhasil',
                    text:  'User Guru Telah Diedit',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: true
                    });     
                    },10);  
                    window.setTimeout(function(){ 
                    window.location.replace('?page=userguru');
                    } ,3000);   
                    </script>";
                    }
				  }


                    }

                       ?> 

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
