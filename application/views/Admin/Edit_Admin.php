<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Edit Data</h1>

 <form action="" method="post" enctype="multipart/form-data">
<?php foreach($dataku as $d){ ?>
<div class="card shadow mb-4">
  <div class="card-body">
          <div class="row">
              <div class="col">
                <p>Nama Pengguna</p>
                  <div class="input-group">
                    <input type="text"
                    id="nama"
                    name="nama"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama"
                           value="<?= $d['nama_pengguna']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('nama', '<small class="text-danger">', '</small>')?> 
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
                           placeholder="Masukkan Misi"
                           value="<?= $d['email']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('misi', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
            <div class="col">
                <p>Alamat</p>
                    <div class="input-group">
                        <input type="text"
                        id="alamat"
                        name="alamat"
                                class="form-control border-dark small mb-3"
                                placeholder="Masukkan Deskripsi"
                                value="<?= $d['alamat']?>"
                                aria-describedby="basic-addon2">
                        </div>
                        <?= form_error('alamat', '<small class="text-danger">', '</small>')?> 
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <p>Nomor Telepon</p>
                    <div class="input-group">
                        <input type="text"
                        id="no_telp"
                        name="no_telp"
                                class="form-control border-dark small mb-3"
                                placeholder="Masukkan Nomor Telepon"
                                value="<?= $d['no_telp']?>"
                                aria-describedby="basic-addon2">
                        </div>
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>')?> 
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <p>Password</p>
                    <div class="input-group">
                        <input type="text"
                        id="password"
                        name="password"
                                class="form-control border-dark small mb-3"
                                placeholder="Masukkan Password"
                                value=""
                                aria-describedby="basic-addon2">
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>')?> 
            </div>
        </div> 
<?php } ?>
              <br />
              <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Ubah Data</span>
              </button>
              <a href="<?= base_url('Profile') ?>" class="btn btn-danger btn-icon-split">
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