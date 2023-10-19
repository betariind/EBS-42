
        <div class="content-wrapper">
             <h4> <b>User</b> <small class="text-muted">/ Tambah Siswa</small>
    </h4>
    <hr>
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah User Siswa Baru</h4>
                      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>NIS</label>
                          <input name="nis" type="text" class="form-control" placeholder="NIS" maxlength="15" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap Siswa</label>
                          <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input name="password" type="text" class="form-control" placeholder="Password" required>
                        </div>
                    <div class="form-group">
                      <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="jk" id="lk" value="L" checked>
                         Laki-laki
                        </label>
                      </div>
                      <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="jk" id="pr" value="P">
                          Perempuan
                        </label>
                      </div>
                    </div>
                    

                <div class="form-group">
                  <label for="kelas">Kelas Siswa</label>
                  <select class="form-control" required id="kelas" name="kelas">
                  <option value=''>-- Pilih --</option>
                  <?php
                  $sqlKelas=mysqli_query($con, "SELECT * FROM tb_master_kelas ORDER BY id_kelas DESC");
                  while($kelas=mysqli_fetch_array($sqlKelas)){
                  echo "<option value='$kelas[id_kelas]'>$kelas[kelas]</option>";
                  }
                  ?>
                  </select>
                </div>
                        <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control">
                        </div>

                        
                        <button onclick='goBack()' class="btn btn-light">Batalkan</button>
                        <button class="btn btn-light">Muat Ulang</button>
                        <button name="saveGuru" type="submit" class="btn btn-success mr-2">Simpan</button>
                      </form>

                      <?php 

                      if (isset($_POST['saveGuru'])) {

                    $pass= sha1($_POST['nis']);
                    $sumber = @$_FILES['foto']['tmp_name'];
                    $target = '../vendor/images/img_Siswa/';
                    $nama_gambar = time()."-".@$_FILES['foto']['name'];
                    $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
                    $date = date('Y-m-d');

                    if ($pindah) {
                    $save= mysqli_query($con,"INSERT INTO tb_siswa VALUES(NULL,'$_POST[nis]','$_POST[nama]','$_POST[password]','$_POST[jk]','$pass','off','Y','0','$nama_gambar','$_POST[kelas]','$_POST[jurusan]','Yes')");
                    if ($save) {
                    echo " <script type='text/javascript'>
                    setTimeout(function () {
                    swal({
                    title: 'Berhasil',
                    text:  'User Siswa Baru Ditambahkan',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: true
                    });     
                    },10);  
                    window.setTimeout(function(){ 
                    window.location.replace('?page=usersiswa');
                    } ,3000);   
                    </script>";
                    }
                    }
					else{
					 $savee= mysqli_query($con,"INSERT INTO tb_siswa VALUES(NULL,'$_POST[nis]','$_POST[nama]','$_POST[jk]','$pass','off','Y','0',NULL,'$_POST[kelas]','$_POST[jurusan]','Yes')");
                    if ($savee) {
                    echo " <script type='text/javascript'>
                    setTimeout(function () {
                    swal({
                    title: 'Berhasil',
                    text:  'User Siswa Baru Ditambahkan',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: true
                    });     
                    },10);  
                    window.setTimeout(function(){ 
                    window.location.replace('?page=usersiswa');
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
		<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
<script>
		function goBack() {
		  window.history.back();
		}
	</script>