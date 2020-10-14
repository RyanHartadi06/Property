<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Tambah Rumah</h1>
 <form action="" method="post" enctype="multipart/form-data">

<div class="card shadow mb-4">
  <div class="card-body">

          <div class="row">
              <div class="col">
                <p>Nama Pemilik Rumah</p>
                  <div class="input-group">
                    <input type="text"
                    id="nama_pemilik_rumah"
                    name="nama_pemilik_rumah"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Nama Pemilik Rumah"
                           value="<?php echo set_value('nama_pemilik_rumah')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('nama_pemilik_rumah', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

          <div class="row">
              <div class="col">
                <p>Alamat Lengkap</p>
                  <div class="input-group">
                    <input type="text"
                    id="alamat_lengkap"
                    name="alamat_lengkap"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Alamat Lengkap"
                           value="<?php echo set_value('alamat_lengkap')?>"
                           aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('alamat_lengkap', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

        

          <div class="row">
            <div class="col">
                <p>Jumlah Kamar</p>
                    <div class="input-group">
                        <input type="number"
                        id="jumlah_kamar"
                        name="jumlah_kamar"
                                class="form-control border-dark small mb-3"
                                value="<?php echo set_value('jumlah_kamar')?>"
                                aria-describedby="basic-addon2">
                        </div>
                        <?= form_error('jumlah_kamar', '<small class="text-danger">', '</small>')?> 
            </div>
        </div> 

        <div class="row">
              <div class="col">
                <p>Luas Tanah</p>
                  <div class="input-group">
                    <textarea type="text"
                    id="luas_tanah"
                    name="luas_tanah"
                           class="form-control border-dark small mb-3"
                           placeholder="Masukkan Luas Tanah "
                           value="<?php echo set_value('luas_tanah')?>"
                           aria-describedby="basic-addon2"></textarea>
                  </div>
                  <?= form_error('luas_tanah', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

          <div class="row">
              <div class="col">
                <p>Luas Bangunan</p>
                  <div class="input-group">
                    <input type="text"
                    id="luas_bangunan"
                    name="luas_bangunan"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Luas Bangunan"
                          value="<?php echo set_value('luas_bangunan')?>"
                          aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('luas_bangunan', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

          <div class="row">
              <div class="col">
                <p>Harga</p>
                  <div class="input-group">
                    <input type="number"
                    id="harga"
                    name="harga"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Harga"
                          value="<?php echo set_value('harga')?>"
                          aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('harga', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>

          <div class="row">
              <div class="col">
                <p>Nomor Telpon Pemilik</p>
                  <div class="input-group">
                    <input type="text"
                    id="no_telp"
                    name="no_telp"
                          class="form-control border-dark small mb-3"
                          placeholder="Masukkan Nomor Telpon Pemilik"
                          value="<?php echo set_value('no_telp')?>"
                          aria-describedby="basic-addon2">
                  </div>
                  <?= form_error('no_telp', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
          <div class="row">
              <div class="col">
                <p>Deskripsi Rumah</p>
                  <div class="input-group">
                  <textarea rows = "5" cols = "100%" name = "deskripsi" id ="deskripsi"></textarea>
                  </div>
                  <?= form_error('deskripsi', '<small class="text-danger">', '</small>')?> 
              </div>
          </div>
            <!-- <div class="row">
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
            </div>  -->
              <br />
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