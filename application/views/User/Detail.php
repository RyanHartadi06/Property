<div class="clearfix"></div>

<div class="featured_slick_gallery gray">

	<div class="featured_slick_gallery-slide">



		<?php foreach ($detail as $d) {

			$id_agent = $d->id_agent;

			$b = $this->db->query("SELECT * FROM agent WHERE id_agent = '$id_agent'")->row_array();

		?>

			<div class="featured_slick_padd"><a href="<?= base_url('uploads/rumah/') . $d->banner; ?>" class="mfp-gallery"><img src="<?= base_url('uploads/rumah/') . $d->banner; ?>" class="img-fluid mx-auto" alt="" /></a></div>

			<?php

			$id = $this->uri->segment(3);

			$query = $this->db->query("SELECT * FROM detail_rumah WHERE id_rumah = '$id'")->result_array();

			foreach ($query as $q) : ?>

				<div class="featured_slick_padd"><a href="<?= base_url('uploads/rumah/') . $q['gambar']; ?>" class="mfp-gallery"><img src="<?= base_url('uploads/rumah/') . $q['gambar']; ?>" class="img-fluid mx-auto" alt="" /></a></div>

				<!--<div class="featured_slick_padd"><a href="#"-->

				<!--		class="mfp-gallery"><img src="<?= base_url('uploads/rumah/') . $q['gambar']; ?>" class="img-fluid mx-auto"-->

				<!--			alt="Gambar" /></a></div>-->

			<?php endforeach; ?>

	</div>

</div>



<section class="gray-dark">

	<div class="container">

		<div class="row">



			<!-- property main detail -->

			<div class="col-lg-8 col-md-12 col-sm-12">



				<!-- Single Block Wrap -->

				<div class="property_block_wrap style-2">



					<div class="property_block_wrap_header">

						<a data-toggle="collapse" data-parent="#dsrp" href="#clTwo" aria-expanded="true">

							<h3 class="property_block_title"><?= $d->nama_pemilik_rumah; ?></h3>

						</a>

						<p class="text-muted"><i class="fas fa-map-marker-alt"></i> <?= $d->alamat_lengkap; ?></p>

					</div>

					<div id="clTwo" class="panel-collapse collapse show" aria-expanded="true">

						<div class="block-body">

							<?php

							$deskripsi = $d->deskripsi;

							echo $deskripsi;

							?>

							<hr>

							<h4>LAYANGKAN KRITIK DAN SARAN ANDA : </h4>

							<b>

								- +6282266666488<br>

								- ejjaalith@gmail.com<br>

								- office@myhouseproperty.co.id<br>

								- myhousepropertygroup@gmail.com<br>

							</b>

							<br>

							<h4>MyHouse Agency Property<br>

								Professional Agent, Excellent Agent Property.<br><br>

								<b>YOUR DREAM HOUSE IS WAITING FOR YOU </b>

							</h4>

						</div>

					</div>

				</div>





				<!-- Single Block Wrap -->

				<div class="property_block_wrap style-2">



					<div class="property_block_wrap_header">

						<a data-toggle="collapse" data-parent="#gal" href="#clSev" aria-expanded="true" class="collapsed">

							<h4 class="property_block_title">Galeri</h4>

						</a>

					</div>



					<div id="clSev" class="panel-collapse collapse show" aria-expanded="true">

						<div class="block-body">

							<ul class="list-gallery-inline">

								<?php foreach ($rumah_detail as $r) { ?>

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

							<li><a href="<?php echo base_url('Home/updatePopuler/' . $d->id_rumah) ?>" class="btn btn-likes remove" data-toggle="tooltip" data-original-title="Save"><i class="fa fa-heart"></i>Save</a></li>

						</ul>

					</div>



					<div class="agent-_blocks_wrap b-0">

						<div class="side-booking-header">

							<h3 class="price">Rp <?php echo number_format($d->harga, 0, ',', '.'); ?></h3>

						</div>

						<div class="side-booking-body">

							<div class="row">

								<div class="col-lg-12 col-md-12 col-sm-6 text-center">

									<?php

									$pecah = $d->nama_agent;

									$count = str_word_count($pecah);

									if ($count == 1) {

										$initial = $pecah[0];
									} elseif ($count > 2) {

										$intiall = $pecah[0];

										$initial = $initall . $pecah[1];
									}

									?>

									<?php if (empty($a['foto'])) { ?>

										<img src="https://iau.edu.lc/wp-content/uploads/2016/09/dummy-image.jpg" class="rounded mb-2" style="width: 120px; height: 120px" alt="<?= $a['nama_agent']; ?>">

									<?php } else { ?>

										<img src="<?= base_url(); ?>uploads/rumah/<?= $a['foto']; ?>" class="rounded mb-2" style="width: 120px; height: 120px" alt="<?= $a['nama_agent']; ?>">

									<?php } ?><br>

									<span class="text-muted font-weight-bold"><?= $d->nama_agent; ?></span>

									<hr>

									<p>

										<b>Facebook :</b> <a href="https://facebook.com/<?= $b['facebook']; ?>" target="_blank">&nbsp;<?= $b['facebook']; ?></a><br>

										<b>Telepon :</b> &nbsp;<?= $b['no_wa']; ?><br>

										<b>Email :</b> <a href="mailto:<?= $b['email']; ?>" target="_blank"><?= $b['email']; ?></a></br>

									</p>

									<a href="https://api.whatsapp.com/send?phone=<?= $b['no_wa']; ?>&text=Halo, Saya tertarik dengan properti dengan nama produk <?= $d->nama_pemilik_rumah; ?> dari MyHouse - Property Group" class="btn btn-success btn-block"><i class="fab fa-whatsapp"></i> WhatsApp Sekarang</a>

									<!--<img src="<?= base_url(); ?>global/img/jpeg/dummy.png"-->

									<!--	class="img-fluid rounded-circle text-center"-->

									<!--	style="height: 100px; width: 120px">-->

									<!--<h4 class="mt-3 mb-2"><?= $d->nama_agent; ?></h4>-->

									<!--<p class="text-muted">Ikuti</p>-->

									<!--<div class="property-lists flex-1">-->

									<!--	<ul class="justify-content-center">-->

									<!--		<li><a href="https://facebook.com/<?= $b['facebook']; ?>"><span class="flatcons"><i class="fa fa-facebook"></i></span></a></li>-->

									<!--		<li><a href="https://instagram.com/<?= $b['instagram']; ?>"><span class="flatcons"></span></a></li>-->

									<!--		<li><a href="https://api.whatsapp.com/send?phone=<?= $b['no_wa']; ?>&text=Halo"><span class="flatcons"><i class="fa fa-whatsapp"></i></span></a></li>-->

									<!--		<li><a href="mailto:<?= $b['email']; ?>"><span class="flatcons"><i class="fa fa-envelope"></i></span></a></li>-->

									<!--	</ul>-->

									<!--</div>-->

								</div>

							</div>

						</div>

					</div>



					<div class="agent-_blocks_wrap b-0">

						<div class="side-booking-header">

							<h3 class="price">Kalkulator KPR</h3>

						</div>

						<div class="side-booking-body">

							<div id="total"></div>

							<div class="form-group">

								<label for="exampleEmail1">Jumlah Kredit</label>

								<input type="text" id="jumlah_kredit" class="form-control">

							</div>

							<div class="form-group">

								<label for="exampleEmail1">Suku Bunga (%)</label>

								<input type="number" id="suku_bunga" class="form-control">

							</div>

							<div class="form-group">

								<label for="exampleEmail1">Jangka Waktu (tahun)</label>

								<input type="number" id="jangka_waktu" class="form-control">

							</div>

							<div class="form-group">

								<button class="btn btn-info" type="submit" onclick="hitungTotal();">Hitung</button>

								<button class="btn btn-warning" onclick="resetForm();">Ulangi</button>

							</div>

						</div>

					</div>

				</div>

			</div>





		</div>

	</div>

</section>

<?php } ?>

<script type="text/javascript">
	$(".remove").click(function() {

		var id = $(this).parents("tr").attr("id");



		swal("Terima Kasih", "Telah Memilih Sebagai Favorite", "success");



	});



	function resetForm() {

		$('#jumlah_kredit').val("");

		$('#suku_bunga').val("");

		$('#jangka_waktu').val("");

	}



	function hitungTotal() {

		var jumlah_kredit = $('#jumlah_kredit').val();

		var tenor = $('#suku_bunga').val();

		var jangka = $('#jangka_waktu').val();



		// console.log(jumlah_kredit);



		if (jumlah_kredit == "") {

			$('#total').html('<div class="alert alert-danger"><b>Kolom Jumlah Kredit tidak boleh kosong</b></div>');

		} else if (tenor == "") {

			$('#total').html('<div class="alert alert-danger"><b>Kolom Suku Bunga tidak boleh kosong</b></div>');

		} else if (jangka == "") {

			$('#total').html('<div class="alert alert-danger"><b>Kolom Jangka Waktu tidak boleh kosong</b></div>');

		} else {



			// console.log(`${jumlah_kredit} - ${tenor} - ${jangka}`);



			var bunga = parseFloat(tenor / 12 / 100);

			var month = jangka * 12;

			var power = Math.pow((1 + bunga), month);

			var pmt = jumlah_kredit * bunga * power / (power - 1);

			var totalcredit = parseInt(pmt);



			var number_string = totalcredit.toString(),

				sisa = number_string.length % 3,

				rupiah = number_string.substr(0, sisa),

				ribuan = number_string.substr(sisa).match(/\d{3}/g);



			var number_strings = totalcredit.toString(),

				sisa = number_string.length % 3,

				rupiah = number_string.substr(0, sisa),

				ribuan = number_string.substr(sisa).match(/\d{3}/g);



			if (ribuan) {

				separator = sisa ? '.' : '';

				rupiah += separator + ribuan.join('.');

			}



			console.log(pmt + jumlah_kredit);



			$('#total').html('<div class="alert alert-info">Jumlah Angsuran per Bulan adalah <b>Rp. ' + rupiah + ' / bulan</b></div>');

		}

	}
</script>

<!—- ShareThis BEGIN -—>

	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f992d8e90c74500124aaafd&product=sticky-share-buttons" async="async"></script>

	<!—- ShareThis END -—>