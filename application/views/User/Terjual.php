<section class="gray-simple">

    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="d-flex text-center tombolnya">
                    <button type="button" class="mb-3 rounded btn btn-success tombol_filter d-none" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-filter"></i>&nbsp; Filter
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cari Keperluanmu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="modalZero">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tampilZero" aria-expanded="false" aria-controls="tampilZero">
                                                    Cari Lokasi
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="tampilZero" class="collapse" aria-labelledby="modalZero" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <label><input type="text" class="form-control cari_lokasi" placeholder="Cari Lokasi"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="modalOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tampilOne" aria-expanded="false" aria-controls="tampilOne">
                                                    Tipe Properti
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="tampilOne" class="collapse" aria-labelledby="modalOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php
                                                $query = $this->db->query("SELECT * FROM kategori")->result_array();
                                                foreach ($query as $row) :
                                                ?>
                                                    <div class="list-group-item checkbox">
                                                        <label><input type="checkbox" class="common_selector tipe_properti" value="<?= $row['id']; ?>">&nbsp;&nbsp;<?= $row['name']; ?></label>
                                                    </div>
                                                <?php
                                                endforeach;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="modalTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#tampilTwo" aria-expanded="false" aria-controls="tampilTwo">
                                                    Status Properti
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="tampilTwo" class="collapse" aria-labelledby="modalTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector status_properti" value="1">&nbsp;&nbsp;Jual</label>
                                                </div>
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector status_properti" value="2">&nbsp;&nbsp;Sewa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="modalThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#tampilThree" aria-expanded="false" aria-controls="tampilThree">
                                                    Kamar Mandi
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="tampilThree" class="collapse" aria-labelledby="modalThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php for ($i = 0; $i <= 5; $i++) : ?>
                                                    <div class="list-group-item checkbox">
                                                        <label><input type="checkbox" class="common_selector kamar_mandi" value="<?= $i; ?>">&nbsp;&nbsp;<?= $i; ?></label>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="modalFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#tampilFour" aria-expanded="false" aria-controls="tampilFour">
                                                    Kamar
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="tampilFour" class="collapse" aria-labelledby="modalFour" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php for ($i = 0; $i <= 5; $i++) : ?>
                                                    <div class="list-group-item checkbox">
                                                        <label><input type="checkbox" class="common_selector kamar" value="<?= $i; ?>">&nbsp;&nbsp;<?= $i; ?></label>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="card">-->
                                    <!--    <div class="card-header" id="modalFive">-->
                                    <!--        <h2 class="mb-0">-->
                                    <!--            <button class="btn btn-link" type="button" data-toggle="collapse"-->
                                    <!--                data-target="#tampilFive" aria-expanded="false"-->
                                    <!--                aria-controls="tampilFive">-->
                                    <!--                Range Harga-->
                                    <!--            </button>-->
                                    <!--        </h2>-->
                                    <!--    </div>-->

                                    <!--<div id="tampilFive" class="collapse" aria-labelledby="modalFive"-->
                                    <!--    data-parent="#accordionExample">-->
                                    <!--    <div class="card-body">-->
                                    <!--        <p id="price_show">0 - 1000000</p>-->
                                    <!--        <div class="d-flex budget_harga">-->
                                    <!--            <div class="form-group">-->
                                    <!--                <input type="number" class="form-control mr-2" placeholder="0" id="hidden_minimum_price"/>-->
                                    <!--            </div>-->
                                    <!--            <div class="form-group">-->
                                    <!--                <input type="number" class="form-control" placeholder="1000000" id="hidden_maximum_price"/>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--            <div class="form-group">-->
                                    <!--                <button type="submit" onclick="handleBudget();" class="btn btn-info btn-block">Filter Budget</button>-->
                                    <!--            </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group mt-2 filter_button d-none">
                                    <button type="submit" class="btn btn-info btn-block text-capitalize" onclick="handleReset();">Hapus Filter</button>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- property Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="hidden-md-down">

                    <div class="page-sidebar">

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">
                            <h6 class="mb-3">Filter</h6>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingZero">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                                                Cari Lokasi
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <label><input type="text" class="form-control cari_lokasi" placeholder="Cari Lokasi"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Tipe Properti
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php
                                            $query = $this->db->query("SELECT * FROM kategori")->result_array();
                                            foreach ($query as $row) :
                                            ?>
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector tipe_properti" value="<?= $row['id']; ?>">&nbsp;&nbsp;<?= $row['name']; ?></label>
                                                </div>
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Status Properti
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector status_properti" value="1">&nbsp;&nbsp;Jual</label>
                                            </div>
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector status_properti" value="2">&nbsp;&nbsp;Sewa</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Kamar Mandi
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php for ($i = 0; $i <= 5; $i++) : ?>
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector kamar_mandi" value="<?= $i; ?>">&nbsp;&nbsp;<?= $i; ?></label>
                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Kamar
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php for ($i = 0; $i <= 5; $i++) : ?>
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector kamar" value="<?= $i; ?>">&nbsp;&nbsp;<?= $i; ?></label>
                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="card">-->
                                <!--    <div class="card-header" id="headingFive">-->
                                <!--        <h2 class="mb-0">-->
                                <!--            <button class="btn btn-link" type="button" data-toggle="collapse"-->
                                <!--                data-target="#collapseFive" aria-expanded="false"-->
                                <!--                aria-controls="collapseFive">-->
                                <!--                Range Harga-->
                                <!--            </button>-->
                                <!--        </h2>-->
                                <!--    </div>-->

                                <!--    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"-->
                                <!--        data-parent="#accordionExample">-->
                                <!--        <div class="card-body">-->
                                <!--            <p id="price_show">0 - 1000000</p>-->
                                <!--            <div class="d-flex">-->
                                <!--                <div class="form-group">-->
                                <!--                    <input type="text" class="form-control mr-2" placeholder="0" id="hidden_minimum_price"/>-->
                                <!--                </div>-->
                                <!--                <div class="form-group">-->
                                <!--                    <input type="text" class="form-control" placeholder="1000000" id="hidden_maximum_price"/>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--            <div class="form-group">-->
                                <!--                <button type="submit" class="btn btn-info btn-block" onclick="kirim();" name="submit">Filter Budget</button>-->
                                <!--             </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <div class="form-group mt-2 filter_button d-none">
                                <button type="submit" class="btn btn-info btn-block text-capitalize" onclick="handleReset();">Hapus Filter</button>
                            </div>
                        </div>
                        <!-- Sidebar End -->

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">

                <div class="row filter_data">

                </div>
                <div id="pagination_link"></div>
            </div>
</section>
<script>
    function handleReset() {
        localStorage.removeItem("keyword");
        localStorage.removeItem("option");
        localStorage.removeItem("kategori");
        localStorage.removeItem("tipe_properti");
        window.location.href = "<?= base_url(); ?>product/terjual";
    }

    $(document).ready(function() {

        if (screen.width <= 768) {
            $('.tombol_filter').removeClass('d-none');
        }

        filter_data(1);

        var keyword = localStorage.getItem("keyword");
        var status = localStorage.getItem("option");
        var kategori = localStorage.getItem("kategori");
        var tipe_property = localStorage.getItem("tipe_properti");

        if ("keyword" in localStorage) {
            $('.cari_lokasi').val(keyword);
            $('input.status_properti[value="' + status + '"]').prop('checked', true);
            $('.filter_button').removeClass("d-none");
            filter_data(1);
        } else if ("tipe_properti" in localStorage) {
            $('input.tipe_properti[value="' + tipe_property + '"]').prop('checked', true);
            $('.filter_button').removeClass("d-none");
            filter_data(1);
        } else if ("kategori" in localStorage) {
            $('input.tipe_kategori[value="' + kategori + '"]').prop('checked', true);
            $('.filter_button').removeClass("d-none");
            filter_data(1);
        }

        function filter_data(page) {
            $('.filter_data').html('<div id="loading" style="" ></div>');

            var action = 'fetch_data';
            var lokasi = $('.cari_lokasi').val();
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var properti = get_filter('tipe_properti');
            var kasur = get_filter('kamar');
            var kamar_mandi = get_filter('kamar_mandi');
            var kategori = get_filter('tipe_kategori');
            var status_properti = get_filter('status_properti');

            $.ajax({
                url: "<?php echo base_url(); ?>product/fetch_data_terjual/" + page,
                method: "POST",
                dataType: "JSON",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    properti: properti,
                    kasur: kasur,
                    kamar_mandi: kamar_mandi,
                    status_properti: status_properti,
                    kategori: kategori,
                    lokasi: lokasi
                },
                success: function(data) {
                    $('.filter_data').html(data.product_list);
                    $('#pagination_link').html(data.pagination_link);
                }
            })
        }

        function kirim() {
            var min = $('#hidden_minimum_price').val();
            console.log(min);
        }

        $('.cari_lokasi').keydown(function() {
            $('.cari_lokasi').text($(this).val());
            var b = $('.cari_lokasi').val();
            filter_data(1);
        });

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $(document).on('click', '.pagination li a', function(event) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            filter_data(page);
        });

        $('.common_selector').click(function() {
            filter_data(1);
        });

        $('#price_range').slider({
            range: true,
            min: 1000,
            max: 65000,
            values: [1000, 65000],
            step: 500,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data(1);
            }

        });

    });
</script>