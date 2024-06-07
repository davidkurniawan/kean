<div class="main" style="background: black;color: white;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-section d-flex gap-1 gap-lg-3 mb-4">
					<h2 class="fw-bold text-uppercase mt-5" style="letter-spacing: 10px;">BECOME OUR ROYAL CUSTOMER</h2>
				</div>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				    <div class="container-fluid">
				            <ul class="navbar-nav">
				                <li class="nav-item">
				                    <a class="nav-link fw-bold active" aria-current="page" href="#">HOW TO GET</a>
				                </li>
				                <li class="nav-item">
				                    <a class="nav-link fw-bold" href="#">RULES</a>
				                </li>
				            </ul>
				    </div>
				</nav>
			</div>
		</div>
		<hr style="color:white;">
	</div>
	<section class="banner product-points">
		<div class="banner-item-points">
			<div class="image">
				<img src="">
				<div class="position-relative">
					<div class="image-banner-points" style="background-image: url('<?php echo BASEBACK.$banner['image'] ?>');">
						<h3 class="text-uppercase fw-bold"><?php echo $banner['description'] ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="how-get-points mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="fw-bold">THIS IS HOW IT WORKS!</h2>
				</div>
				<hr>
				<div class="col-lg-4 col-md-12">
					<div class="card-rules-points p-4">
						<h5><i class="bi bi-record-circle-fill"></i> REGISTER YOUR ACCOUNT</h5>
						<div class="position-relative">
							<i class="bi bi-caret-right-fill"></i>
						</div>
						<p>Become a skatedeluxe Premium Club member now for free and get exclusive promotions and benefits.</p>
					</div>
					
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="card-rules-points p-4">
						<h5><i class="bi bi-record-circle-fill"></i> COLLECT POINTS</h5>
						<div class="position-relative">
							<i class="bi bi-caret-right-fill"></i>
						</div>
						<p>You can collect Premium Club Points and Status Points by ordering, product reviews and other activities.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="card-rules-points p-4">
						<h5><i class="bi bi-record-circle-fill"></i> GET REWARDS & BENEFITS</h5>
						<p>You can exchange your Premium Club Points for exclusive rewards and get exciting benefits for your Status Points.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="product-item">
		<div class="container">
			<div class="row">
				<?php foreach ($product as $key => $prod): ?>
					<div class="col-lg-3">
						<div class="points-item">
							<a href="<?php echo BASEURL.'product-points/'.$prod['slug'] ?>">
								<div class="card">
									<img src="<?php echo BASEBACK.$prod['image'] ?>">
								</div>
								<div class="title text-center">
									<h5 class="fw-bold text-uppercase mt-3 mb-3 text-white"><?php echo $prod['produk_poin_title'] ?></h5>
									<p class="text-white"><?php echo $prod['poin'] ?> Points</p>
								</div>
								</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.banner-item-points').slick();
	});
</script>