<style type="text/css">
</style>
<div class="main">
	<section class="home-banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-12 mb-3">
					<div class="banner-primary">
						<?php foreach ($banner as $key => $ban): ?>
							<div>
								<img src="<?php echo BASEBACK.$ban['image'] ?>" class="img-fluid">
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-lg-3 col-sm-12">
					<div class="row">
						<?php foreach ($bannerRight as $key => $ban): ?>
						<div class="col-6 col-lg-12 banner-second one mb-2 ">
							<img src="<?php echo BASEBACK.$ban['image'] ?>" class="img-fluid">
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="brand">
		<div class="container">
			<div class="slick-brand" data-slick='{"slidesToShow": 7, "slidesToScroll": 1}'; >
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/flip.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/independent.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/toymachine.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/vans.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/obey.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/trasher.jpeg' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/flip.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/independent.png' ?>" class="img-fluid">
					</a>
				</div>
				<div class="p-4">
					<a href="">
						<img src="<?php echo ASSETS.'img/logobrand/toymachine.png' ?>" class="img-fluid">
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="latest-arrival mt-0 mt-lg-5 pt-2 pt-lg-5">
		<div class="container ">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-section d-flex gap-1 gap-lg-3">
						<h3>LATEST ARRIVAL</h3>
						<i class="bi bi-arrow-right-circle-fill"></i>
						<div>View All</div>
					</div>
					<hr>
				</div>
			</div>
			
		</div>
		<div class="width-overflow product ms-lg-5 ">
				<div class="d-flex">
					<?php foreach ($showallproduct as $key => $produk){ ?>
						<div class="col-lg-3 p-1 p-lg-4">
							<div class="card">
								<a href="<?php echo BASEURL.'product/detail/'.$produk['url_product'] ?>">
									<img src="<?php echo BASEBACK.$produk['product_image_front'] ?>" class="img-fluid"> 
									<div class="card-body">
										<h5 class="card-title"><?php echo $produk['nama'] ?></h5>
										<p><?php echo $produk['nama_product'] ?></p>
										<p><?php echo rupiah($produk['harga']) ?></p>
									</div>
								</a>
							</div>

							<a href="<?php echo BASEURL.'product/detail/'.$produk['url_product'] ?>" class="btn btn-warning" type="button"><i class="bi bi-arrow-right-circle-fill"></i> MORE FROM BRAND</a>
						</div>
					<?php } ?>
				</div>
			</div>
	</section>
	<section class="popular-products mt-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-section d-flex gap-1 gap-lg-3">
						<h3>POPULAR PRODUCTS</h3>
						<i class="bi bi-arrow-right-circle-fill"></i>
						<div>View All</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
		<div class="width-overflow product ms-lg-5">
				<div class="d-flex">
					<?php foreach($popularproduct as $key => $popular) { ?>
						<div class="col-lg-3 p-1 p-lg-4">
							<div class="card">
								<a href="<?php echo BASEURL.'product/detail/'.$popular['url_product'] ?>">
									<img src="<?php echo BASEBACK.$popular['product_image_front'] ?>" class="img-fluid"> 
									<div class="card-body">
										<h5 class="card-title"><?php echo $popular['nama'] ?></h5>
										<p><?php echo $popular['nama_product'] ?></p>
										<p><?php echo rupiah($popular['harga']) ?></p>
									</div>
								</a>
							</div>

							<a href="<?php echo BASEURL.'product/detail/'.$popular['url_product'] ?>" class="btn btn-warning" type="button"><i class="bi bi-arrow-right-circle-fill"></i> MORE FROM BRAND</a>
						</div>
					<?php } ?>
				</div>
			</div>
	</section>

	<section class="section-portal mt-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-section d-flex gap-1 gap-lg-3">
						<h3>MUSIC</h3>
						<i class="bi bi-arrow-right-circle-fill"></i>
						<div>View All</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
		<div class="container height-lg-523 mb-5">
			<div class="row">
				<div class="col-12 col-lg-3">
					<div class="card height-lg-523">
						<img src="<?php echo ASSETS.'img/backgrounds/musicbg.png' ?>">
						<div class="card-body">
							<h5 class="card-title">HEAD LINE/UP COMMING BRAND</h5>
							<p>Identitas dari ketiganya tersebut yang sangat ikonik bertemu dengan signature style dari Miracle Mates melalui beberapa lineup item, macam balaclava, safari hat, work jacket.lineup item, macam balaclava, safari hat, work</p>
						</div>
						<div class="btn-view-more mb-4 mb-md-0">
							<a class="btn btn-warning mt-lg-5" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE </a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6">
					<div class="responsive height-lg-523">
						<img src="<?php echo ASSETS.'img/backgrounds/musicbg2.png' ?>" class="img-fluid">
						<div class="btn-view-more mb-4 mb-md-0">
							<a class="btn btn-warning mt-lg-5" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE </a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="card height-lg-523">
						<img src="<?php echo ASSETS.'img/backgrounds/musicbg.png' ?>">
						<div class="card-body">
							<h5 class="card-title">HEAD LINE/UP COMMING BRAND</h5>
							<p>Identitas dari ketiganya tersebut yang sangat ikonik bertemu dengan signature style dari Miracle Mates melalui beberapa lineup item, macam balaclava, safari hat, work jacket.</p>
						</div>
						<div class="btn-view-more mb-4 mb-md-0">
							<a class="btn btn-warning mt-lg-5" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section-portal mt-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-section d-flex gap-1 gap-lg-3">
						<h3>MUSIC</h3>
						<i class="bi bi-arrow-right-circle-fill"></i>
						<div>View All</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
		<div class="container height-lg-523 mb-5">
			<div class="row">
				<div class="col-12 col-lg-3">
					<div class="card height-lg-523">
						<img src="<?php echo ASSETS.'img/backgrounds/musicbg.png' ?>">
						<div class="card-body">
							<h5 class="card-title">HEAD LINE/UP COMMING BRAND</h5>
							<p>Identitas dari ketiganya tersebut yang sangat ikonik bertemu dengan signature style dari Miracle Mates melalui beberapa lineup item, macam balaclava, safari hat, work jacket.lineup item, macam balaclava, safari hat, work</p>
						</div>
						<div class="btn-view-more mb-4 mb-md-0">
							<a class="btn btn-warning mt-lg-5" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE </a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6">
					<div class="responsive height-lg-523">
						<img src="<?php echo ASSETS.'img/backgrounds/musicbg2.png' ?>" class="img-fluid">
						<div class="btn-view-more mb-4 mb-md-0">
							<a class="btn btn-warning mt-lg-5" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE </a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="card height-lg-523">
						<img src="<?php echo ASSETS.'img/backgrounds/musicbg.png' ?>">
						<div class="card-body">
							<h5 class="card-title">HEAD LINE/UP COMMING BRAND</h5>
							<p>Identitas dari ketiganya tersebut yang sangat ikonik bertemu dengan signature style dari Miracle Mates melalui beberapa lineup item, macam balaclava, safari hat, work jacket.</p>
						</div>
						<div class="btn-view-more mb-4 mb-md-0">
							<a class="btn btn-warning mt-lg-5" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="product-poin pt-5 pb-5" style="background:#0000008a;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-section d-flex gap-1 gap-lg-3 mb-4">
						<h2 class="fw-bold text-uppercase" style="letter-spacing: 10px;">FOR OUR ROYAL CUSTOMER</h2>
					</div>
				</div>
			</div>
			<hr style="color:white;">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-12">
					<div class="row">
					<?php foreach ($productpoin as $key => $prodpoin): ?>
						<?php if ($key <= 2): ?>
						<div class="col-lg-4">
							<div class="card card-product-poin">
								<img src="<?php echo BASEBACK.$prodpoin['image'] ?>" class="card-img-top" alt="<?php echo $prodpoin['produk_poin_title'] ?>">
								<span class="badge bg-warning text-dark">Points <?php echo $prodpoin['poin'] ?></span>
								<div class="card-body">
								    <h6 class="fw-bold text-uppercase"><?php echo $prodpoin['produk_poin_title'] ?></h6>
								</div>
								<a class="btn btn-warning border-radius-unset" href="<?php echo BASEURL.'product-points/'.$prodpoin['slug'] ?>"><i class="bi bi-arrow-right-circle-fill"></i> CLAIM NOW </a>
							</div>
						</div>
						<?php endif ?>
					<?php endforeach ?>
					</div>
				</div>
				<div class="col-lg-5 col-md-12" style="background-color: white;">
					<div class="position-relative card-descprod-poin" style="height:100%;">
						<h3 class="card-title fw-bold mt-3">Description</h3>
						<hr>
					    <p class="card-text">In the skatedeluxe Premium Club, you'll receive points through various activities, such as placing orders and product reviews. <br><br>There are two types of points: <br><br> Premium Club Points and Status Points. You can exchange your Premium Club Points for exclusive rewards. <br><br>Your Status Points will determine your Premium <strong>Club</strong> Status.</p>
					    <a href="#" class="btn btn-warning"><i class="bi bi-arrow-right-circle-fill"></i> Go to Product Poin</a>
					</div>
				</div>
			</div>
						<hr style="color:white;">

		</div>
	</section>
	<section class="email-subscribe bg-dark">
		<div class="row pt-4 pb-4 ps-3 pe-4 justify-content-end">
			<div class="title col-12 col-lg-7 text-end">
				<h5>Subscribe to our newsletter to receive special offer and first look at new products.</h5>
			</div>
			<div class="col-12 col-lg-5">
				<div class="d-flex gap-1 gap-lg-3">
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Full Name">
					</div>
					<button class="btn btn-warning">Subscribe</button>
				</div>
			</div>
		</div>
	</section>
</div>
