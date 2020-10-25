<div class="clearfix"></div>
<section class="gray">

    <div class="container">
        <div class="row mb-3">

            <div class="col-lg-6 col-md-6">
                <div class="breadcrumbs-wrap">
                    <h2 class="breadcrumb-title">Official Agent</h2>
                    <p class="text-muted">Berikut adalah Official Agent dari MYHOUSE Property Group</p>
                </div>
            </div>
        </div>

        <div class="row">

            <?php foreach($agent as $a): ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="grid_agents style-2">

                    <div class="grid_agents-wrap">

                        <div class="fr-grid-thumb">
                            <img src="assets/img/Ijul.jpg" class="img-fluid mx-auto" alt="" />
                        </div>

                        <div class="fr-grid-deatil">
                            <h5 class="fr-can-name"><?= $a['nama_agent']; ?></a></h5>
                            <div class="mt-1 theme-cl">22 Listings</div>
                        </div>

                    </div>

                    <div class="grid_fr_info">
                        <span class="agent-divider">Ikuti</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="pagination p-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span class="fa fa-angle-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">18</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span class="fa fa-angle-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</section>