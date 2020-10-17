<div class="container-fluid">
<div class="well well-lg">
    <div class="container">
        <h2>Data Agency</h2>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="col mt-3">
        <?php echo $this->session->flashdata('pesan')?>
    </div>
    <a href="<?php echo site_url('Agency/add') ?>"
        class="btn btn-sm btn-info btn-icon-split shadow-sm">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text"> Tambah Data Agency</span>
    </a>    
</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Agency</th>
                        <th>Nomor Whatsapps</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Email</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                    $no = 1;
                    foreach ($dataku as $row){  
                    ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $row['nama_agent']?></td>
                            <td><?= $row['no_wa']?></td>
                            <td><?= $row['instagram']?></td>
                            <td><?= $row['facebook']?>m</td>
                            <td><?= $row['email']?></td>
                            <td>
                                <a href="<?php echo base_url("Agency/edit/" .$row['id_agent']);?>"
                                class="btn btn-sm btn-success btn-circle">
                                <i class="fas fa-pen"></i>
                                </a>
                                <a href="<?php echo base_url("panti/kasus_detail/" .$row['id_agent']);?>"
                                class="btn btn-sm btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


