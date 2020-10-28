<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
		
           
			
			<!-- ============================ Page Title Start================================== -->
			<div class="page-title" style="background:#f4f4f4 url(assets/img/inner-banner.jpg);" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">Contact Me</li>
								</ol>
								<h2 class="breadcrumb-title">Contact Us - Get in Touch</h2>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Agency List Start ================================== -->
			<section class="gray-simple">
			
				<div class="container">
				<form action="" method="post" enctype="multipart/form-data">
					<!-- row Start -->
					<div class="row">
					
							<div class="col-lg-8 col-md-7">
								<div class="property_block_wrap style-2">
									
									<div class="property_block_wrap_header no-collapse">
										<h4 class="property_block_title">Fillup The Form</h4>
									</div>
									<div class="col mt-3">
										<?php echo $this->session->flashdata('pesan')?>
									</div>
									<div class="block-body">
										<form class="form-simple">
											<div class="row">
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label>Name</label>
														<input type="text" class="form-control simple" name="nama" id="nama">
														<?= form_error('nama', '<small class="text-danger">', '</small>')?> 
													</div>
												</div>
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label>Email</label>
														<input type="email" class="form-control simple" name="email" id="email">
														<?= form_error('email', '<small class="text-danger">', '</small>')?> 
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label>Subject</label>
												<input type="text" class="form-control simple" name="subject" id="subject">
												<?= form_error('subject', '<small class="text-danger">', '</small>')?> 
											</div>
											
											<div class="form-group">
												<label>Message</label>
												<textarea class="form-control simple" name="pesan" id="pesan"></textarea>
												<?= form_error('pesan', '<small class="text-danger">', '</small>')?> 
											</div>
											
											<div class="form-group">
												<button class="btn btn-theme bg-2" type="submit">Submit Request</button>
											</div>
										</form>
									</div>
									
								</div>
												
							</div>

						</form>
						
						<div class="col-lg-4 col-md-5">
						<?php foreach($kontak as $k){?>
							<div class="contact-box">
								<i class="fa fa-location"></i>
								<h4>Kantor Utama</h4>
								<p><?=$k['alamat']?></p>
							</div>
							
							<div class="contact-box">
								<i class="ti-email"></i>
								<h4>Hubungi Kami</h4>
								<p><?=$k['email']?></p>
								<p><?=$k['no_telp']?></p>
							</div>
						<?php } ?>
							
							
						</div>
						
					</div>
					<!-- /row -->		
					
				</div>
						
			</section>