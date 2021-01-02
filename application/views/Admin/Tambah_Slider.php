  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tambah Data Slider</h1>
      <div class="card shadow mb-4">
          <div class="card-body">
              <div id="divMsg" class="alert alert-success" style="display: none">
                  <span id="msg"></span>
              </div>
              <form method="POST" action="<?= base_url();?>/Slider/tambahdata" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleEmail">Slider</label>
                      <input type="file" class="form-control mb-3" id="foto" name="foto"/>
                      <!-- <small style="text-align: italic">ukuran maksimal multiple image <b>5MB</b><br>
                          <b>Ekstensi yang diperbolehkan :</b> <br>
                          <ul>
                              <li>jpeg, jpg, png, gif</li>
                          </ul>
                      </small> -->
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                      <a href="<?= base_url(); ?>Slider" class="btn btn-danger waves-effect waves-light">Kembali</a>
                  </div>
              </form>
          </div>
      </div>
      <!-- /.card -->
  </div>
  <!-- /.container-fluid -->

  </div>
  
  <script type="text/javascript">
      function confirm_modal(delete_url) {
          $('#hapusModal').modal('show', {
              backdrop: 'static'
          });
          document.getElementById('delete_link').setAttribute('href', delete_url);
      }
  </script>