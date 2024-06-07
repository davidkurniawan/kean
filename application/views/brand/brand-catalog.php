<section class="breadcrum-custom mt-4 mb-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASEURL ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASEURL.'brands' ?>">Brands</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $brand['brand_name'] ?></li>
                </ol>
            </nav>
        </div>
    </section>
<section class="latest-arrival mt-0 mt-lg-3 pt-2 pt-lg-3">
	<div class="container ">
		<div class="row">
			<div class="col-lg-7">
				<div class="title-section">
					<div class="image-brand" style="width:150px;">
						<img src="<?php echo BASEBACK.$brand['image'] ?>" class="img-fluid">
					</div>
					<h5 class="fw-bold mt-3 text-capitalize"><?php echo $brand['nama'] ?></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
			<div class="col-lg-12">
				<hr>
			</div>
		</div>
		
	</div>
	<div class="width-overflow product ms-lg-5 ">
			<div class="d-flex">
				<?php foreach ($brandcatalog as $key => $produk){ ?>
					<div class="col-lg-3 p-1 p-lg-4">
						<div class="card">
							<a href="<?php echo BASEURL.'product/detail/'.$produk['url_product'] ?>">
								<img src="<?php echo BASEBACK.$produk['product_image_front'] ?>" class="img-fluid"> 
								<div class="card-body">
									<h5 class="card-title text-capitalize"><?php echo $produk['nama'] ?></h5>
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