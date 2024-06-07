<div class="main pt-5" style="background:black;">
	<section class="detail-prod-poin ">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-uppercase fw-bold text-white"><?php echo $product['produk_poin_title'] ?></h4>
					<hr style="border-color: white;opacity: unset;">
				</div>
				
			</div>
			<div class="row mt-5">
				<div class="col-lg-6 col-md-12">
					<div class="image-detail text-center ">
						<img src="<?php echo BASEBACK.$product['image'] ?>" class="img-fluid" style='height: 450px;'>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="note-prod-poin text-white mb-5">
						<h5 class="fw-bold"> Exchange With</h5>
						<ul>
							<li>Points</li>
						</ul>
					</div>
					<div class="note-prod-poin text-white mb-5">
						<h5 class="fw-bold"> Category</h5>
						<ul>
							<li><?php echo $product['status_poin'] ?></li>
						</ul>
					</div>
					<div class="note-prod-poin text-white mb-5">
						<h5 class="fw-bold"> Send By</h5>
						<ul>
							<li>Email Or Ekspedisi</li>
						</ul>
					</div>
					
					<div class="note-prod-poin text-white position-relative mt-5">
						<h4 class="fw-bold">LOG IN TO GET THIS REWARD</h4>
						<button class="btn btn-warning">CLAIM NOW</button>
					</div>

					<div class="note-prod-poin text-white position-relative mt-5">
						<h5 class="fw-bold text-uppercase">Description</h5>
						<hr class="hr-intcode">
						<p><?php echo $product['description'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>