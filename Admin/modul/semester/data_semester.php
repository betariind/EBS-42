<div class="content-wrapper">
    <h4> <b>Manajemen</b> <small class="text-muted">/ Data Semester</small>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                <p class="card-description">
                <a data-toggle="modal" data-target="#add" class="btn btn-success text-white pull-right"><i class="fa fa-plus"></i> Tambah Semester</a> <br>
                </p>
                <h4 class="card-title">Data Semester</h4>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-hover" id="data">
                        <thead class="text-black">
                        <tr>
                        <th>No.</th> 
                        <th>Nama semester</th>  
                        <th>Aksi</th>                     
                        </tr>                        
                        </thead>  
                        <tbody>
                        <?php 
                        $no=1;
                        $sql = mysqli_query($con,"SELECT * FROM tb_master_semester ORDER BY id_semester ASC");
                        foreach ($sql as $d) { ?>
                        <tr>
                            <td width="50"><b><?=$no++; ?>.</b> </td>
                            <td><?=$d['semester']?> </td>
                            <td width="150">
                            <a data-toggle="modal" data-target="#edit<?=$d['id_semester']?>" class="btn btn-success btn-xs text-white"><i class="fa fa-pencil"></i> EDIT</a>
                            <a href="?page=semester&act=hapus_semester&id=<?=$d['id_semester']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> HAPUS</a>

                            <!-- modal edit -->
                            <div class="modal fade" id="edit<?=$d['id_semester']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title"> Edit Semester </h4></div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="semester"> Nama Semester</label>
                                        <input type="hidden" name="id" value="<?=$d['id_semester']?>"> 
                                        <input type="text" id="semester" name="semester" class="form-control" value="<?=$d['semester']?>">  </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button name="edit" type="submit" class="btn btn-success"> Edit</button>
                                    </div>
                                    </form>
                                    <?php 
                                    if (isset($_POST['edit'])) {
                                        $qry = mysqli_query($con,"UPDATE tb_master_semester SET semester= '$_POST[semester]' WHERE id_semester='$_POST[id]' ");
                                        if ($sql) {
                                            echo "
                                            <script type='text/javascript'>
                                            setTimeout(function () {
                                            swal({
                                            title: 'Berhasil',
                                            text:  'Data Semester Telah Diubah',
                                            type: 'success',
                                            timer: 3000,
                                            showConfirmButton: true
                                            });     
                                            },10);  
                                            window.setTimeout(function(){ 
                                            window.location.replace('?page=semester');
                                            } ,3000);   
                                            </script>";                       
                                        }                   
                                    }              
                                    
                                    ?>
                                
                                </div>         
                        </div>
                    </div>


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
</div>
<!-- Modal Detail-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"> Tambah Semester </h4></div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                    <label for="semester"> Nama Semester</label>
                    <input type="text" id="semester" name="semester" class="form-control" placeholder="Masukan Semester">                    
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button name="save" type="submit" class="btn btn-success"> Simpan</button>
                </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $qry = mysqli_query($con,"INSERT INTO tb_master_semester VALUES(NULL,'$_POST[semester]') ");
                    if ($sql) {
                        echo "
                        <script type='text/javascript'>
                        setTimeout(function () {
                        swal({
                        title: 'Berhasil',
                        text:  'Data Semester Tersimpan',
                        type: 'success',
                        timer: 4000,
                        showConfirmButton: true
                        });     
                        },10);  
                        window.setTimeout(function(){ 
                        window.location.replace('?page=semester');
                        } ,3000);   
                        </script>";                        
                    }                   
                }              
                
                ?>
               
            </div>         
    </div>
</div>

