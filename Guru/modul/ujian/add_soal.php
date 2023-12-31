<div class="content-wrapper">
  <h4>
  Soal Objektif <small class="text-muted">/ Tambah Soal Objektif</small>
  </h4>
  <hr>
  <div class="row">

    <div class="col-md-10 col-xs-12 d-flex align-items-stretch grid-margin">
      <div class="row flex-grow">
        <div class="col-12 col-xs-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Soal Objektif</h4>
              <p class="card-description">
                <!-- Basic form layout -->
              </p>
              <form class="forms-sample" action="?page=proses" method="post">
                <input type="hidden" name="id" value="<?=$_GET['ID']; ?>">


                <div class="form-group">
                  <label for="ckeditor">Masukan Soal</label>
                  <textarea name="soal" id="ckeditor"></textarea>
                </div>

              <div class="form-group">
              	<label for="p1">Pilihan A</label>
                <div class="input-group">                          
          			<textarea name="p1" class="form-control" id="ckeditor1"></textarea>
                  <div class="input-group-append bg-primary border-primary">
                    <a class="input-group-text bg-transparent" data-toggle="modal" data-target="#pilihanA"><i class="mdi mdi-menu text-white"></i></a>
                  </div>
                </div>
              </div>

                <div class="form-group">
              	<label for="p2">Pilihan B</label>
                <div class="input-group">                          
          			<textarea name="p2" class="form-control" id="ckeditor2"></textarea>
                  <div class="input-group-append bg-primary border-primary">
                    <a class="input-group-text bg-transparent" data-toggle="modal" data-target="#pilihanB"><i class="mdi mdi-menu text-white"></i></a>
                  </div>
                </div>
              </div>

               <div class="form-group">
              	<label for="p3">Pilihan C</label>
                <div class="input-group">                          
          			<textarea name="p3" class="form-control" id="ckeditor3"></textarea>
                  <div class="input-group-append bg-primary border-primary">
                    <a class="input-group-text bg-transparent" data-toggle="modal" data-target="#pilihanC"><i class="mdi mdi-menu text-white"></i></a>
                  </div>
                </div>
              </div>
               <div class="form-group">
              	<label for="p4">Pilihan D</label>
                <div class="input-group">                          
          			<textarea name="p4" class="form-control" id="ckeditor4"></textarea>
                  <div class="input-group-append bg-primary border-primary">
                    <a class="input-group-text bg-transparent" data-toggle="modal" data-target="#pilihanD"><i class="mdi mdi-menu text-white"></i></a>
                  </div>
                </div>
              </div>

               <div class="form-group">
              	<label for="p5">Pilihan E</label>
                <div class="input-group">                          
          			<textarea name="p5" class="form-control" id="ckeditor5"></textarea>
                  <div class="input-group-append bg-primary border-primary">
                    <a class="input-group-text bg-transparent" data-toggle="modal" data-target="#pilihanE"><i class="mdi mdi-menu text-white"></i></a>
                  </div>
                </div>
              </div>

                 <div class="form-group">
                  <label>Jawaban Benar</label>
                  <select class="form-control" required name="kunci" style="font-weight: bold;background-color: #212121;color: #fff;">
				  <option value=''>-- Pilih Jawaban Yang Benar --</option>
                  <option value="1">A</option>
				  <option value="2">B</option>
				  <option value="3">C</option>
				  <option value="4">D</option>
				  <option value="5">E</option>
               
                  </select>
              </div>






                <button type="submit" name="objektifSave" class="btn btn-primary mr-2">Simpan</button>
                <a href="javascript:history.back()" class="btn btn-light">Batal</a>
  

<?php include 'moudul/ujian/modalinput.php'; ?>













              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
