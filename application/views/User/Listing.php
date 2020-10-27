<section class="gray-simple">
			
				<div class="container">
					
					<div class="row">
						
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="hidden-md-down">
							
								<div class="page-sidebar">
									
									<!-- Find New Property -->
									<div class="sidebar-widgets">
										
										<div class="form-group">
											<div class="input-with-icon">
												<input type="text" class="form-control" placeholder="  Cari">
												<i class="fa fa-search ml-2"></i>
											</div>
										</div>
										
										<div class="form-group">
											<div class="input-with-icon">
												<input type="text" class="form-control" placeholder="Lokasi Terdekat">
												<i class="fa fa-location"></i>
											</div>
										</div>
										
										<div class="form-group">
											<div class="simple-input">
												<select id="ptype" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">Apartment</option>
													<option value="2">Condo</option>
													<option value="3">Family</option>
													<option value="4">Houses</option>
													<option value="5">Villa</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<div class="simple-input">
												<select id="status" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">Apartment</option>
													<option value="2">Condo</option>
													<option value="3">Houses</option>
													<option value="4">Villa</option>
													<option value="5">Land</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<div class="simple-input">
												<select id="bedrooms" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<div class="simple-input">
												<select id="bathrooms" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
																				
										<div class="form-group">
											<div class="simple-input">
												<select id="built" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">2010</option>
													<option value="2">2011</option>
													<option value="3">2012</option>
													<option value="4">2013</option>
													<option value="5">2014</option>
													<option value="6">2015</option>
													<option value="7">2016</option>
												</select>
											</div>
										</div>
										
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<div class="simple-input">
														<input type="text" class="form-control" placeholder="Min">
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<div class="simple-input">
														<input type="text" class="form-control" placeholder="Max">
													</div>
												</div>
											</div>
										</div>								

										<div class="ameneties-features">
											<button class="btn btn-theme full-width bg-2">Cari</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>	
			</section>

			<!-- <section>
			
				<div class="container">
						
					<div class="row">
					
						<?php 
						if (empty($listing)) {
						?>
						<div class="col-lg-4 text-center">
							<h2 class="font-weight-bold">Tidak ditemukan</h2>
							<p class="text-muted">Maaf tidak ditemukan listing pada page ini</p>
						</div>
						<?php
						} else {
							$no	= $this->uri->segment(4);
							if ($no == "") {
								$i 	= 0;
							} else {
								$i = $no;
							}
						foreach($listing as $l): 
                            $id_agent = $l->id_agent;
                            $query = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agent'")->row_array();
							$i++;
							?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="single_property_style property_style_2 modern">
						
								<div class="listing_thumb_wrapper">
									<div class="property_gallery_slide-thumb">
										<img src="<?= base_url('uploads/rumah/') . $l->banner; ?>" class="img-fluid mx-auto" alt="">
									</div>
								</div>
								
								<div class="property_caption_wrappers pb-0">
									<div class="property_short_detail">
										<div class="pr_type_status">
											<h4 class="pr-property_title mb-1"><a href="<?= base_url() ?>detailProduct/<?= $l->id_rumah; ?>"><?= $l->nama_pemilik_rumah; ?></a></h4>
											<div class="listing-location-name"><a href="single-property-1.html"><?= $l->alamat_lengkap; ?></a></div>
										</div>
										<div class="property-real-price"><a href="single-property-1.html" class="cl-blue">Rp. <?= $l->harga?></a></div>
										<!-- <div class="property-real-price"><a href="single-property-1.html" class="cl-blue">Rp. <?= number_format($l->harga,0,',','.'); ?></a></div> -->
									</div>
								</div>
								
								<div class="modern_property_footer">
									<div class="property-lists flex-1">
										<ul>
											<li><span class="flatcons"><img src="assets/img/bed.svg" alt=""></span><?= $l->jumlah_kamar; ?> Beds</li>
											<li><span class="flatcons"><img src="assets/img/bath.svg" alt=""></span><?= $l->kamar_mandi; ?> Baths</li>
										</ul>
									</div>
									<div class="fp_types">Listing <?= $query['nama_agent']; ?></div>
								</div>
							</div>
                        </div>	
                        <?php endforeach; } ?>
					</div>
							
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="pagination pagination-small text-center">
							<ul class="d-flex">
								<?=$pagi?>
							</ul>
						</div>
					</div>
				</div>	
			</div>	
		</section> -->
		<!-- <script src="http://localhost/property/global/js/jquery.min.js"></script>
		<script>
			var x = document.getElementsByTagName("a")[0].getAttribute("data-ci-pagination-page"); 
			alert(x);
    		$('a[rel=next]').addClass('page-link');
			$('a[rel=prev]').addClass('page-link');
			$('a[rel=start]').addClass('page-link mx-auto');
		</script> -->