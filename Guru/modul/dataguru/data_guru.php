<div class="content-wrapper">
    <h4> <b>Data Guru</b> <small class="text-muted">/ Data Guru Mata Pelajaran Lainnya</small>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <p class="card-description">
                
                </p>
                <h4 class="card-title">Data Guru Mata Pelajaran Lainnya</h4>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-hover" id="data">
                        <thead>
                        <tr>
                            <th>No.</th> 
                            <th>NIP</th> 
                            <th>Nama Guru, Gelar</th> 
                            <th>Mata Pelajaran</th>                   
                        </tr>                        
                        </thead>  
                        <tbody>
                        <?php 
                        $no=1;
                        $sql = mysqli_query($con,"SELECT * FROM tb_gurulain ORDER BY id_guru ASC");
                        foreach ($sql as $d) { ?>
                        <tr>
                            <td width="50"><b><?=$no++; ?>.</b> </td>
                            <td><?=$d['nip']?> </td>
                            <td><?=$d['namagurumapel']?> </td>
                            <td><?=$d['mapel']?> </td>
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
