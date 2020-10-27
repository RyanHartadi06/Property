<section class="gray-simple">

    <div class="container">

        <div class="row">

            <!-- property Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="hidden-md-down">

                    <div class="page-sidebar">

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Tipe Properti
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php
                                                $query = $this->db->query("SELECT * FROM kategori")->result_array();
                                            foreach($query as $row) :
                                            ?>
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector tipe_properti"
                                                        value="<?= $row['id']; ?>">&nbsp;&nbsp;<?= $row['name'];?></label>
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
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Status Properti
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector status_properti"
                                                        value="1">&nbsp;&nbsp;Jual</label>
                                            </div>
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector status_properti"
                                                        value="2">&nbsp;&nbsp;Sewa</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Kamar Mandi
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php for($i = 0; $i <= 5; $i++): ?>
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector kamar_mandi"
                                                        value="<?= $i; ?>">&nbsp;&nbsp;<?= $i; ?></label>
                                            </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">
                                                Kamar
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php for($i = 0; $i <= 5; $i++): ?>
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector kamar"
                                                        value="<?= $i; ?>">&nbsp;&nbsp;<?= $i; ?></label>
                                            </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseFive" aria-expanded="false"
                                                aria-controls="collapseFive">
                                                Range Harga
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="number" value="1000" class="form-control common_selector minimum_price">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="number" value="5000" class="form-control common_selector maximum_price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    $(document).ready(function () {

        filter_data(1);

        function filter_data(page) {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var properti = get_filter('tipe_properti');
            var kasur = get_filter('kamar');
            var kamar_mandi = get_filter('kamar_mandi');
            var status_properti = get_filter('status_properti');

            console.log(properti);

            $.ajax({
                url: "<?php echo base_url(); ?>product/fetch_data/" + page,
                method: "POST",
                dataType: "JSON",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    properti: properti,
                    kasur: kasur,
                    kamar_mandi: kamar_mandi,
                    status_properti: status_properti
                },
                success: function (data) {
                    $('.filter_data').html(data.product_list);
                    $('#pagination_link').html(data.pagination_link);
                }
            })
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }

        $(document).on('click', '.pagination li a', function (event) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            filter_data(page);
        });

        $('.form-control').click(function () {
            filter_data(1);
        });

        $('#price_range').slider({
            range: true,
            min: 1000,
            max: 65000,
            values: [1000, 65000],
            step: 500,
            stop: function (event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data(1);
            }

        });

    });
</script>