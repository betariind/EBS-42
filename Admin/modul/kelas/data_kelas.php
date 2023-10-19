<div class="content-wrapper">
    <h4> <b>Manajemen</b> <small class="text-muted">/ Data Kelas</small>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                <p class="card-description">
                <a data-toggle="modal" data-target="#add" class="btn btn-success text-white pull-right"><i class="fa fa-plus"></i> Tambah Kelas Baru</a> <br>
                </p>
                <h4 class="card-title">Data Kelas</h4>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-hover" id="data">
                        <thead class="text-black">
                        <tr>
                        <th>No.</th> 
                        <th>Nama Kelas</th>  
                        <th>Aksi</th>                     
                        </tr>                        
                        </thead>  
                        <tbody>
                        <?php 
                        $no=1;
                        $sql = mysqli_query($con,"SELECT * FROM tb_master_kelas ORDER BY id_kelas ASC");
                        foreach ($sql as $d) { ?>
                        <tr>
                            <td width="50"><b><?=$no++; ?>.</b> </td>
                            <td><?=$d['kelas']?> </td>
                            <td width="150">
                            <a data-toggle="modal" data-target="#edit<?=$d['id_kelas']?>" class="btn btn-success btn-xs text-white"><i class="fa fa-pencil"></i> EDIT</a>
                            <a href="?page=kelas&act=hapuskelas&id=<?=$d['id_kelas']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> HAPUS</a>

                            <!-- modal edit -->
                            <div class="modal fade" id="edit<?=$d['id_kelas']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title"> Edit Kelas </h4></div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="kelas"> Nama Kelas</label>
                                        <input type="hidden" name="id" value="<?=$d['id_kelas']?>"> 
                                        <input type="text" id="kelas" name="kelas" class="form-control" value="<?=$d['kelas']?>">  </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button name="edit" type="submit" class="btn btn-success"> Simpan</button>
                                    </div>
                                    </form>
                                    <?php 
                                    if (isset($_POST['edit'])) {
                                        $qry = mysqli_query($con,"UPDATE tb_master_kelas SET kelas= '$_POST[kelas]' WHERE id_kelas='$_POST[id]' ");
                                        if ($sql) {
                                            echo "
                                            <script type='text/javascript'>
                                            setTimeout(function () {
                                            swal({
                                            title: 'Berhasil',
                                            text:  'Data Kelas Telah Diubah',
                                            type: 'success',
                                            timer: 3000,
                                            showConfirmButton: true
                                            });     
                                            },10);  
                                            window.setTimeout(function(){ 
                                            window.location.replace('?page=kelas');
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
            <div class="modal-header"><h4 class="modal-title"> Tambah Kelas Baru </h4></div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                    <label for="kelas"> Nama Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Masukan Nama Kelas">                    
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button name="save" type="submit" class="btn btn-success"> Simpan</button>
                </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $qry = mysqli_query($con,"INSERT INTO tb_master_kelas VALUES(NULL,'$_POST[kelas]') ");
                    if ($sql) {
                        echo "
                        <script type='text/javascript'>
                        setTimeout(function () {
                        swal({
                        title: 'Berhasil',
                        text:  'Data Kelas Baru Tersimpan',
                        type: 'success',
                        timer: 4000,
                        showConfirmButton: true
                        });     
                        },10);  
                        window.setTimeout(function(){ 
                        window.location.replace('?page=kelas');
                        } ,3000);   
                        </script>";                        
                    }                   
                }              
                
                ?>
               
            </div>         
    </div>
</div>

