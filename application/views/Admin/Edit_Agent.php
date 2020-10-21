
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Edit Agency</h1>
 <form action="" method="post" enctype="multipart/form-data">

<div class="card shadow mb-4">
<?php foreach($dataku as $d){?>
  <div class="card-body">
          <div class="row">
              <div class="col">
                <p>Nama Agency</p>
                  <div class="input-group">
                    <input type="text"
                    id="nama"
                    name="nama"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama"
                           value="<?= $d['nama_agent']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('nama', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>Nomor Whatsapps</p>
                  <div class="input-group">
                    <input type="text"
                    id="no"
                    name="no"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nomor Whatsapps"
                           value="<?= $d['no_wa']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('no', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>instagram</p>
                  <div class="input-group">
                    <input type="text"
                    id="ig"
                    name="ig"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Instagram"
                           value="<?= $d['instagram']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('ig', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>Facebook</p>
                  <div class="input-group">
                    <input type="text"
                    id="facebook"
                    name="facebook"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Facebook"
                           value="<?= $d['facebook']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('facebook', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>Email</p>
                  <div class="input-group">
                    <input type="text"
                    id="email"
                    name="email"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Email"
                           value="<?= $d['email']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('email', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
<?php }?>
              <br />
              <button type="submit" class="btn btn-info btn-icon-split">
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
          <!-- /.card -->

        </div>
  
        <!-- /.container-fluid -->

        </form>