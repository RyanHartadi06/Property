   <!-- Begin Page Content -->
   <div class="container-fluid">
   <div class="col mt-3">
        <?php echo $this->session->flashdata('pesan')?>
    </div>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p>Nama</p>
                <div class="input-group">
                  <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $Pengguna['nama_pengguna'];?></Textarea>
                </div>
              <p>Email</p>
                <div class="input-group">
                  <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $Pengguna['email']?></Textarea>
                </div>
              <p>Alamat</p>
                <div class="input-group">
                  <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $Pengguna['alamat']?></Textarea>
                </div>
              <p>Nomor Telepon</p>
                <div class="input-group">
                  <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $Pengguna['no_telp']?></Textarea>
                </div>
              <a href="<?php echo site_url('Admin/edit/' .$Pengguna['id_pengguna']) ?>"
                class="btn btn-sm btn-primary btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Ubah Data</span>
              </a>    
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->