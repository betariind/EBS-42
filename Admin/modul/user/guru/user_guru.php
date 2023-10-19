<div class="content-wrapper">
    <h4> <b>Manajemen User</b> <small class="text-muted">/ Guru</small>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <p class="card-description">
                <a href="?page=userguru&act=tambahguru" class="btn btn-success text-white pull-right"><i class="fa fa-plus"></i> Tambah Guru</a> <br>
                </p>
                <h4 class="card-title">Data Username Guru</h4>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-hover" id="data">
                        <thead>
                        <tr>
                        <th>No.</th> 
                        <th>NIP/Password</th> 
                        <th>Nama Guru, Gelar</th> 
                        <th>Email/Username</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>                     
                        </tr>                        
                        </thead>  
                        <tbody>
                        <?php 
                        $no=1;
                        $sql = mysqli_query($con,"SELECT * FROM tb_guru ORDER BY id_guru ASC");
                        foreach ($sql as $d) { ?>
                        <tr>
                            <td width="50"><b><?=$no++; ?>.</b> </td>
                            <td><?=$d['nip']?> </td>
                            <td><?=$d['nama_guru']?> </td>
                            <td><?=$d['email']?> </td>
							 <?php if ($d['foto'] == '') { ?>
							 <td><img src="../vendor/images/img_Guru/512x512.png" class="img-thumbnail" style="width:50px;height:50px;"> </td>
							 <?php } else {?>
                            <td><img src="../vendor/images/img_Guru/<?=$d['foto']?>" class="img-thumbnail" style="width:50px;height:50px;"> </td>
							<?php } ?>
                            <td><?php
                            if ($d['status']=='Y') {
                                echo "<a href=''><b class='badge badge-success'>Aktif</b></a>";
                            }else{
                                echo "<a href=''><b class='badge badge-danger'>Bloked</b></a>";
                            }


                            ?> </td>
                            <td>
                                <a href="?page=userguru&act=edit&id=<?=$d['id_guru']?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> EDIT</a>
                           <a href="?page=userguru&act=hapusguru&id=<?=$d['id_guru']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> HAPUS</a>


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
