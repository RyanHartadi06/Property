<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Tambah Kategori</h1>
 <form action="" method="post" enctype="multipart/form-data">

<div class="card shadow mb-4">
<?php foreach($dataku as $d){?>
  <div class="card-body">
          <div class="row">
              <div class="col">
                <p>Kategori</p>
                  <div class="input-group">
                    <input type="text"
                    id="kategori"
                    name="kategori"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Kategori Property"
                           value="<?= $d['name']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('kategori', '<small class="text-danger">', '</small>')?> 
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
              <a href="<?= base_url('Kategori') ?>" class="btn btn-danger btn-icon-split">
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