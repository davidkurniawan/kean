<style type="text/css">
	.background-image-latest {
	    background-image: url('<?php echo BASEBACK.$subkategori['image'] ?>');
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
	<?php $this->load->view('components/filter',TRUE) ?>
	<section class="product-list product">
		<div class="container-fluid">
			<div class="row active" id="dinamyc-product">
				
			</div>
			<div class="text-center justify-content-center" id="ajax-loader">
				<h5>Please Wait ...</h5>
			</div>
		</div>
	</section>
</div>