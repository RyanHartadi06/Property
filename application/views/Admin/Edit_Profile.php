<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Edit Data</h1>

 <form action="" method="post" enctype="multipart/form-data">
<?php foreach($dataku as $d){ ?>
<div class="card shadow mb-4">
  <div class="card-body">
          <div class="row">
              <div class="col">
                <p>Visi</p>
                  <div class="input-group">
                    <input type="text"
                    id="visi"
                    name="visi"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Visi"
                           value="<?= $d['visi']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('visi', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

          <div class="row">
              <div class="col">
                <p>Misi</p>
                  <div class="input-group">
                    <input type="text"
                    id="misi"
                    name="misi"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Misi"
                           value="<?= $d['misi']?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('misi', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

        

          <div class="row">
            <div class="col">
                <p>Deskripsi</p>
                    <div class="input-group">
                        <input type="text"
                        id="deskripsi"
                        name="deskripsi"
                                class="form-control border-dark small mb-3"
                                placeholder="Masukkan Deskripsi"
                                value="<?= $d['deskripsi']?>"
                                aria-describedby="basic-addon2">
                        </div>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>')?> 
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <p>Logo</p>
                <div class="input-group">
                    <input type="file"
                    id="logo"
                    name="logo"
                        class="form-control border-dark small mb-3"
                        value="<?php echo set_value('logo')?>"
                        aria-describedby="basic-addon2">
                </div>
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