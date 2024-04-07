<section class="search-title mt-5 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>SEARCH FOR YOU <b class="text-uppercase"><?php echo $keyword ?></b></h1>
				<hr>
			</div>
		</div>
	</div>
</section>
<section class="search-result">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>RESULT (<?php echo $count ?>)</h2>
			</div>
		</div>
		<div class="row result-product product">
			<?php foreach ($result as $key => $produk){ ?>
				<div class="col-lg-3 col-md-4 col-6 p-4">
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