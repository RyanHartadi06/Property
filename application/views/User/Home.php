<!-- End Navigation -->

<style></style>
<div class="clearfix"></div>

<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel" style=" margin-top: -75px;position: relative;;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 " src="<?= base_url() ?>global/img/bg/bg1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>global/img/bg/bg2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>global/img/bg/bg3.png" alt="Third slide">
    </div>
  </div>
  <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="z-index: 3;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="z-index: 3;">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
<div class=" mx-auto cari" style="z-index: 3;">
  <span class="text-center text1 mb-0">Temukan Rumah Impian anda</b></span>
  <span class="mb-4 text2 text-mlixer text-white">Di sini anda dapat menemukan banyak Apartment, Kos, Rumah, dll untuk Disewa atau pun Dijual yang dapat memenuhi impian anda
  </span>
  <div class="row justify-content-center">
    <div class="col-lg-9 col-md-10">
      <div class="full_search_box nexio_search lightanic_search hero_search-radius style-2">
        <div class="search_hero_wrapping">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 small-padd">
              <div class="form-group">
                <select class="form-control b-0 b-r" id="category" name="category">
                  <option value="1">Jual</option>
                  <option value="2">Sewa</option>
                </select>
              </div>
            </div>
            <div class="col-lg-8 col-md-5 col-sm-12 small-padd">
              <div class="form-group">
                <input name="search" id="search" type="text" class="form-control b-0" placeholder="Cari berdasarkan lokasi atau nama">
              </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12 small-padd">
              <div class="form-group">
                <button type="submit" onclick="handleSearch();" class="btn search-btn btn-dark">
                  <span class="text">Cari</span>
                </button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="clearfix"></div>
<section>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="sec-heading center">
          <h2>Cari Keperluan anda</h2>
          <p>Di sini anda dapat menemukan banyak Apartment, Kos, Rumah, dll untuk Disewa atau pun Dijual yang dapat memenuhi impian anda.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($kategori as $k) { ?>
        <div class="col-lg-3 col-md-4">
          <div class="property_location">
            <div class="property_location_thumb">
              <img onclick="handleCategory(<?= $k['id']; ?>)" src="<?= base_url('uploads/kategori/') . $k['image']; ?>" style="height: 175px" class="img-fluid rounded-lg" alt="" />
            </div>
            <div class="property_location_caption">
              <div class="property_location__first">
                <a href="<?= base_url('product') ?>" onclick="handleCategory(<?= $k['id']; ?>)">
                  <h4><?= $k['name'] ?></h4>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>
<div class="clearfix"></div>


<section class="gray-simple min">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="sec-heading center">
          <h2>Terbaru</h2>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt-->
          <!--  ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>-->
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($terbaru as $t) {
        $this->db->where('id_rumah', $t['id_rumah']);
        $foto = $this->db->get('detail_rumah')->result();
        $status = $t['status_property'];
        $id_agent = $t['id_agent'];
        $id_kategori = $t['id_kategori'];

        $s = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agent'")->row_array();
        $sql = $this->db->query("SELECT * FROM kategori WHERE id = '$id_kategori'")->row_array();
        if ($status == 1) {
          $content = '<label class="label label-success mr-2">Jual</label><label class="label label-info">' . $sql['name'] . '</label>';
        } else if ($status == 2) {
          $content = '<label class="label label-success mr-2">Sewa</label><label class="label label-info">' . $sql['name'] . '</label>';
        } ?>
        <div class="col-lg-4 col-md-5 col-sm-10">
          <div class="single_property_style property_style_2 modern">

            <div class="listing_thumb_wrapper">
              <div class="property_gallery_slide-thumb">

                <!-- <a href="<?php echo base_url('product/detail/' . $t['id_rumah']) ?>"><img src="<?php echo base_url('uploads/rumah/' . $t['banner']) ?>" class="img-fluid mx-auto" alt=""></a> -->
                <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php
                    $i = 1;
                    foreach ($foto as $a) {
                    ?>
                      <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i++ ?>"></li>
                    <?php } ?>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <a href="<?php echo base_url('product/detail/' . $t['id_rumah']) ?>"> <img class="d-block img-fluid " src="<?= base_url('uploads/rumah/' . $t['banner']) ?>" alt="First slide"></a>
                    </div>
                    <?php
                    foreach ($foto as $a) {
                    ?>
                      <div class="carousel-item">
                        <img class="d-block img-fluid " src="<?= base_url('uploads/rumah/' . $a->gambar) ?>" alt="Second slide">
                      </div>
                    <?php } ?>
                  </div>

                </div>
              </div>
            </div>

            <div class="property_caption_wrappers pb-0 justify-content-center">
              <div class="property_short_detail">
                <div class="pr_type_status">
                  <?= $content ?>
                  <h4 class="pr-property_title mb-1"><a href="<?php echo base_url('product/detail/' . $t['id_rumah']) ?>"><?= $t['nama_pemilik_rumah'] ?></a></h4>
                  <div class="listing-location-name"><i class="fas fa-map-marker-alt"></i> <?= $t['alamat_lengkap'] ?></div>
                </div>
                <div class="property-real-price cl-blue">Rp <?php echo number_format($t['harga'], 0, ',', '.'); ?></div>
              </div>
            </div>

            <div class="modern_property_footer">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr colspan="1">
                      <td><img src="<?= base_url(); ?>global/logo/Luas_Bangunan.svg" style="height: 23px !important;" />&nbsp;&nbsp;LB <?= $t['luas_bangunan']; ?> M<sup>2</sup></td>
                      <td><img src="<?= base_url(); ?>global/logo/Kamar_tidur.svg" style="height: 23px !important;" />&nbsp;&nbsp;<?= $t['jumlah_kamar']; ?> Kamar Tidur</td>
                    </tr>
                    <tr>
                      <td><img src="<?= base_url(); ?>global/logo/Luas_tanah.svg" style="height: 23px !important;" />&nbsp;&nbsp;LT <?= $t['luas_bangunan']; ?> M<sup>2</sup></td>
                      <td><img src="<?= base_url(); ?>global/logo/kamar_mandi.svg" style="height: 23px !important;" />&nbsp;&nbsp;<?= $t['kamar_mandi']; ?> Kamar Mandi</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--<div class="property-lists flex-1">-->
              <!--	<ul>-->
              <!--		<li class="mb-1"><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bed.svg" alt=""></span>LB <?= $t['luas_bangunan']; ?> M<sup>2</sup></li>-->
              <!--		<li class="mb-1"><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bath.svg" alt=""></span><?= $t['jumlah_kamar']; ?> Kamar Tidur</li>-->
              <!--		<li class="mr-4 resize"><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bed.svg" alt=""></span>LT <?= $t['luas_tanah']; ?> M<sup>2</sup></li>-->
              <!--		<li><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bath.svg" alt=""></span><?= $t['kamar_mandi']; ?> Kamar Mandi</li>-->
              <!--	</ul>-->
              <!--</div>-->
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- Single Places -->

    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-3">
        <a class="btn btn-theme bg-1" href="<? base_url(); ?>product">Selengkapnya</a>
      </div>
    </div>

  </div>
</section>
<div class="clearfix"></div>

<section class="">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="sec-heading center">
          <h2>Artikel</h2>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt-->
          <!--  ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>-->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="owl-carousel owl-theme">
        <?php
        foreach ($page as $p) {
        ?>
          <div class="item">
            <div class="card bg-dark text-white">
              <img src="<?= base_url('global/img/bg/blog.png') ?>" class="card-img" alt="...">
              <div class="card-img-overlay">
                <p style="text-align: end; color:black;"><b><?= $p['tgl_input'] ?></b></p>
                <a data-toggle="modal" data-target="#artikel<?= $p['id'] ?>" href="">
                  <h5 class="card-title" style="margin-top: 110px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis; color:black;"><?= $p['name'] ?></h5>
                </a>
                <p class="card-text" style="color:white;"><?= (str_word_count($p['description']) > 60 ? substr($p['description'], 0, 200) . "[..]" : $p['description'])  ?>.</p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

  </div>
</section>

<section class="gray-simple min">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="sec-heading center">
          <h2>Populer</h2>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt-->
          <!--  ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>-->
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($populer as $p) {
        $this->db->where('id_rumah', $p['id_rumah']);
        $foto = $this->db->get('detail_rumah')->result();
        $statuss = $p['status_property'];
        $id_agents = $p['id_agent'];
        $id_kategoris = $p['id_kategori'];
        $ss = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agents'")->row_array();
        $sqls = $this->db->query("SELECT * FROM kategori WHERE id = '$id_kategoris'")->row_array();
        if ($statuss == 1) {
          $contents = '<label class="label label-success mr-2">Jual</label><label class="label label-info">' . $sqls['name'] . '</label>';
        } else if ($statuss == 2) {
          $contents = '<label class="label label-success mr-2">Sewa</label><label class="label label-info">' . $sqls['name'] . '</label>';
        } ?>
        <div class="col-lg-4 col-md-5 col-sm-10">
          <div class="single_property_style property_style_2 modern">

            <div class="listing_thumb_wrapper">
              <div class="property_gallery_slide-thumb">
                <!-- <a href="<?php echo base_url('product/detail/' . $p['id_rumah']) ?>"><img src="<?php echo base_url('uploads/rumah/' . $p['banner']) ?>" class="img-fluid mx-auto" alt="">
                </a> -->
                <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php
                    $i = 1;
                    foreach ($foto as $a) {
                    ?>
                      <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i++ ?>"></li>
                    <?php } ?>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <a href="<?php echo base_url('product/detail/' . $p['id_rumah']) ?>"><img class="d-block w-100 " src="<?= base_url('uploads/rumah/' . $p['banner']) ?>" alt="First slide"></a>
                    </div>
                    <?php
                    foreach ($foto as $a) {
                    ?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('uploads/rumah/' . $a->gambar) ?>" alt="Second slide">
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="property_caption_wrappers pb-0 justify-content-center">
              <div class="property_short_detail">
                <div class="pr_type_status">
                  <?= $content ?>
                  <h4 class="pr-property_title mb-1"><a href="<?php echo base_url('product/detail/' . $p['id_rumah']) ?>"><?= $p['nama_pemilik_rumah'] ?></a></h4>
                  <div class="listing-location-name"><i class="fas fa-map-marker-alt"></i> <?= $p['alamat_lengkap'] ?></div>
                </div>
                <div class="property-real-price cl-blue">Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></div>
              </div>
            </div>

            <div class="modern_property_footer">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr colspan="1">
                      <td><img src="<?= base_url(); ?>global/logo/Luas_Bangunan.svg" style="height: 23px !important;" />&nbsp;&nbsp;LB <?= $t['luas_bangunan']; ?> M<sup>2</sup></td>
                      <td><img src="<?= base_url(); ?>global/logo/Kamar_tidur.svg" style="height: 23px !important;" />&nbsp;&nbsp;<?= $t['jumlah_kamar']; ?> Kamar Tidur</td>
                    </tr>
                    <tr>
                      <td><img src="<?= base_url(); ?>global/logo/Luas_tanah.svg" style="height: 23px !important;" />&nbsp;&nbsp;LT <?= $t['luas_bangunan']; ?> M<sup>2</sup></td>
                      <td><img src="<?= base_url(); ?>global/logo/kamar_mandi.svg" style="height: 23px !important;" />&nbsp;&nbsp;<?= $t['kamar_mandi']; ?> Kamar Mandi</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--<div class="property-lists flex-1">-->
              <!--	<ul>-->
              <!--		<li class="mb-1"><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bed.svg" alt=""></span>LB <?= $t['luas_bangunan']; ?> M<sup>2</sup></li>-->
              <!--		<li class="mb-1"><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bath.svg" alt=""></span><?= $t['jumlah_kamar']; ?> Kamar Tidur</li>-->
              <!--		<li class="mr-4 resize"><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bed.svg" alt=""></span>LT <?= $t['luas_tanah']; ?> M<sup>2</sup></li>-->
              <!--		<li><span class="flatcons"><img src="https://kumarpreet.com/verio-demo/assets/img/bath.svg" alt=""></span><?= $t['kamar_mandi']; ?> Kamar Mandi</li>-->
              <!--	</ul>-->
              <!--</div>-->
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- Single Property -->

    </div>

  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-3">
      <a class="btn btn-theme bg-1" href="<? base_url(); ?>product">Selengkapnya</a>
    </div>
  </div>

  </div>
</section>
<div class="clearfix"></div>


<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fas fa-angle-up"></i></a>

<!-- Modal -->
<?php
foreach ($page as $p) {
?>
  <div class="modal fade" id="artikel<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered   modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Baca Artikel</h5>
          <p style="font-size: 12;">Ditulis : <?= $p['tgl_input'] ?></p>
        </div>
        <div class="modal-body">
          <h2><?= $p['name'] ?></h2>
          <?= $p['description'] ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<script>
  function handleHome(page) {
    localStorage.setItem("kategori", page);
    window.location.href = "<?= base_url(); ?>product";
  }

  function handleCategory(page) {
    localStorage.setItem("tipe_properti", page);
    window.location.href = "<?= base_url(); ?>product";
  }

  function handleSearch() {
    let keyword = document.getElementById("search").value;
    let option = document.getElementById("category").value;
    localStorage.setItem("keyword", keyword);
    localStorage.setItem("option", option);
    window.location.href = "<?= base_url(); ?>product";
  }
</script>
</div>