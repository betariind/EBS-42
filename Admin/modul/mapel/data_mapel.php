<div class="content-wrapper">
    <h4> <b>Manajemen</b> <small class="text-muted">/ Data Mata Pelajaran</small>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                <p class="card-description">
                <a data-toggle="modal" data-target="#add" class="btn btn-success text-white pull-right"><i class="fa fa-plus"></i> Tambah Mata Pelajaran Baru</a> <br>
                </p>
                <h4 class="card-title">Data Mata Pelajaran</h4>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-hover" id="data">
                        <thead class="text-black">
                        <tr>
                        <th>No.</th> 
                        <th>Nama mapel</th>  
                        <th>Aksi</th>                     
                        </tr>                        
                        </thead>  
                        <tbody>
                        <?php 
                        $no=1;
                        $sql = mysqli_query($con,"SELECT * FROM tb_master_mapel ORDER BY id_mapel ASC");
                        foreach ($sql as $d) { ?>
                        <tr>
                            <td width="50"><b><?=$no++; ?>.</b> </td>
                            <td><?=$d['mapel']?> </td>
                            <td width="150">
                            <a data-toggle="modal" data-target="#edit<?=$d['id_mapel']?>" class="btn btn-success btn-xs text-white"><i class="fa fa-pencil"></i> EDIT</a>
                            <a href="?page=mapel&act=hapusmapel&id=<?=$d['id_mapel']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> HAPUS</a>

                            <!-- modal edit -->
                            <div class="modal fade" id="edit<?=$d['id_mapel']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title"> Edit Mata Pelajaran </h4></div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="mapel"> Nama Mata Pelajaran</label>
                                        <input type="hidden" name="id" value="<?=$d['id_mapel']?>"> 
                                        <input type="text" id="mapel" name="mapel" class="form-control" value="<?=$d['mapel']?>">  </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button name="edit" type="submit" class="btn btn-success"> Edit</button>
                                    </div>
                                    </form>
                                    <?php 
                                    if (isset($_POST['edit'])) {
                                        $qry = mysqli_query($con,"UPDATE tb_master_mapel SET mapel= '$_POST[mapel]' WHERE id_mapel='$_POST[id]' ");
                                        if ($sql) {
                                            echo "
                                            <script type='text/javascript'>
                                            setTimeout(function () {
                                            swal({
                                            title: 'Berhasil',
                                            text:  'Data Mata Pelajaran Telah Diubah',
                                            type: 'success',
                                            timer: 4000,
                                            showConfirmButton: true
                                            });     
                                            },10);  
                                            window.setTimeout(function(){ 
                                            window.location.replace('?page=mapel');
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
            <div class="modal-header"><h4 class="modal-title"> Tambah Mata Pelajaran </h4></div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                    <label for="mapel"> Nama Mata Pelajaran</label>
                    <input type="text" id="mapel" name="mapel" class="form-control" placeholder="Masukan Nama Mata Pelajaran">                    
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button name="save" type="submit" class="btn btn-success"> Simpan</button>
                </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $qry = mysqli_query($con,"INSERT INTO tb_master_mapel VALUES(NULL,'$_POST[mapel]') ");
                    if ($sql) {
                        echo "
                        <script type='text/javascript'>
                        setTimeout(function () {
                        swal({
                        title: 'Berhasil',
                        text:  'Data Mata Pelajaran Baru Tersimpan',
                        type: 'success',
                        timer: 3000,
                        showConfirmButton: true
                        });     
                        },10);  
                        window.setTimeout(function(){ 
                        window.location.replace('?page=mapel');
                        } ,3000);   
                        </script>";                        
                    }                   
                }              
                
                ?>
               
            </div>         
    </div>
</div>

