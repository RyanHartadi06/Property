<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Pendaftaran Kedinasan</h1>
 <form action="" method="post" enctype="multipart/form-data">

<div class="card shadow mb-4">
  <div class="card-body">
  <?= $this->session->flashdata('pesan') ?>
          <div class="row">
              <div class="col">
                <p>Nama Pengguna</p>
                  <div class="input-group">
                    <input type="text"
                    id="nama_pengguna"
                    name="nama_pengguna"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Pengguna"
                           value="<?php echo set_value('nama_pengguna')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('nama_pengguna', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

          <div class="row">
              <div class="col mb-3">
                <p>Email</p>
                  <div class="input-group">
                  <input type="text"
                    id="email"
                    name="email"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Email"
                           value="<?php echo set_value('email')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('email', '<small class="text-danger">', '</small>')?>
              </div>
          </div>
          <div class="row">
              <div class="col mb-3">
                <p>Password</p>
                  <div class="input-group">
                  <input type="text"
                    id="password"
                    name="password"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Pengguna"
                           value="<?php echo set_value('password')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('password', '<small class="text-danger">', '</small>')?>
              </div>
          </div>
       
          <div class="row">
              <div class="col mb-3">
                <p>Alamat</p>
                  <div class="input-group">
                  <input type="text"
                    id="alamat"
                    name="alamat"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Pengguna"
                           value="<?php echo set_value('alamat')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('alamat', '<small class="text-danger">', '</small>')?>
              </div>
          </div>
       
          <div class="row">
              <div class="col mb-3">
                <p>Foto</p>
                  <div class="input-group">
                  <input type="file"
                    id="foto"
                    name="foto"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Pengguna"
                           value="<?php echo set_value('foto')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('foto', '<small class="text-danger">', '</small>')?>
              </div>
          </div>
              <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Kirim Data</span>
              </button>
              <a href="<?= base_url('Admin') ?>" class="btn btn-danger btn-icon-split">
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