
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Edit Konten</h1>
 <form action="" method="post" enctype="multipart/form-data">

<div class="card shadow mb-4">
<?php foreach($dataku as $d){?>
  <div class="card-body">
          <div class="row">
              <div class="col">
                <p>Title</p>
                  <div class="input-group">
                    <input type="text"
                    id="title"
                    name="title"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama title Property"
                           value="<?= $d['title']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('title', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>Description</p>
                  <div class="input-group">
                    <textarea type="text"
                    id="desc"
                    name="desc"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama desc Property"
                           aria-describedby="basic-addon2"><?= $d['description']?></textarea>
                  </div>
                  <?= form_error('desc', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>Icon</p>
                  <div class="input-group">
                    <input type="text"
                    id="icon"
                    name="icon"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama icon Property"
                           value="<?= $d['icon']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('icon', '<small class="text-danger">', '</small>')?> 
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
              <a href="<?= base_url('Konten') ?>" class="btn btn-danger btn-icon-split">
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