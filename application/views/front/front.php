<!DOCTYPE html>
<html lang="en">

<head>
	<title><?=$this->config->item('app_name')?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
	<link rel="shortcut icon" href="<?=base_url();?>assets/img/logo_padang_panjang.png" type="image/x-icon">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/animate.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/aos.css">

	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/magnific-popup.css">


	<link rel="stylesheet" href="<?=base_url()?>assets/front/fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/fonts/flaticon/font/flaticon.css">

	<!-- Theme Style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/style.css">
</head>

<body>
	<style>
		li.nav-item.cta-btn {
			margin: 0 0 0 9px;
		}
		.active{
			color: aliceblue;
		}
	</style>
	<header role="banner">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="<?=base_url('<?=base_url()?>/assets/front//')?>">Kubu Gadang</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
					aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsExample05">
					<ul class="navbar-nav ml-auto pl-lg-5 pl-0">
						<li class="nav-item cta-btn">
							<a class="nav-link" href="<?=base_url();?>">Home</a>
						</li>
						<?php $name = $this->session->userdata('nama');
$role = $this->session->userdata('role');?>

						<li class="nav-item cta-btn">
							<a class="nav-link" href="<?=base_url('controller/login');?>">Login</a>
						</li>
						<!-- <li class="nav-item">
                <a class="nav-link" href="recipes.html">Recipes</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="services.html">Food Catering</a>
                  <a class="dropdown-item" href="services.html">Drink &amp; Beverages</a>
                  <a class="dropdown-item" href="services.html">Wedding &amp; Birthday</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.html">News</a>
              </li> -->
					</ul>

					<ul class="navbar-nav ml-auto">
						<li class="nav-item cta-btn">
							<a class="nav-link" href="<?=base_url('<?=base_url()?>/assets/front/front/contact');?>">Hubungi kami</a>
						</li>
						<?php if ($role == 'admin' || $role == 'pelanggan'): ?>
						<li class="nav-item cta-btn">
							<a class="nav-link" href="#">Hi, <?=$name?></a>
						</li>
						<li class="nav-item cta-btn">
							<a class="nav-link" href="<?=base_url('pelanggan/keranjang')?>"><i class="fa fa-shopping-cart"></i></a>
						</li>
						<?php endif;?>
					</ul>

				</div>
			</div>
		</nav>
	</header>
	<!-- END header -->

	<div class="slider-wrap">
		<section class="home-slider owl-carousel">


			<div class="slider-item"
				style="background-image: url('<?=base_url()?>/assets/img/kubu_gadang/1675667748065.jpg');">

				<div class="container">
					<div class="row slider-text align-items-center justify-content-center">
						<div class="col-md-8 text-center col-sm-12 ">
							<h1 data-aos="fade-up">Nikmati liburan mu</h1>
							<p class="mb-5" data-aos="fade-up" data-aos-delay="100">Nikmati liburan yang asri dan nyaman dengan
								suasana desa khas Minang</p>
							<p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-white btn-outline-white">Order</a>
							</p>
						</div>
					</div>
				</div>

			</div>

			<div class="slider-item"
				style="background-image: url('<?=base_url()?>/assets/img/kubu_gadang/1675667748082.jpg');">
				<div class="container">
					<div class="row slider-text align-items-center justify-content-center">
						<div class="col-md-8 text-center col-sm-12 ">
							<h1 data-aos="fade-up">Habiskan liburan mu disini</h1>
							<p class="mb-5" data-aos="fade-up" data-aos-delay="100">Bingung mau liburan dimana, ke Desa Kubu Gadang
								dan nikmati semua paket wisata yang ada</p>
							<p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-white btn-outline-white">Order</a>
							</p>
						</div>
					</div>
				</div>

			</div>

		</section>
		<!-- END slider -->
	</div>


	<section class="section bg-light py-5  bottom-slant-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mb-4 mb-lg-0 col-lg-6 text-left service-block" data-aos="fade-up" data-aos-delay="">
					<span class="wrap-icon"><span class="flaticon-dinner d-block mb-4"></span></span>
					<h3 class="mb-2 text-primary">Makanan</h3>
					<p>Banyak tempat untuk wisata kuliner khas minang</p>
				</div>
				<div class="col-md-6 mb-4 mb-lg-0 col-lg-6 text-left service-block" data-aos="fade-up" data-aos-delay="200">
					<span class="wrap-icon"><span
							class="flaticon-hot-coffee-rounded-cup-on-a-plate-from-side-view d-block mb-4"></span></span>
					<h3 class="mb-2 text-primary">Santai</h3>
					<p>Menikmati udara pendesaan khas yang jauh dari hiruk pikuk kota</p>
				</div>
			</div>
		</div>
	</section>


	<section class="section pb-0">
		<div class="container">
			<div class="row mb-5 justify-content-center" data-aos="fade">
				<div class="col-md-7 text-center heading-wrap">
					<h2 data-aos="fade-up">Kegiatan</h2>
					<p data-aos="fade-up" data-aos-delay="100">Kegiatan yang berhubungan dengan budaya minang</p>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col-lg-4">
					<img src="<?=base_url();?>assets/img/kubu_gadang/1675667748288.jpg" alt="Image" class="img-fluid about_img_1"
						data-aos="fade" data-aos-delay="200">
				</div>
				<div class="col-lg-4">
					<img src="<?=base_url();?>assets/img/kubu_gadang/1675667748239.jpg" alt="Image" class="img-fluid about_img_1"
						data-aos="fade" data-aos-delay="300">
					<img src="<?=base_url();?>assets/img/kubu_gadang/1675667748073.jpg" alt="Image" class="img-fluid about_img_1"
						data-aos="fade" data-aos-delay="400">
				</div>
				<div class="col-lg-4">
					<img src="<?=base_url();?>assets/img/kubu_gadang/1675667748097.jpg" alt="Image" class="img-fluid about_img_1"
						data-aos="fade" data-aos-delay="500">
				</div>
			</div>
		</div>
	</section>

	<section class="section ">

		<div class="clearfix mb-5 pb-5">
			<div class="container-fluid mb-5">
				<div class="row" data-aos="fade">
					<div class="col-md-12 text-center heading-wrap">
						<h2>Paket Spesial</h2>
					</div>
				</div>
			</div>
			<div class="owl-carousel centernonloop">
				<?php foreach ($paket_wisata_spesial as $key => $value): ?>
				<a href="#" class="item-dishes" data-aos="fade-right" data-aos-delay="<?=$key * 100?>">
					<div class="text">
						<p class="dishes-price">Rp.<?=number_format($value->harga_paket)?></p>
						<h2 class="dishes-heading"><?=$value->nama_paket?></h2>
					</div>
					<img src="<?=base_url($value->foto[0]->foto);?>" alt="" class="img-fluid">
				</a>
				<?php endforeach;?>

			</div>
		</div>

	</section> <!-- .section -->

	<section class="section bg-light  top-slant-white bottom-slant-gray">

		<div class="clearfix mb-5 pb-5">
			<div class="container-fluid">
				<div class="row" data-aos="fade">
					<div class="col-md-12 text-center heading-wrap">
						<h2>Paket Wisata Kami</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="container">

			<div class="row no-gutters">
				<div class="col-md-12">
					<?php foreach ($paket_wisata as $key => $value): ?>
						<?php if ($value->satuan == 1) {
    $satuan = 'Per Orang';
} elseif ($value->satuan == 2) {
    $satuan = 'Per Kelompok';
} elseif ($value->satuan == 3) {
    $satuan = 'Per Pax';
}?>
					<?php if ($key % 2 == 0): ?>
						<div class="sched d-block d-lg-flex">
							<div class="bg-image order-2" style="background-image: url('<?=base_url($value->foto[0]->foto)?>');"
								data-aos="fade"></div>
							<div class="text order-1">
								<h3><?=$value->nama_paket?></h3>
								<p><?=$value->keterangan?></p>
								<p class="text-primary h3">Rp. <?=number_format($value->harga_paket)?>/<?=$satuan?></p>
								<?php if ($role == 'pelanggan'): ?>
								<a href="<?=base_url('pelanggan/store_keranjang/' . $value->id_paket)?>" class="btn btn-success btn-sm">Order</a>
									<?php else: ?>
								<button type="button" onclick="alert_order()" class="btn btn-success btn-sm">Order</button>
									<?php endif;?>
							</div>
						</div>
					<?php else: ?>
						<div class="sched d-block d-lg-flex">
							<div class="bg-image" style="background-image: url('<?=base_url($value->foto[0]->foto)?>');"
								data-aos="fade"></div>
							<div class="text">
								<h3><?=$value->nama_paket?></h3>
								<p><?=$value->keterangan?></p>
								<p class="text-primary h3">Rp. <?=number_format($value->harga_paket)?>/ <?=$satuan?></p>
								<?php if ($role == 'pelanggan'): ?>
								<a href="<?=base_url('pelanggan/store_keranjang/' . $value->id_paket)?>" class="btn btn-success btn-sm">Order</a>
									<?php else: ?>
								<button type="button" onclick="alert_order()" class="btn btn-success btn-sm">Order</button>
									<?php endif;?>
							</div>
						</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>

				<!-- <div class="col-md-6">
            <div class="sched d-block d-lg-flex">
              <div class="bg-image order-2" style="background-image: url('<?=base_url()?>/assets/front/img/dishes_2.jpg');" data-aos="fade"></div>
              <div class="text order-1">
                <h3>Bacon wrapped wild gulf prawns</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                <p class="text-primary h3">$18.00</p>

              </div>

            </div>

            <div class="sched d-block d-lg-flex">
              <div class="bg-image" style="background-image: url('<?=base_url()?>/assets/front/img/dishes_3.jpg');" data-aos="fade"></div>
              <div class="text">
                <h3>Seared ahi tuna fillet*, honey-ginger sauce</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                <p class="text-primary h3">$16.00</p>

              </div>

            </div>

          </div> -->

			</div>


		</div>
	</section> <!-- .section -->



	<section hidden class="section relative-higher">

		<div class="clearfix mb-5 pb-5">
			<div class="container-fluid">
				<div class="row" data-aos="fade">
					<div class="col-md-12 text-center heading-wrap">
						<h2>Testimonial</h2>
						<!-- <span class="back-text">Testimonial</span> -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">

			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="owl-carousel centernonloop2">
						<div class="slide" data-aos="fade-left" data-aos-delay="100">
							<blockquote class="testimonial">
								<p>&ldquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
									there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
									a large language ocean. &rdquo;</p>
								<div class="d-flex author">
									<img src="<?=base_url();?>assets/front/img/person_1.jpg" alt="" class="mr-4">
									<div class="author-info">
										<h4>Mellisa Howard</h4>
										<p>CEO, XYZ Company</p>
									</div>
								</div>
							</blockquote>
						</div>
						<div class="slide" data-aos="fade-left" data-aos-delay="200">
							<blockquote class="testimonial">
								<p>&ldquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
									there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
									a large language ocean. &rdquo;</p>
								<div class="d-flex author">
									<img src="<?=base_url();?>assets/front/img/person_2.jpg" alt="" class="mr-4">
									<div class="author-info">
										<h4>Mike Richardson</h4>
										<p>CEO, XYZ Company</p>
									</div>
								</div>
							</blockquote>
						</div>
						<div class="slide" data-aos="fade-left" data-aos-delay="300">
							<blockquote class="testimonial">
								<p>&ldquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
									there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
									a large language ocean. &rdquo;</p>
								<div class="d-flex author">
									<img src="<?=base_url();?>assets/front/img/person_3.jpg" alt="" class="mr-4">
									<div class="author-info">
										<h4>Charles White</h4>
										<p>CEO, XYZ Company</p>
									</div>
								</div>
							</blockquote>
						</div>
					</div>
				</div>
			</div>




		</div>
	</section> <!-- .section -->

	<section hidden class="section  bg-light top-slant-white">
		<div class="clearfix mb-5 pb-5">
			<div class="container-fluid">
				<div class="row" data-aos="fade">
					<div class="col-md-12 text-center heading-wrap">
						<h2>Blog</h2>
						<span class="back-text">Our Blog</span>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
					<div class="blog d-block">
						<a class="bg-image d-block" href="single.html"
							style="background-image: url('<?=base_url()?>/assets/front/img/dishes_1.jpg');"></a>
						<div class="text">
							<h3><a href="single.html">How To Cook Pasta?</a></h3>
							<p class="sched-time">
								<span><span class="fa fa-calendar"></span> April 22, 2018</span> <br>
							</p>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
								blind texts.</p>

							<p><a href="#" class="btn btn-primary btn-sm">Read More</a></p>

						</div>

					</div>
				</div>
				<div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
					<div class="blog d-block">
						<a class="bg-image d-block" href="single.html"
							style="background-image: url('<?=base_url()?>/assets/front/img/dishes_2.jpg');"></a>
						<div class="text">
							<h3><a href="single.html">How To Cook Pasta?</a></h3>
							<p class="sched-time">
								<span><span class="fa fa-calendar"></span> April 22, 2018</span> <br>
							</p>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
								blind texts.</p>

							<p><a href="#" class="btn btn-primary btn-sm">Read More</a></p>

						</div>

					</div>
				</div>
			</div>
		</div>

	</section> <!-- .section -->

	<footer class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-4 mb-5">
					<h3>Tentang Kami</h3>
					<p class="mb-5">Kubu Gadang merupakan salah satu desa wisata di Provinsi Sumatera Barat. Terletak di kota
						Padang Panjang, Sumatera Barat</p>
					<ul class="list-unstyled footer-link d-flex footer-social">
						<li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
						<li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
					</ul>

				</div>
				<div class="col-md-5 mb-5">
					<div class="mb-5">
						<h3>Jadwal Buka</h3>
						<p><strong class="d-block font-weight-normal text-black">Buka Tiap hari</strong> 08:00 WIB - 18:00 WIB</p>
					</div>
					<div>
						<h3>Kontak Kami</h3>
						<ul class="list-unstyled footer-link">
							<li class="d-block">
								<span class="d-block text-black">Alamat:</span>
								<span>Jl. H. Miskin, Ekor Lubuk, Kec. Padang Panjang Tim., Kota Padang Panjang, Sumatera Barat
									27122</span></li>
							<li class="d-block"><span class="d-block text-black">No.Hp:</span><span>0852-6380-9321</span></li>
							<li class="d-block"><span class="d-block text-black">Email:</span><span>kubugadang@kubugadang.id</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">

				</div>
			</div>
			<div class="row">
				<div class="col-12 text-md-center text-left">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());

						</script> All rights reserved | This template is made with <i class="fa fa-heart text-danger"
							aria-hidden="true"></i> by <a href="#" target="_blank"><?=$this->config->item('app_name')?></a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- END footer -->


	<!-- Modal -->
	<div class="modal fade" id="map-confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Selamat Datang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Selamat Datang di website Desa Wisata Kubu Gadang, apakah anda ingin di arahkan ke lokasi, kalau iya sistem
					kami akan membuka map untuk anda
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="button" class="btn btn-primary">Ya</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal error-->
	<div class="modal fade" id="alert-order" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Maaf</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Untuk order anda harus login dulu !!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </div>
			</div>
		</div>
	</div>

	<!-- loader -->
	<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#cf1d16" /></svg></div>

	<script src="<?=base_url()?>assets/front/js/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/front/js/popper.min.js"></script>
	<script src="<?=base_url()?>assets/front/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/front/js/owl.carousel.min.js"></script>
	<script src="<?=base_url()?>assets/front/js/jquery.waypoints.min.js"></script>
	<script src="<?=base_url()?>assets/front/js/aos.js"></script>

	<script src="<?=base_url()?>assets/front/js/jquery.magnific-popup.min.js"></script>
	<script src="<?=base_url()?>assets/front/js/magnific-popup-options.js"></script>


	<script src="<?=base_url()?>assets/front/js/main.js"></script>
	<script src="<?=base_url();?>assets/js/costumejs/front.js"></script>
	<script>
		alert_order = () => {
			$("#alert-order").modal('show');
		}
	</script>
</body>

</html>
