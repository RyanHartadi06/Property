  <!-- Begin Page Content -->
  <div class="container-fluid">

<form method="post" enctype="multipart/form-data">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Rumah</h1>
 
    <div class="card shadow mb-4">
    
        <div class="card-body">
        <?php foreach ($data as $d) {?>
        <div class="row">
            <div class="col">
                <p>Banner Rumah</p>
                <div class="input-group">
                    <img src="<?= base_url('uploads/rumah/') . $d['banner']; ?>" alt="" style="width:1200px">
                </div>
            </div>
        </div> 
        <br/>
        <p>Nama Rumah</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
             
                aria-describedby="basic-addon2"
                value="<?php echo $d['nama_pemilik_rumah'] ?>"
                disabled>
        <input name="id_rumah"
           id="id_rumah"
           value="<?php echo $d['id_rumah'] ?>"
           type="hidden"
           >
        </div>
        <p>Alamat</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['alamat_lengkap'] ?>"
                disabled>
        </div>
        <p>Deskripsi</p>
        <div class="input-group">
            <textarea name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                disabled><?php echo $d['deskripsi'] ?></textarea>
        </div>
        <p>Jumlah Kamar</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['jumlah_kamar'] ?>"
                disabled>
        </div>
        <p>Jumlah Kamar Mandi</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['kamar_mandi'] ?>"
                disabled>
        </div>
        <p>Luas Tanah</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['luas_tanah'] ?>"
                disabled>
        </div>
        <p>Harga</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['harga'] ?>"
                disabled>
        </div>
        <p>Nomor Telepon</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['no_telp'] ?>"
                disabled>
        </div>
        <p>Agent</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['nama_agent'] ?>"
                disabled>
        </div>
        <p>Kategori</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['name'] ?>"
                disabled>
        </div>
        <p>Sertifikat</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['sertifikat'] ?>"
                disabled>
        </div>
        <p>Air</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['air'] ?>"
                disabled>
        </div>
        <p>Listrik</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['listrik'] ?>"
                disabled>
        </div>
        <p>Kondisi</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['kondisi'] ?>"
                disabled>
        </div>
        <p>Status</p>
        <?php if ($d['status_property'] == 1){?>
            <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="Dijual"
                disabled>
        </div>
        <?php } else {?>
            <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="Sewa"
                disabled>
        </div>
        <?php }?>
      
            <?php if($d['status'] == 1){?>
                <a href="<?php echo site_url('Data_Rumah/accepted/'.$d['id_rumah']) ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                    </span>
                    <span class="text">Tandai Sebagai Terjual</span>
                </a>
            <?php }else { ?>
                <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Sudah Terjual</span>
                </a>
            <?php } ?>
        <?php } ?>
        <a href="<?php echo site_url('Data_Rumah') ?>" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
            <i class="fas fa-reply"></i>
            </span>
            <span class="text">Kembali</span>
        </a>

        </div>
    </div>
    <!-- /.card -->



<h1 class="h3 mb-2 text-gray-800">Gambar Bangunan</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Album</th>
                    </tr>
                </thead>
                <tbody >
                <?php 
                $no = 1;
                foreach($rumah as $d){?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><img src="<?= base_url('uploads/rumah/') . $d['gambar']; ?>" alt="" style="width:140px"></td>
                        
                    </tr>
                <?php } ?>
                </tbody>
            </table>
              <!-- //start -->
  
    <!-- //end  -->
        </div>
    </div>
</div>
</form>
</div>
<!-- /.container-fluid -->

</div>\