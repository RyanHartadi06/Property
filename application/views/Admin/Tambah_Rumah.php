<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Tambah Rumah</h1>
  <form action="" method="post" enctype="multipart/form-data">

    <div class="card shadow mb-4">
      <div class="card-body">

        <div class="row">
          <div class="col">
            <p>Nama Rumah</p>
            <div class="input-group">
              <input type="text" id="nama_pemilik_rumah" name="nama_pemilik_rumah" class="form-control border-dark small mb-3" value="<?php echo set_value('nama_pemilik_rumah') ?>" aria-describedby="basic-addon2">
              <input type="text" id="id_rumah" name="id_rumah" class="form-control border-dark small mb-3" value="<?= $kode ?>" hidden aria-describedby="basic-addon2">
            </div>
            <?= form_error('id_rumah', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Alamat Lengkap</p>
            <div class="input-group">
              <input type="text" id="alamat_lengkap" name="alamat_lengkap" class="form-control border-dark small mb-3" value="<?php echo set_value('alamat_lengkap') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('alamat_lengkap', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>



        <div class="row">
          <div class="col">
            <p>Jumlah Kamar</p>
            <div class="input-group">
              <input type="number" id="jumlah_kamar" name="jumlah_kamar" class="form-control border-dark small mb-3" value="<?php echo set_value('jumlah_kamar') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('jumlah_kamar', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Jumlah Kamar Mandi</p>
            <div class="input-group">
              <input type="text" id="kamar_mandi" name="kamar_mandi" class="form-control border-dark small mb-3" value="<?php echo set_value('kamar_mandi') ?>" aria-describedby="basic-addon2"></input>
            </div>
            <?= form_error('kamar_mandi', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Luas Tanah</p>
            <div class="input-group">
              <input type="text" id="luas_tanah" name="luas_tanah" class="form-control border-dark small mb-3" value="<?php echo set_value('luas_tanah') ?>" aria-describedby="basic-addon2"></input>
            </div>
            <?= form_error('luas_tanah', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Luas Bangunan</p>
            <div class="input-group">
              <input type="text" id="luas_bangunan" name="luas_bangunan" class="form-control border-dark small mb-3" value="<?php echo set_value('luas_bangunan') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('luas_bangunan', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Harga</p>
            <div class="input-group">
              <input type="text" id="harga" name="harga" class="form-control border-dark small mb-3" value="<?php echo set_value('harga') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Nomor Telpon Pemilik</p>
            <div class="input-group">
              <input type="text" id="no_telp" name="no_telp" class="form-control border-dark small mb-3" value="<?php echo set_value('no_telp') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('no_telp', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Sertifikat</p>
            <div class="input-group">
              <input type="text" id="sertifikat" name="sertifikat" class="form-control border-dark small mb-3" value="<?php echo set_value('sertifikat') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('sertifikat', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Air</p>
            <div class="input-group">
              <input type="text" id="air" name="air" class="form-control border-dark small mb-3" value="<?php echo set_value('air') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('air', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Listrik</p>
            <div class="input-group">
              <input type="text" id="listrik" name="listrik" class="form-control border-dark small mb-3" value="<?php echo set_value('listrik') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('listrik', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Kondisi</p>
            <div class="input-group">
              <input type="text" id="kondisi" name="kondisi" class="form-control border-dark small mb-3" value="<?php echo set_value('kondisi') ?>" aria-describedby="basic-addon2">
            </div>
            <?= form_error('kondisi', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Status</p>
            <div class="input-group">
              <select class="form-control border-dark small mb-3" id="status_property" name="status_property">
                <option value="1">Dijual</option>
                <option value="2">Sewa</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p>Pilih Kategori</p>
            <div class="input-group">
              <select class="form-control border-dark small mb-3" id="kat" name="kat">
                <?php foreach ($kat as $l) { ?>
                  <option value="<?php echo $l['id']; ?>"><?php echo $l['name']; ?> </option>
                <?php } ?>

              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Pilih Agent</p>
            <div class="input-group">
              <select class="form-control border-dark small mb-3" id="agent" name="agent">
                <?php foreach ($agent as $l) { ?>
                  <option value="<?php echo $l['id_agent']; ?>"><?php echo $l['nama_agent']; ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>Foto</p>
            <div class="input-group">
              <input type="file" id="foto" name="foto" class="form-control border-dark small mb-3" value="<?php echo set_value('foto') ?>" aria-describedby="basic-addon2">
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col">
            <p>Component</p>
            <div class="input-group">
              <input name="files[]" type="file" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" multiple="multiple">
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col">
            <p>Deskripsi Rumah</p>
            <div class="input-group">
              <textarea type="text" id="desc" name="desc" class="form-control border-dark mb-3" aria-describedby="basic-addon2"></textarea>
            </div>
            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
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

<!-- <script>
  var dengan_rupiah = document.getElementById('harga');
  dengan_rupiah.addEventListener('keyup', function(e) {
    dengan_rupiah.value = formatRupiah(this.value);
    // console.log(dengan_rupiah.value);
  });

  /* Fungsi */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      console.log(ribuan);
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? +rupiah : '');
  }
</script> -->