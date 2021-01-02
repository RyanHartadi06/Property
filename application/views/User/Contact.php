<div class="clearfix"></div>

			<!-- ============================================================== -->

			<!-- Top header  -->

			<!-- ============================================================== -->

		

           

			

			<!-- ============================ Page Title Start================================== -->

			<div class="page-title" style="background:#f4f4f4 url(<?= base_url(); ?>global/img/inner-banner.jpg);" data-overlay="5">

				<div class="container">

					<div class="row">

						<div class="col-lg-12 col-md-12">

							

							<div class="breadcrumbs-wrap">

								<ol class="breadcrumb">

									<li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>

								</ol>

								<h2 class="breadcrumb-title">Halaman - Kontak Kami</h2>

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

										<h4 class="property_block_title">Silahkan isi Form di bawah ini</h4>

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

					

							<div class="contact-box">

								<i class="fa fa-location-arrow"></i>

								<h4>Kantor Utama</h4>

									<p>Perum Graha Permata Indah Blok AE no 44</p>

							</div>

							

							<div class="contact-box">

								<i class="fa fa-envelope"></i>

								<h4>Hubungi Kami</h4>

								<p>

								    <center><a href="https://linktr.ee/myhouseagency" target="_blank">Official Page MYHOUSE</a></center><br></p>

<p class="text-justify">

<b>LAYANGKAN KRITIK DAN SARAN ANDA </b></br>

- +6282266666488</br>

- ejjaalith@gmail.com</br>

- office@myhouseproperty.co.id</br>

- myhousepropertygroup@gmail.com</br>

</br>

<b>Myhouse Agency Property</br>

Professional Agent, Excellent Agent Property.</b></br>

<b>YOUR DREAM HOUSE IS WAITING FOR YOU</b>

								</p>

							</div>

							

							

						</div>

						

					</div>

					<!-- /row -->		

					

				</div>

						

			</section>