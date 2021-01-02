<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->	
			<?php foreach ($page_profil as $r) { ?>
		
			<div class="page-title" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Beranda</a></li>
									<!-- <li class="breadcrumb-item active" aria-current="page">Privacy</li> -->
								</ol>
								<h2 class="breadcrumb-title">Tentang Kami</h2>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<section class="gray-simple">
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row">
					
						<div class="col-lg-10 col-md-12">
						
						<?= $r->deskripsi ?>
											
						</div>

						
					</div>
					<!-- /row -->		
					
				</div>
						
			</section>
			<!-- ============================ Page Title Start================================== -->
			<?php } ?>