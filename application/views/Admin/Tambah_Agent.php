<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Tambah Agent</h1>
  <form action="" method="post" enctype="multipart/form-data">

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row col-md-12">
          <div class="row col-md-12">
            <div class="col">
              <p>Nama Agent</p>
              <div class="input-group">
                <input type="text" id="nama" name="nama" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Agency" value="<?php echo set_value('nama') ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="col">
              <p>Nomor Whatsapps</p>
              <div class="input-group">
                <input type="number" id="no" name="no" class="form-control border-dark small mb-3" placeholder="Masukkan Nomor Whatsapp" value="<?php echo set_value('no') ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('no', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="col">
              <p>Instagram</p>
              <div class="input-group">
                <input type="text" id="ig" name="ig" class="form-control border-dark small mb-3" placeholder="Masukkan Instagram" value="<?php echo set_value('ig') ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('ig', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="row col-md-12">
            <div class="col">
              <p>facebook</p>
              <div class="input-group">
                <input type="text" id="facebook" name="facebook" class="form-control border-dark small mb-3" placeholder="Masukkan Facebook" value="<?php echo set_value('facebook') ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('facebook', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="col">
              <p>email</p>
              <div class="input-group">
                <input type="text" id="email" name="email" class="form-control border-dark small mb-3" placeholder="Masukkan Email" value="<?php echo set_value('email') ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="col">
              <p>Foto</p>
              <div class="input-group">
                <input type="file" id="foto" name="foto" class="form-control border-dark small mb-3" value="<?php echo set_value('foto') ?>" aria-describedby="basic-addon2">
              </div>
            </div>
          </div>
          <br />
          <div class="row col-md-12">
            <button type="submit" class="btn btn-info btn-icon-split mr-2">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Kirim Data</span>
            </button>
            <a href="<?= base_url('Agency') ?>" class="btn btn-danger btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-reply"></i>
              </span>
              <span class="text">Kembali</span>
            </a>
          </div>
        </div>
      </div>
      <!-- /.card -->

    </div>

    <!-- /.container-fluid -->

  </form>