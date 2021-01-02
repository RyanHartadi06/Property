<footer class="dark-footer skin-dark-footer style-2">



    <div class="footer-middle">

        <div class="container">

            <div class="row">



                <div class="col-lg-4 col-md-4">

                    <div class="footer_widget">

                        <div class="footlogo"><img src="<?= base_url() ?>global/img/logo-brand1.png" class="img-fluid mb-3" alt="" />

                        </div>

                        <p class="text-justify" style="margin-top: -15px"><?= nl2br("Professional Agent, Excellent Agent Property.
° Real estate agent
° Property Consultant
° Developer
° Contractor
° Selling
° Buy
° Rent
Property in Jember Jawa Timur
 √ Home Contractor°
 √ Home Renovations Services°
 √ Interior & Exterior Design Services°
 √ Building Contractor°"); ?></p>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <div class="footer_widget">

                        <h4 class="widget_title">Kontak Kami</h4>

                        <p>

                            <b>Alamat : Perum Graha Permata Indah Blok AE no 44</b></br>

                            <b>Whatsapp : 082266666488</b></br>

                            <b>Email CEO : ejjaalith@gmail.com</b></br>

                            <b>Email Admin : mhagencyproperty@yahoo.com</b></br>

                            <b>Email Kantor : office@mhagentproperty.com</b>

                        </p>

                    </div>

                </div>



                <div class="col-lg-4 col-md-2">

                    <div class="footer_widget">

                        <h4 class="widget_title">Halaman</h4>

                        <ul class="footer-menu">

                            <?php foreach ($page as $p) { ?>



                                <li><a href="<?= base_url('page/detail/') . $p['id'] ?>"><?= $p['name'] ?></a></li>



                            <?php } ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center">



                <div class="col-lg-12 col-md-12">

                    <p class="mb-0">MyHouse Property Group - © 2020</p>

                </div>



            </div>

        </div>

    </div>

</footer>

<script src="<?= base_url() ?>global/js/jquery.min.js"></script>

<script src="<?= base_url() ?>global/js/popper.min.js"></script>

<script src="<?= base_url() ?>global/js/bootstrap.min.js"></script>

<script src="<?= base_url() ?>global/js/ion.rangeSlider.min.js"></script>

<script src="<?= base_url() ?>global/js/select2.min.js"></script>

<script src="<?= base_url() ?>global/js/jquery.magnific-popup.min.js"></script>

<script src="<?= base_url() ?>global/js/slick.js"></script>

<script src="<?= base_url() ?>global/js/slider-bg.js"></script>

<script src="<?= base_url() ?>global/js/lightbox.js"></script>

<script src="<?= base_url() ?>global/js/imagesloaded.js"></script>

<script src="<?= base_url() ?>global/js/daterangepicker.js"></script>

<script src="<?= base_url() ?>global/js/custom.js"></script>
<script src="<?= base_url() ?>global/js/loader.js"></script>

<script src="https://swiperjs.com/package/swiper-bundle.min.js"></script>

<script>
    if ($(window).width() < 768) {

        $('.header-transparent').addClass('header-fixed');

    } else {

        $('.header-transparent').removeClass('header-fixed');

    }
</script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->

<script>
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        margin: 10,
        autoplayHoverPause: true,
        items: 3,
        nav: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 3
            }
        }
    });
</script>


</body>



</html>