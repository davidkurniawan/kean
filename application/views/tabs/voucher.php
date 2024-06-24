<div class="container-fluid">
	<div class="row">
		<?php foreach ($productpoin as $key => $prodpoin): ?>
						<?php if ($key <= 2): ?>
			<div class="col-lg-4 col-md-12">
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