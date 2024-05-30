<?php foreach ($showallproduct as $key => $produk){ ?>
	<div class="col-lg-3 col-md-4 col-6 p-1 p-lg-4">
		<div class="card">
			<a href="<?php echo BASEURL.'product/detail/'.$produk['url_product'] ?>">
				<img src="<?php echo BASEBACK.$produk['product_image_front'] ?>" class="img-fluid"> 
				<div class="card-body">
					<h5 class="card-title"><?php echo $produk['nama'] ?></h5>
					<p><?php echo $produk['nama_product'] ?> T-Shirt</p>
					<p><?php echo rupiah($produk['harga']) ?></p>
				</div>
			</a>
		</div>

		<a href="<?php echo BASEURL.'product/detail/'.$produk['url_product'] ?>" class="btn btn-warning" type="button"><i class="bi bi-arrow-right-circle-fill"></i> MORE FROM BRAND</a>
	</div>
<?php } ?>