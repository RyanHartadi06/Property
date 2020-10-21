  <!-- Begin Page Content -->
        <div class="container-fluid">

            <form method="post" enctype="multipart/form-data">
           
           
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Produk</h1>
             
                <div class="card shadow mb-4">
                
                    <div class="card-body">
                    <?php foreach ($data as $d) {?>
                    <p>Nama Pemilik Rumah</p>
                    <div class="input-group">
                        <input name="nama"
                            id="nama"
                            type="text"
                            class="form-control border-dark small mb-3"
                            placeholder="Masukkan Nama Instansi"
                            aria-describedby="basic-addon2"
                            value="<?php echo $d['nama_pemilik_rumah'] ?>"
                            disabled>
                    <input name="id_rumah"
                       id="id_rumah"
                       value="<?php echo $d['id_rumah'] ?>"
                       type="hidden"
                       >
                    </div>
         
                    <?php } ?>
                    <p>Gambar</p>
                    <div class="input-group">
                        <input name="files[]"
                            type="file"
                            class="form-control border-dark small mb-3"
                            aria-describedby="basic-addon2" multiple>
                    </div>
                      <input type='submit' value='Upload' name='upload' />
                    <a href="<?php echo site_url('Data_Rumah') ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-reply"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>

                    </div>
                </div>
                <!-- /.card -->

           

            <h1 class="h3 mb-2 text-gray-800">Gambar Bangunan</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Album</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php 
                            $no = 1;
                            foreach($rumah as $d){?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><img src="<?= base_url('uploads/rumah/') . $d['gambar']; ?>" alt="" style="width:140px"></td>
                                   
                                    <td>
                                    <a href="#"
                                        onclick="confirm_modal('<?php echo '../hapusdetailproduk/' . $d['id_detail_rumah']; ?>')"
                                        class="btn btn-sm btn-danger shadow-sm"
                                        data-toggle="modal" data-target="#hapusModal">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                          <!-- //start -->
              
                <!-- //end  -->
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /.container-fluid -->

      </div>\