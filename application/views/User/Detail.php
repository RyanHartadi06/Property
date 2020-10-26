<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Hero Banner  Start================================== -->
			<?php foreach($detail as $d){?>
				<div class="featured_slick_gallery gray">
					<div class="featured_slick_padd mx-auto"><a href="<?= base_url('uploads/rumah/') . $d->banner; ?>" class="mfp-gallery"><img src="<?= base_url('uploads/rumah/') . $d->banner; ?>" class="img-fluid mx-auto" alt="" /></a></div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ Property Detail Start ================================== -->
			<section class="gray-dark">
				<div class="container">
					<div class="row">
						
						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12">
						
							<!-- Single Block Wrap -->
							<div class="property_block_wrap style-2">
								
								<div class="property_block_wrap_header">
									<a data-toggle="collapse" data-parent="#features" href="#clOne" aria-expanded="true"><h4 class="property_block_title">Detail & Features</h4></a>
								</div>
								<div id="clOne" class="panel-collapse collapse show" aria-expanded="true">
									<div class="block-body">
										<ul class="deatil_features">
											<li><strong>Kamar Tidur:</strong><?= $d->jumlah_kamar?> Beds</li>
											<li><strong>Kamar Mandi:</strong><?= $d->kamar_mandi?>  Bath</li>
											<li><strong>Luas Tanah:</strong><?= $d->luas_tanah?></li>
											<li><strong>Luas Bangunan</strong><?= $d->luas_bangunan?></li>
											<?php if($d->status == 1){?>
												<li><strong>Status</strong>Tersedia</li>
											<?php } else {?>
												<li><strong>Status</strong>Disewakan</li>
											<?php } ?>
											<li><strong>Kategori</strong><?= $d->name?></li>
											<li><strong>Sertifikat</strong><?= $d->sertifikat?></li>
											<li><strong>Air</strong><?= $d->air?></li>
											<li><strong>Listrik</strong><?= $d->listrik?></li>
											<li><strong>Kondisi</strong><?= $d->kondisi?></li>
											<li><strong>Tanggal</strong><?= $d->createdDate?></li>
											<?php if($d->status_property == 1){?>
												<li><strong>Status Property</strong>Dijual</li>
											<?php } else {?>
												<li><strong>Status Property</strong>Disewakan</li>
											<?php } ?>
											
											<li><strong>Alamat</strong><?= $d->alamat_lengkap?></li>
											
										</ul>
									</div>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="property_block_wrap style-2">
								
								<div class="property_block_wrap_header">
									<a data-toggle="collapse" data-parent="#dsrp" href="#clTwo" aria-expanded="true"><h4 class="property_block_title">Description</h4></a>
								</div>
								<div id="clTwo" class="panel-collapse collapse show" aria-expanded="true">
									<div class="block-body">
										<p><?= $d->deskripsi?></p>
									</div>
								</div>
							</div>
							
							
							<!-- Single Block Wrap -->
							<div class="property_block_wrap style-2">
								
								<div class="property_block_wrap_header">
									<a data-toggle="collapse" data-parent="#gal" href="#clSev" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Gallery</h4></a>
								</div>
								
								<div id="clSev" class="panel-collapse collapse" aria-expanded="true">
									<div class="block-body">
										<ul class="list-gallery-inline">
											<?php foreach($rumah_detail as $r){?>
												<li>
												<a href="<?= base_url('uploads/rumah/') . $r->gambar; ?>" class="mfp-gallery"><img src="<?= base_url('uploads/rumah/') . $r->gambar; ?>" class="img-fluid mx-auto" alt="" /></a>
											</li>
											<?php } ?>
											
										</ul>
									</div>
								</div>
								
							</div>
							
						
							
						</div>
						
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="property-sidebar">
								
								<!-- Share & Like Button -->
								<div class="like_share_wrap b-0">
									<ul class="like_share_list">
										<li><a href="#" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="fas fa-share"></i>Share</a></li>
										<li><a href="#" class="btn btn-likes" data-toggle="tooltip" data-original-title="Save"><i class="fas fa-heart"></i>Save</a></li>
									</ul>
								</div>
								
								<div class="agent-_blocks_wrap b-0">
									<div class="side-booking-header">
										<h3 class="price">$70<sub>per night</sub></h3>
									</div>
									<div class="side-booking-body">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-6">
												<div class="form-group">
													<div class="cld-box">
														<i class="ti-calendar"></i>
														<input type="text" name="checkin" class="form-control" value="10/24/2020" />
													</div>
												</div>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-6">
												<div class="form-group">
													<div class="cld-box">
														<i class="ti-calendar"></i>
														<input type="text" name="checkout" class="form-control" value="10/24/2020" />
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-6">
												<div class="form-group">
													<div class="guests">
													  <label for="guests">Adults</label>
													  <div class="guests-box">
														  <button class="counter-btn" type="button" id="cnt-down"><i class="ti-minus"></i></button>
														  <input type="text" id="guestNo" name="guests" value="2"/>
														  <button class="counter-btn" type="button" id="cnt-up"><i class="ti-plus"></i></button>
													  </div>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-6">
												<div class="form-group">
													<div class="guests">
													  <label for="guests">Kids</label>
													  <div class="guests-box">
														  <button class="counter-btn" type="button" id="kcnt-down"><i class="ti-minus"></i></button>
														  <input type="text" id="kidsNo" name="kids" value="0"/>
														  <button class="counter-btn" type="button" id="kcnt-up"><i class="ti-plus"></i></button>
													  </div>
													</div>
												</div>
											</div>
											
											<div class="side-booking-foot">
												<span class="sb-header-left">Total</span>
												<h3 class="price theme-cl">$170</h3>
											</div>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="stbooking-footer mt-1">
													<div class="form-group mb-0 pb-0">
														<a href="#" class="btn btn-md full-width btn-theme bg-2">Book It Now</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<!-- Download Pdf Report -->
								<div class="downld_rport b-0">
									<ul>
										<li class="pdf"><a href="#"><i class="fas fa-file-pdf"></i>Download<span>PDF File</span></a></li>
										<li><a href="#"><i class="ti-printer"></i>Printout<span>Full Report</span></a></li>
									</ul>
								</div>
								
							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<?php } ?>
			