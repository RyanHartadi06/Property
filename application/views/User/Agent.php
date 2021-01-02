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

            <?php foreach($agent as $a): 
                $id_agent = $a['id_agent'];
                $query = $this->db->query("SELECT * FROM rumah WHERE id_agent = '$id_agent'")->num_rows();
                ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="grid_agents style-2">

                    <div class="grid_agents-wrap text-center">

                        <?php
							$pecah = $a['nama_agent'];
							$count = str_word_count($pecah);
							if($count == 1) {
								$initial = $pecah[0];
							} elseif($count > 2) {
								$intiall = $pecah[0];
								$initial = $initall.$pecah[1];
							}
						?>
						    <?php if(empty($a['foto'])) { ?>
							<img src="https://iau.edu.lc/wp-content/uploads/2016/09/dummy-image.jpg" class="rounded mb-2" style="width: 120px; height: 120px" alt="<?= $a['nama_agent']; ?>">
                            <?php } else { ?>
                            <img src="<?= base_url(); ?>uploads/rumah/<?= $a['foto']; ?>" class="rounded mb-2" style="width: 120px; height: 120px" alt="<?= $a['nama_agent']; ?>">
                            <?php } ?>
                        <div class="fr-grid-deatil">
                            <h5 class="fr-can-name"><?= $a['nama_agent']; ?></a></h5>
                            <div class="mt-1 theme-cl"><?= $query; ?> Listing</div>
                        </div>

                    </div>

                    <div class="grid_fr_info">
                        <span class="agent-divider">Ikuti</span>
                        <ul>
                            <li><a href="https://facebook.com/<?= $a['facebook'];?>"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://instagram.com/<?= $a['instagram'];?>"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=<?= $a['no_wa'];?>&text=Halo"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="mailto:<?= $a['email'];?>"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= $pagi; ?>
            </div>
        </div>

    </div>

</section>