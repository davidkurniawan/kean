<style type="text/css">
	.background-image-latest {
	    background-image: url('<?php echo ASSETS.'img/banner/streetwear02-big-fix.webp' ?>');
	}
</style>
<div class="main">
	<section class="breadcrum-custom mt-4 mb-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Latest</li>
                </ol>
            </nav>
        </div>
    </section>
	<section class="background-banner-product-list">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="position-relative">
						<div class="background-image-latest">
							<div class="text p-3 p-lg-5">
								<div class="display-text ">
									<h4>NEW URBAN STYLE GOODS</h4>
									<h4>CLOTHING & MORE</h4>
									<hr>
									<p>The right clothing can help you express your personal style in your day to day life or during a session. In the skatedeluxe online skate shop, you'll find a lot of new t-shirts, long sleeves, sweatshirts, hoodies, jackets and pants for a sporty, urban style.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="sc-home-video py-main mt-5">
	    <div class="container">
	        <div class="video-youtube">
	            <div class="embed-responsive embed-responsive-16by9">
	                <div class="wrapper-thumbnail" role="button" tabindex="0">
	                    <div style="background-image:url('<?php echo ASSETS.'img/banner/skatevideo.jpeg' ?>');" alt="youtube-thumbnail" class="thumbnail-youtube" quality="75" style="object-fit:cover"></div>
	                    <div class="wrapper-button">
	                        <img src="https://wethefest.com//_next/static/media/icon_play.c76ea39b.svg" alt="play-btn" class="img-fluid" quality="75" >
	                    </div>
	                </div>
	                <img src="https://wethefest.com//img/bg/img_bg-home-video.webp" alt="" class="bg-border-video" quality="75" sizes="(max-width: 768px) 55vw, (max-width: 1200px) 50vw, 65vw" style="inset:0;width:100%;height:100%;position:absolute">
	            </div>
	        </div>
	    </div>
	</section>
	<section class="sorting-product mt-5">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			    <div class="container-fluid">
		            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		                <li class="nav-item dropdown">
		                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sorting </a>
		                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		                        <li>
		                            <a class="dropdown-item" href="#">POPULAR</a>
		                        </li>
		                        <li>
		                            <a class="dropdown-item" href="#">NEW IN STOCK</a>
		                        </li>
		                        <li>
		                            <a class="dropdown-item" href="#">HIGHEST PRICE <i class="bi bi-arrow-up"></i></a>
		                        </li>
		                        <li>
		                            <a class="dropdown-item" href="#">LOWEST PRICE <i class="bi bi-arrow-down"></i></a>
		                        </li>
		                    </ul>
		                </li>
		            </ul>
		            <form class="d-flex">
		                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		                <button class="btn btn-outline-success" type="submit">Search</button>
		            </form>
			    </div>
			</nav>
		</div>
	</section>
	<section class="product-list product">
		<div class="container-fluid">
			<div class="row">
				<?php for ($i=0; $i < 8; $i++) { ?>
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
			<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
		</div>
	</section>
</div>