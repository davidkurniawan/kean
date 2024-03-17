<style type="text/css">
</style>
<div class="main">
	<section class="home-banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-12 mb-3">
					<div class="banner-primary">
						<img src="<?php echo ASSETS.'img/banner/banner1.png' ?>" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-3 col-sm-12">
					<div class="row">
						<div class="col-6 col-lg-12 banner-second one mb-2 ">
							<img src="<?php echo ASSETS.'img/banner/banner2.png' ?>" class="img-fluid">
						</div>
						<div class="col-6 col-lg-12 banner-second two">
							<img src="<?php echo ASSETS.'img/banner/banner2.png' ?>" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="brand">
		<div class="container">
			<div class="slick-brand" data-slick='{"slidesToShow": 7, "slidesToScroll": 1}'>
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
	<section class="latest-arrival mt-5 pt-5">
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
					<?php for ($i=0; $i < 10; $i++) { ?>
						<div class="col-lg-3 p-4">
							<div class="card">
								<img src="<?php echo ASSETS.'img/product/one.jpg' ?>">
								<div class="card-body">
									<h5 class="card-title">Brand Name</h5>
									<p>Product/Article Name</p>
									<p>Price</p>
								</div>
							</div>

							<a href="<?php echo BASEURL.'product' ?>" class="btn btn-warning" type="button"><i class="bi bi-arrow-right-circle-fill"></i> MORE FROM BRAND</a>
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
					<?php for ($i=0; $i < 10; $i++) { ?>
						<div class="col-lg-3 p-4">
							<div class="card">
								<img src="<?php echo ASSETS.'img/product/one.jpg' ?>">
								<div class="card-body">
									<h5 class="card-title">Brand Name</h5>
									<p>Product/Article Name</p>
									<p>Price</p>
								</div>
							</div>

							<a class="btn btn-warning" type="button"><i class="bi bi-arrow-right-circle-fill"></i> VIEW MORE ITEM</a>
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

