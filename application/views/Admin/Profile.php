   <!-- Begin Page Content -->
   <div class="container-fluid">
   <div class="col mt-3">
        <?php echo $this->session->flashdata('pesan')?>
    </div>
   <?php foreach($dataku as $d){?>
          <div class="card shadow mb-4">
            <div class="card-body">
            <img src="<?= base_url('uploads/rumah/') . $d['logo_brand']; ?>" alt="" style="width:140px">
              <!--<p>Visi</p>-->
              <!--  <div class="input-group">-->
              <!--    <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $d['visi']?></Textarea>-->
              <!--  </div>-->
              <!--<p>Misi</p>-->
              <!--  <div class="input-group">-->
              <!--    <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $d['misi']?></Textarea>-->
              <!--  </div>-->
              <p>Deskripsi</p>
                <div class="input-group">
                  <Textarea type="text" class="form-control bg-gray-200 border-0 small mb-3" placeholder="" aria-describedby="basic-addon2" disabled><?= $d['deskripsi']?></Textarea>
                </div>
              <a href="<?php echo site_url('Profile/edit/' .$d['id_profile']) ?>"
                class="btn btn-sm btn-primary btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Ubah Data</span>
              </a>    
            </div>
          </div>
   <?php } ?>
          <!-- /.card -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->