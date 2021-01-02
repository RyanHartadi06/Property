  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tambah Data Gambar</h1>
      <div class="card shadow mb-4">
          <div class="card-body">
              <div id="divMsg" class="alert alert-success" style="display: none">
                  <span id="msg"></span>
              </div>
              <div class="col mt-3">
        <?php echo $this->session->flashdata('pesan')?>
    </div>
              <form id="upload_form" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleEmail">Gambar</label>
                      <input type="file" class="form-control mb-3" id="image_file" multiple="multiple" />
                      <small style="text-align: italic">ukuran maksimal multiple image <b>5MB</b><br>
                          <b>Ekstensi yang diperbolehkan :</b> <br>
                          <ul>
                              <li>jpeg, jpg, png, gif</li>
                          </ul>
                      </small>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                      <a href="<?= base_url(); ?>Data_Rumah" class="btn btn-danger waves-effect waves-light">Lain Kali</a>
                  </div>
              </form>
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
                      <tbody>
                          <?php 
                    $no = 1;
                    foreach($rumah as $d){?>
                          <tr>
                              <td><?= $no++?></td>
                              <td><img src="<?= base_url('uploads/rumah/') . $d['gambar']; ?>" alt=""
                                      style="width:140px"></td>

                              <td>
                                  <a href="<?php echo base_url("Data_Rumah/hapusdata/" . $d['id_detail_rumah']); ?>"
                                      onclick="confirm_modal('<?php echo '../hapusdata/' . $d['id_detail_rumah']; ?>')"
                                      class="btn btn-sm btn-danger shadow-sm" data-toggle="modal"
                                      data-target="#hapusModal">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  <!-- //start -->
                  <!-- //start -->
                  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                                      untuk menghapus?</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal"
                                  untuk kembali ke Panel Admin.</div>
                              <div class="modal-footer">
                                  <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                                  <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                              </div>
                          </div>
                      </div>

                  </div>
                  <!-- //end  -->
              </div>
          </div>
      </div>
  </div>
  <!-- /.container-fluid -->

  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('#upload_form').on('submit', function (e) {
              e.preventDefault();
              if ($('#image_file').val() == '') {
                  alert("Please Select the File");
              } else {
                $('#divMsg').html('<div class="alert alert-success" role="alert">Sedang Melakukan Proses Upload ......</div>');
                $('#divMsg').show();
                  var form_data = new FormData();
                  var ins = document.getElementById('image_file').files.length;
                  for (var x = 0; x < ins; x++) {
                      form_data.append("files[]", document.getElementById('image_file').files[x]);
                  }
                  $.ajax({
                      url: "<?php echo base_url(); ?>Data_Rumah/unggahGambar/<?= $this->uri->segment(3); ?>",
                      method: "POST",
                      data: form_data,
                      contentType: false,
                      cache: false,
                      processData: false,
                      dataType: "json",
                      success: function (res) {
                          console.log(res.success);
                          if (res.success == true) {
                              $('#image_file').val('');
                              $('#msg').html(res.msg);
                              $('#divMsg').show();
                              
                       	    //   swal("Berhasil", "Gambar Berhasil Ter Upload", "success");
                       	    setTimeout(function(){   
                              window.location.reload(true)
                       	    }, 2000)
                          } else if (res.success == false) {
                              $('#msg').html(res.msg);
                              $('#divMsg').show();
                              
                            //   swal("Gagal", "Gambar Gagal Ter Upload", "success");
                             setTimeout(function(){   
                              window.location.reload(true)
                       	    }, 2000)
                          }
                      },
                  });
              }
          });
      });
  </script>
  <script type="text/javascript">
      function confirm_modal(delete_url) {
          $('#hapusModal').modal('show', {
              backdrop: 'static'
          });
          document.getElementById('delete_link').setAttribute('href', delete_url);
      }
  </script>