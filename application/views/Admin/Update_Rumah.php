  <!-- Begin Page Content -->
  <div class="container-fluid">

<form method="post" enctype="multipart/form-data">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Rumah</h1>
    <div class="col mt-3">
            <?php echo $this->session->flashdata('pesan')?>
        </div>
    <div class="card shadow mb-4">
    
        <div class="card-body">
        <?php foreach ($data as $d) {?>
        <p>Nama Pemilik Rumah</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['nama_pemilik_rumah'] ?>"
                >
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
                >
        </div>
        <p>Deskripsi</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['deskripsi'] ?>"
                >
        </div>
        <p>Jumlah Kamar</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['jumlah_kamar'] ?>"
                >
        </div>
        <p>Luas Tanah</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['luas_tanah'] ?>"
                >
        </div>
        <p>Harga</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['harga'] ?>"
                >
        </div>
        <p>Nomor Telepon</p>
        <div class="input-group">
            <input name="nama"
                id="nama"
                type="text"
                class="form-control border-dark small mb-3"
                aria-describedby="basic-addon2"
                value="<?php echo $d['no_telp'] ?>"
                >
        </div>
        <p>Agent</p>
        <div class="input-group">
        <select class="form-control border-dark small mb-3" id="komunitas"
            name="komunitas" value="<?php echo set_value('komunitas') ?>">
            <!-- <option value=""><?= $d['name']?></option> -->
            <?php foreach ($agent as $row) { ?>
            <option value="<?php echo $row['id_agent']; ?>"<?=($d['id_agent'] == $row['id_agent']? 'selected' : '' ) ?>>
                <?php echo $row['nama_agent']; ?></option>
            <?php } ?>
        </select>
        </div>
        <p>Kategori</p>
        <div class="input-group">
        <select class="form-control border-dark small mb-3" id="komunitas"
            name="komunitas" value="<?php echo set_value('komunitas') ?>">
            <!-- <option value=""><?= $d['name']?></option> -->
            <?php foreach ($kategori as $row) { ?>
            <option value="<?php echo $row['id']; ?>"<?=($d['id'] == $row['id']? 'selected' : '' ) ?>>
                <?php echo $row['name']; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="row">
                <div class="col">
                    <p>Foto</p>
                    <div class="input-group">
                        <input type="file"
                        id="foto"
                        name="foto"
                            class="form-control border-dark small mb-3"
                            value="<?php echo set_value('foto')?>"
                            aria-describedby="basic-addon2">
                        </div>
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    <p>Component</p>
                    <div class="input-group">
                    <input name="files[]"
                            type="file"
                            class="form-control border-dark small mb-3"
                            aria-describedby="basic-addon2" multiple="multiple">
                        </div>
                </div>
            </div> 
            <?php if($d['status'] == 1){?>
            <a href="<?php echo site_url('Data_Rumah/accepted/'.$d['id_rumah']) ?>" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-check"></i>
                </span>
                <span class="text">Tandai Sebagai Terjual</span>
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
                        <th style="height:20px">Aksi</th>
                    </tr>
                </thead>
                <tbody >
                <?php 
                $no = 1;
                foreach($rumah as $d){?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><img src="<?= base_url('uploads/rumah/') . $d['gambar']; ?>" alt="" style="width:140px "></td>
                        <td>
                            <a href="<?php echo base_url("Data_Rumah/hapusdata/" .$d['id_detail_rumah']);?>"
                                onclick="confirm_modal('<?php echo '../hapusdata/' .$d['id_detail_rumah']; ?>')"
                                class="btn btn-sm btn-danger shadow-sm"
                                data-toggle="modal" data-target="#hapusModal">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
              <!-- //start -->
           <!-- //start -->
           <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                            untuk menghapus?</h5>
                        <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal"
                        untuk kembali ke Panel Admin.</div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="button"
                            data-dismiss="modal">Batal</button>
                        <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- //end  -->
    <!-- //end  -->
        </div>
    </div>
</div>
</form>
</div>
<!-- /.container-fluid -->

</div>
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#hapusModal').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>