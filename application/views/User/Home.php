<!-- End Navigation -->
<div class="clearfix"></div>

<div class="image-cover hero_banner half_banner" style="background:url(<?= base_url() ?>global/img/jpeg/banner.png) no-repeat;" data-overlay="1">
  <div class="container my-4">

    <h2 class="text-center mb-0">Find Your Perfect Home</h2>
    <div class="mb-4 text-mlixer text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
      eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
    </div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center">
      <div class="col-lg-9 col-md-10">
        <div class="full_search_box nexio_search lightanic_search hero_search-radius style-2">
          <div class="search_hero_wrapping">
            <div class="row">
              <div class="col-lg-2 col-md-4 col-sm-4 small-padd">
                <div class="form-group">
                  <select class="form-control b-0 b-r" id="category" name="category">
                    <option value="1">Dijual</option>
                    <option value="2">Disewakan</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-8 col-md-5 col-sm-12 small-padd">
                <div class="form-group">
                  <input name="search" id="search"type="text" class="form-control b-0" placeholder="Masukkan Kata Kunci">
                </div>
              </div>
              
              <div class="col-lg-2 col-md-3 col-sm-12 small-padd">
                <div class="form-group">
                <button type="submit" class="btn search-btn btn-dark">
                 <span class="text">Cari</span>
                </button>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="clearfix"></div>
<section>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="sec-heading center">
          <h2>Cari Keperluan anda</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($kategori as $k) { ?>
        <div class="col-lg-3 col-md-4">
          <div class="property_location">
            <div class="property_location_thumb">
              <a href="<?php echo base_url("Home/kategori/" . $k['id']); ?>"><img src="<?= base_url('uploads/kategori/') . $k['image']; ?>" class="img-fluid rounded-lg" alt="" /></a>
            </div>
            <div class="property_location_caption">
              <div class="property_location__first">
                <h4><?= $k['name'] ?></h4>
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
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($terbaru as $t) { ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="list-slide-box">
            <div class="modern-list">
              <div class="grid-category-thumb">
                <a href="#" class="overlay-cate"><img src="<?= base_url('uploads/rumah/') . $t['banner']; ?>" class="img-responsive" alt=""></a>
                <div class="property_meta simple">
                  <?php if ($t['status_property'] == 1) { ?>
                    <a href="#" class="cate-trix theme-cl">Dijual</a>
                  <?php } else { ?>
                    <a href="#" class="cate-trix theme-cl">Sewa</a>
                  <?php } ?>

                </div>
              </div>
              <div class="modern-list-content">
                <div class="listing-content-wrap smalls text-center">
                  <h4 class="lst-title"><a href="#"><?= $t['nama_pemilik_rumah'] ?></a>
                  </h4>
                  <p><?= $t['alamat_lengkap'] ?></p>
                  <p class="btn btn-sm rounded-custom py-2 px-2 mt-2"><?= $t['harga'] ?></p>
                </div>
                <div class="listing-footer-wrap property-lists mt-2 d-flex justify-content-center">
                  <div class="property-lists d-flex justify-content-center">
                    <ul>
                      <li><span class="flatcons"><img src="<?= base_url() ?>global/img/color-bed.svg" alt=""></span><?= $t['jumlah_kamar'] ?> Bed</li>
                      <li><span class="flatcons"><img src="<?= base_url() ?>global/img/color-bathroom.svg" alt=""></span><?= $t['kamar_mandi'] ?> Bath</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- Single Places -->

    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-3">
        <a href="#" class="btn btn-theme bg-1">Selengkapnya</a>
      </div>
    </div>

  </div>
</section>
<div class="clearfix"></div>
<section>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="sec-heading center">
          <h2>Populer</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($populer as $p) { ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="list-slide-box">
            <div class="modern-list">
              <div class="grid-category-thumb">
                <a href="#" class="overlay-cate"><img src="<?= base_url('uploads/rumah/') . $p['banner']; ?>" class="img-responsive" alt=""></a>
                <div class="property_meta simple">
                  <?php if ($p['status_property'] == 1) { ?>
                    <a href="#" class="cate-trix theme-cl">Dijual</a>
                  <?php } else { ?>
                    <a href="#" class="cate-trix theme-cl">Sewa</a>
                  <?php } ?>
                </div>
              </div>
              <div class="modern-list-content">
                <div class="listing-content-wrap smalls text-center">
                  <h4 class="lst-title"><a href="#"><?= $p['nama_pemilik_rumah'] ?></a>
                  </h4>
                  <p><?= $p['alamat_lengkap'] ?></p>
                  <p class="btn btn-sm rounded-custom py-2 px-2 mt-2"><?= $p['harga'] ?></p>
                </div>
                <div class="listing-footer-wrap property-lists mt-2 d-flex justify-content-center">
                  <div class="property-lists d-flex justify-content-center">
                    <ul>
                      <li><span class="flatcons"><img src="<?= base_url() ?>global/img/color-bed.svg" alt=""></span><?= $p['jumlah_kamar'] ?> Bed</li>
                      <li><span class="flatcons"><img src="<?= base_url() ?>global/img/color-bathroom.svg" alt=""></span><?= $p['kamar_mandi'] ?> Bath</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- Single Property -->

    </div>

  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-3">
      <a href="#" class="btn btn-theme bg-1">Selengkapnya</a>
    </div>
  </div>

  </div>
</section>
<div class="clearfix"></div>


<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fas fa-angle-up"></i></a>


</div>