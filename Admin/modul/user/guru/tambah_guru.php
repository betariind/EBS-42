
        <div class="content-wrapper">
             <h4> <b>User</b> <small class="text-muted">/ Tambah Guru</small>
    </h4>
    <hr>
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah User Guru Baru</h4>
                      <p class="card-description">
                        
                      </p>
                      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>NIP</label>
                          <input name="nip" type="text" class="form-control" placeholder="NIP">
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap, Gelar</label>
                          <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap, Gelar Guru">
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input name="email" type="text" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control">
                        </div>

                        <button name="saveGuru" type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button class="btn btn-light">Muat Ulang</button>
                      </form>

                      <?php 

                      if (isset($_POST['saveGuru'])) {

                    $pass= sha1($_POST['nip']);
                    $sumber = @$_FILES['foto']['tmp_name'];
                    $target = '../vendor/images/';
                    $nama_gambar = time()."-".@$_FILES['foto']['name'];
                    $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
                    $date = date('Y-m-d');

                    if ($pindah) {
                    $save= mysqli_query($con,"INSERT INTO tb_guru VALUES(NULL,'$_POST[nip]','$_POST[nama]','$_POST[email]','$pass','$nama_gambar','Y','$date','Yes')");
                    if ($save) {
                    echo " <script type='text/javascript'>
                    setTimeout(function () {
                    swal({
                    title: 'Berhasil',
                    text:  'User Guru Baru Ditambahkan',
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
					$savee= mysqli_query($con,"INSERT INTO tb_guru VALUES(NULL,'$_POST[nip]','$_POST[nama]','$_POST[email]','$pass',NULL,'Y','$date','Yes')");
                    if ($savee) {
                    echo " <script type='text/javascript'>
                    setTimeout(function () {
                    swal({
                    title: 'Berhasil',
                    text:  'User Guru Baru Ditambahkan',
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
