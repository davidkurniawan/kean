<?php 
	$alphabet = range('a', 'z');
 ?>
<div class="main">

	<section class="breadcrum-custom mt-4 mb-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASEURL ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Brands</li>
                </ol>
            </nav>
        </div>
    </section>
	<section class="brands mt-5">
		<div class="container mb-5">
			<h1 class="fw-bold" style="font-size: 1.5rem;">BRANDS</h1>
			<hr>
			<p>The best and most famous skateboard and streetwear brands – all in one list!</p>
			<nav aria-label="...">
			  <ul class="pagination pagination-md" style="flex-flow: wrap;">
				<?php foreach ($alphabet as $letter) { ?>
				    <li class="page-item me-2 mb-2"><a class="page-link text-uppercase fw-bold" style="color:black" href="<?php echo BASEURL.'brands' ?>#letter-<?php echo $letter ?>"><?php echo $letter ?></a></li>
				<?php } ?>
			  </ul>
			</nav>
		</div>
		<div class="container">
			<div class="title-brands">
				<?php foreach ($alphabet as $letter) { ?>
				<h5 class="fw-bold text-uppercase" id="letter-<?php echo $letter ?>"><?php echo $letter ?></h5>
				<hr>
				<div class="row mb-3" >
					<?php foreach (checkBrandAlphabet($letter) as $key => $brands): ?>
						<div class="col-lg-4">
							<div class="sort"><a href="<?php echo BASEURL.'brands/'.strtolower($brands['brand_name']) ?>" class="text-capitalize"><?php echo $brands['brand_name'] ?> <em>(<?php echo checkProductBrand($brands['id_administrator']) ?>)</em></a></div>
						</div>
					<?php endforeach ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
</div>