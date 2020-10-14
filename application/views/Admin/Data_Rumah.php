<div class="container-fluid">
<div class="well well-lg">
    <div class="container">
        <h2>Daftar Rumah</h2>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="col mt-3">
        <?php echo $this->session->flashdata('pesan')?>
    </div>
    <a href="<?php echo site_url('Data_Rumah/add') ?>"
        class="btn btn-sm btn-info btn-icon-split shadow-sm">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text"> Tambah Data Rumah</span>
    </a>    
</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat Lengkap</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tambahkan Gambar</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                    $no = 1;
                    foreach ($data as $row){  
                    ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $row['nama_pemilik_rumah']?></td>
                            <td><?= $row['alamat_lengkap']?></td>
                            <td><?= $row['luas_tanah']?></td>
                            <td><?= $row['luas_bangunan']?>m</td>
                            <td><?= $row['harga']?></td>
                          
                            <td><?php if ($row['status'] == 0) {
                            echo '<div class="badge badge-primary badge-pill">Belum Berlangsung</div>';
                            } elseif ($row['status'] == 1) {
                            echo '<div class="badge badge-success badge-pill">Tersedia</div>';
                            }
                            elseif ($row['status'] == 2) {
                                echo '<div class="badge badge-danger badge-pill">Sold Out</div>';
                            }
                            ?>
                            </td>
                            <td>
                            <a href="<?php echo site_url('Data_Rumah/add_image/'.$row['id_rumah']) ?>"
                                class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text"> Tambahkan Gambar</span>
                            </a>   
                            </td>
                            <td>
                                <a href="<?php echo base_url("panti/kasus_detail/" .$row['id_rumah']);?>"
                                class="btn btn-sm btn-primary btn-circle">
                                <i class="fas fa-plus"></i>
                                </a>
                                <a href="<?php echo base_url("panti/kasus_detail/" .$row['id_rumah']);?>"
                                class="btn btn-sm btn-success btn-circle">
                                <i class="fas fa-pen"></i>
                                </a>
                                <a href="<?php echo base_url("panti/kasus_detail/" .$row['id_rumah']);?>"
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


