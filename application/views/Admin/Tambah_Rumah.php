<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Tambah Property</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <div class="row col-md-12">
              <div class="col-md-4">
                <p>Nama Property</p>
                <div class="input-group">
                  <input type="text" id="nama_pemilik_rumah" name="nama_pemilik_rumah" class="form-control border-dark small mb-3" required value="<?php echo set_value('nama_pemilik_rumah') ?>" aria-describedby="basic-addon2">
                  <input type="text" id="id_rumah" name="id_rumah" class="form-control border-dark small mb-3" value="<?= $kode ?>" hidden aria-describedby="basic-addon2">
                </div>

              </div>
              <div class="col-md-4">
                <p>Alamat Lengkap</p>
                <div class="input-group">
                  <input type="text" id="alamat_lengkap" name="alamat_lengkap" required class="form-control border-dark small mb-3" value="<?php echo set_value('alamat_lengkap') ?>" aria-describedby="basic-addon2">
                </div>

              </div>
              <div class="col-md-4">
                <p>Foto Banner</p>
                <div class="input-group">
                  <input type="file" name="foto" class="form-control border-dark small mb-3" aria-describedby="basic-addon2">
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-3">
                <p>Jumlah Kamar</p>
                <div class="input-group">
                  <input type="number" id="jumlah_kamar" name="jumlah_kamar" class="form-control border-dark small mb-3" value="<?php echo set_value('jumlah_kamar') ?>" aria-describedby="basic-addon2">
                </div>
              </div>
              <div class="col-md-3">
                <p>Jumlah Kamar Mandi</p>
                <div class="input-group">
                  <input type="text" id="kamar_mandi" name="kamar_mandi" class="form-control border-dark small mb-3" value="<?php echo set_value('kamar_mandi') ?>" aria-describedby="basic-addon2"></input>
                </div>
              </div>
              <div class="col-md-3">
                <p>Luas Tanah</p>
                <div class="input-group">
                  <input type="text" id="luas_tanah" name="luas_tanah" class="form-control border-dark small mb-3" value="<?php echo set_value('luas_tanah') ?>" aria-describedby="basic-addon2"></input>
                </div>
              </div>
              <div class="col-md-3">
                <p>Luas Bangunan</p>
                <div class="input-group">
                  <input type="text" id="luas_bangunan" name="luas_bangunan" class="form-control border-dark small mb-3" value="<?php echo set_value('luas_bangunan') ?>" aria-describedby="basic-addon2">
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-3">
                <p>Harga</p>
                <div class="input-group">
                  <input type="text" id="harga" name="harga" class="form-control border-dark small mb-3" value="<?php echo set_value('harga') ?>" aria-describedby="basic-addon2">
                </div>
              </div>
              <div class="col-md-3">
                <p>Status</p>
                <div class="input-group">
                  <select class="form-control border-dark small mb-3" id="status_property" name="status_property">
                    <option value="1">Dijual</option>
                    <option value="2">Sewa</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <p>Pilih Kategori</p>
                <div class="input-group">
                  <select class="form-control border-dark small mb-3" id="kat" name="kat">
                    <?php foreach ($kat as $l) { ?>
                      <option value="<?php echo $l['id']; ?>"><?php echo $l['name']; ?> </option>
                    <?php } ?>

                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <p>Pilih Agent</p>
                <div class="input-group">
                  <select class="form-control border-dark small mb-3 js-example-basic-single" id="agent" name="agent">
                    <?php foreach ($agent as $l) { ?>
                      <option value="<?php echo $l['id_agent']; ?>"><?php echo $l['nama_agent']; ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <!-- <select class="js-example-basic-single" name="state">
                  <option value="AL">Alabama</option>
                  <option value="WY">Wyoming</option>
                </select> -->
              </div>
            </div>
            <div class="row col-md-12">

            </div>

            <div class="row">
              <div class="col">
                <p>Deskripsi Property</p>
                <div class="input-group">
                  <textarea type="text" id="desc" name="desc" class="form-control border-dark mb-3" aria-describedby="basic-addon2"></textarea>
                </div>
              </div>
            </div>
            <br />
          </div>
        </div>
        <button type="submit" class="btn btn-info btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Kirim Data</span>
        </button>
        <a href="<?= base_url('Data_Rumah') ?>" class="btn btn-danger btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-reply"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
      </div>
    </div>
    <!-- /.card -->

</div>
<!-- /.container-fluid -->
</form>
<!-- <?php
$cek = $this->session->flashdata('message');
if ($cek == "success") {
?>
  <button data-toggle="modal" data-target="#verifikasi" style="display:none;" id="but" class="but"></button>
<?php } ?> -->


<div class="modal fade" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <form method="post" action="<?= base_url('Data_Rumah/fotoRumah') ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <?= $this->session->flashdata('pesan') ?>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
        </div>
        <div class="modal-body">
          <p><b>Upload Foto Rumah</b></p><br>
          <input class="" name="id_rumah" value="<?= $this->session->flashdata('id_rumah') ?>" hidden>
          <div class="row col-md-12 ">
            <div class="input-group">
              <input class="form-control border-dark small mb-3" aria-describedby="basic-addon2" type="file" name="gambar[]" multiple>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" href="<?= base_url('Data_Rumah') ?>">Lain Kali</a>
          <button class="btn btn-info" type="submit">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
