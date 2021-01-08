<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Tambah Agent</h1>
  <form action="" method="post" enctype="multipart/form-data">

    <div class="card shadow mb-4">

      <?php foreach ($dataku as $d) { ?>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <p>Nama</p>
              <div class="input-group">
                <input type="text" id="nama" name="nama" class="form-control border-dark small mb-3" placeholder="Masukkan Nama nama Property" value="<?= $d['name'] ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p>Description</p>
              <div class="input-group">
                <textarea type="text" id="desc" name="desc" class="form-control border-dark small mb-3" placeholder="Masukkan Nama desc Property" value="<?php echo set_value('desc') ?>" aria-describedby="basic-addon2"><?= $d['description'] ?></textarea>
              </div>
              <?= form_error('desc', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p>Gambar</p>
              <div class="input-group">
                <input type="file" id="foto" name="foto" class="form-control border-dark small mb-3" value="<?php echo set_value('foto') ?>" aria-describedby="basic-addon2">
              </div>
              <?= form_error('foto', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
        <?php } ?>
        <br />
        <button type="submit" class="btn btn-info btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Kirim Data</span>
        </button>
        <a href="<?= base_url('Pages') ?>" class="btn btn-danger btn-icon-split">
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