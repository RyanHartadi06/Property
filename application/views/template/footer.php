  <!-- Footer -->

  <footer class="sticky-footer bg-white">

    <div class="container my-auto">

      <div class="copyright text-center my-auto">

        <span>Copyright &copy; MyHouse Agency Property</span>

      </div>

    </div>

  </footer>

  <!-- End of Footer -->



  </div>

  <!-- End of Content Wrapper -->



  </div>

  <!-- End of Page Wrapper -->



  <!-- Scroll to Top Button-->

  <a class="scroll-to-top rounded" href="#page-top">

    <i class="fas fa-angle-up"></i>

  </a>



  <!-- Logout Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">×</span>

          </button>

        </div>

        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

        <div class="modal-footer">

          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <a class="btn btn-primary" href="<?= base_url("auth/logout") ?>">Logout</a>

        </div>

      </div>

    </div>

  </div>



  <!-- Bootstrap core JavaScript-->

  <script src="<?= base_url("assets/vendor/jquery/jquery.min.js") ?>"></script>

  <script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->



  <script>
    $(document).ready(function() {

      $('#desc').summernote({

        width: 1400,

        height: 200 //don't use px

      });

      $('#visi').summernote({

        width: 1400,

        height: 200 //don't use px

      });

      $('#misi').summernote({

        width: 1400,

        height: 200

      });

      $('#deskripsiText').summernote('disable', {

        width: 1400,

        height: 200

      });



    });
  </script>

  <!-- Core plugin JavaScript-->

  <script src="<?= base_url("assets/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>



  <!-- Custom scripts for all pages-->

  <script src="<?= base_url("assets/js/sb-admin-2.min.js") ?>"></script>



  <script>
    $('.custom-file-input').on('change', function() {

      let fileName = $(this).val().split('\\').pop();

      $(this).next('.custom-file-label').addClass("selected").html(fileName);

    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

  <!-- Page level plugins -->

  <script src="<?= base_url("assets/vendor/chart.js/Chart.min.js") ?>"></script>

  <script src="<?= base_url("assets/vendor/datatables/jquery.dataTables.min.js") ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script src="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.min.js") ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.but').trigger('click');
    });

    $(document).ready(function() {
       $('.js-example-basic-single').select2();
    });
  </script>


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->



  <!-- Page level custom scripts -->

  <script src="<?= base_url("assets/js/demo/datatables-demo.js") ?>"></script>

  <script src="<?= base_url("assets/js/demo/chart-area-demo.js") ?>"></script>

  <script src="<?= base_url("assets/js/demo/chart-pie-demo.js") ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/summernote/summernote-bs4.js';?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#desc').summernote({
      height: "300px",
      callbacks: {
        onImageUpload: function(image) {
          uploadImage(image[0]);
        },
        onMediaDelete: function(target) {
          deleteImage(target[0].src);
        }
      }
    });

    function uploadImage(image) {
      var data = new FormData();
      data.append("image", image);
      $.ajax({
        url: "<?php echo site_url('Pages/upload_image') ?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
          $('#desc').summernote("insertImage", url);
        },
        error: function(data) {
          console.log(data);
        }
      });
    }

    function deleteImage(src) {
      $.ajax({
        data: {
          src: src
        },
        type: "POST",
        url: "<?php echo site_url('Pages/delete_image') ?>",
        cache: false,
        success: function(response) {
          console.log(response);
        }
      });
    }

  });
</script>

  <script>
    loadrumah();

    function loadrumah() {

      $.ajax({

        url: "<?php echo base_url() . "Data_Rumah/data_awal" ?>",

        dataType: "json",

        success: function(data) {

          var baris = '';
          var no = 1;

          var status = ['', '<div class="badge badge-primary badge-pill">Tersedia</div>', '<div class="badge badge-warning badge-pill">Sold Out</div>'];

          for (var i = 0; i < data.length; i++) {

            baris += '<tr>' +

              '<td>' + (no + i) + '</td>' +

              '<td>' + data[i].nama_pemilik_rumah + '</td>' +

              '<td>' + data[i].alamat_lengkap + '</td>' +

              '<td>' + data[i].harga + '</td>' +

              '<td>' + status[data[i].status] + '<a href="" style="font-size:12px;" data-toggle="modal" data-target="#editData' + data[i].id_rumah + '"> <i><u>ubah</u></i></a></td>' +

              '<td><a href="Data_Rumah/add_image/' + data[i].id_rumah + '" class="btn btn-sm btn-success btn-circle"><i class="fas fa-folder"></i></a><a href="Data_Rumah/detail_rumah/' + data[i].id_rumah + '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-plus"></i></a><a href="Data_Rumah/edit/' + data[i].id_rumah + '"  class="btn btn-sm btn-info btn-circle"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal(' + "'Data_Rumah/hapus/" + data[i].id_rumah + "'" + ')" href=""  data-toggle="modal" data-target="#hapusModal"class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'

            '</tr>';

          }

          $('#target').html(baris);



          $('#dataTable').dataTable().fnDestroy();

          $('#target').html(baris);

          $("#dataTable").dataTable({

            "paging": true,

            "searching": true

          });

        }

      })

    }

    $(document).ready(function() {

      $("#dataStatus").change(function() {

        let dataStatus = $(this).val();

        let datakategori = $('#datakategori').val();

        if (dataStatus == "3") {

          loadrumah();

        } else {

          data_hasil(dataStatus);

        }

      });

    });

    $(document).ready(function() {

      $("#datakategori").change(function() {

        let datakategori = $(this).val();

        // console.log(datakategori);

        if (datakategori == '99') {

          loadrumah();

        } else {

          kategori(datakategori)

        }

      });

    });

    function data_hasil(dataStatus) {

      $.ajax({

        url: "<?php echo base_url() . "Data_Rumah/filter" ?>",

        data: "dataStatus=" + dataStatus,

        dataType: "json",

        success: function(dataStatus) {

          var baris = '';
          var no = 1;

          var status = ['', '<div class="badge badge-primary badge-pill">Tersedia</div>', '<div class="badge badge-warning badge-pill">Sold Out</div>'];

          for (var i = 0; i < dataStatus.length; i++) {

            baris += '<tr>' +

              '<td>' + (no + i)+ '</td>' +

              '<td>' + dataStatus[i].nama_pemilik_rumah + '</td>' +

              '<td>' + dataStatus[i].alamat_lengkap + '</td>' +

              '<td>' + dataStatus[i].harga + '</td>' +

              '<td>' + status[dataStatus[i].status] + '<a href="" style="font-size:12px;" data-toggle="modal" data-target="#editData' + dataStatus[i].id_rumah + '"> <i><u>ubah</u></i></a></td>' +

              '<td><a href="Data_Rumah/add_image/' + dataStatus[i].id_rumah + '" class="btn btn-sm btn-success btn-circle"><i class="fas fa-folder"></i></a><a href="Data_Rumah/detail_rumah/' + dataStatus[i].id_rumah + '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-plus"></i></a><a href="Data_Rumah/edit/' + dataStatus[i].id_rumah + '"  class="btn btn-sm btn-info btn-circle"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal(' + "'Data_Rumah/hapus/" + dataStatus[i].id_rumah + "'" + ')" href=""  data-toggle="modal" data-target="#hapusModal"class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'



            '</tr>'

          }

          $('#target').html(baris);



          $('#dataTable').dataTable().fnDestroy();

          $('#target').html(baris);

          $("#dataTable").dataTable({

            "paging": true,

            "searching": true

          });

        }

      });

    }

    function kategori(datakategori) {

      $.ajax({

        url: "<?php echo base_url() . "Data_Rumah/filterkat" ?>",

        data: "datakategori=" + datakategori,

        dataType: "json",

        success: function(datakategori) {

          var baris = '';
          var no = 1;

          var status = ['', '<div class="badge badge-primary badge-pill">Tersedia</div>', '<div class="badge badge-warning badge-pill">Sold Out</div>'];

          for (var i = 0; i < datakategori.length; i++) {

            baris += '<tr>' +

              '<td>' + (no + i) + '</td>' +

              '<td>' + datakategori[i].nama_pemilik_rumah + '</td>' +

              '<td>' + datakategori[i].alamat_lengkap + '</td>' +

              '<td>' + datakategori[i].harga + '</td>' +

              '<td>' + status[datakategori[i].status] + '<a href="" style="font-size:12px;" data-toggle="modal" data-target="#editData' + datakategori[i].id_rumah + '"> <i><u>ubah</u></i></a></td>' +

              '<td><a href="Data_Rumah/add_image/' + datakategori[i].id_rumah + '" class="btn btn-sm btn-success btn-circle"><i class="fas fa-folder"></i></a><a href="Data_Rumah/detail_rumah/' + datakategori[i].id_rumah + '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-plus"></i></a><a href="Data_Rumah/edit/' + datakategori[i].id_rumah + '"  class="btn btn-sm btn-info btn-circle"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal(' + "'Data_Rumah/hapus/" + datakategori[i].id_rumah + "'" + ')" href=""  data-toggle="modal" data-target="#hapusModal"class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'



            '</tr>'

          }

          $('#target').html(baris);



          $('#dataTable').dataTable().fnDestroy();

          $('#target').html(baris);

          $("#dataTable").dataTable({

            "paging": true,

            "searching": true

          });

        }

      });

    }

    /* Dengan Rupiah */



    //====================================================================================//

    //ini grafik

    // Set new default font family and font color to mimic Bootstrap's default styling

    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';

    Chart.defaults.global.defaultFontColor = '#858796';



    function number_format(number, decimals, dec_point, thousands_sep) {

      // *     example: number_format(1234.56, 2, ',', ' ');

      // *     return: '1 234,56'

      number = (number + '').replace(',', '').replace(' ', '');

      var n = !isFinite(+number) ? 0 : +number,

        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),

        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,

        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,

        s = '',

        toFixedFix = function(n, prec) {

          var k = Math.pow(10, prec);

          return '' + Math.round(n * k) / k;

        };

      // Fix for IE parseFloat(0.55).toFixed(0) = 0;

      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

      if (s[0].length > 3) {

        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

      }

      if ((s[1] || '').length < prec) {

        s[1] = s[1] || '';

        s[1] += new Array(prec - s[1].length + 1).join('0');

      }

      return s.join(dec);

    }


    // Area Chart Example
  </script>

  </body>