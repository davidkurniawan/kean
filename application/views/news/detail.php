<style type="text/css">
	.overlay {
		background: linear-gradient(to right, #1b272c 0%, rgba(27, 39, 44, 0) 40%, rgba(27, 39, 44, 0) 60%, #1b272c 100%);
		position: absolute;
		top: 0;
		width: 100%;
		height: 100%;
	}
	.banner-news-detail {
		position: relative;
	}
	.news-title {
		color: white;
		text-shadow: 0px 0px 9px #ecf2cd, 0px 4px 5px #56584f, 0px 0px 4px #323620;
		width: 100%;
		position: absolute;
		top: 50%;
		margin-left: auto;
		margin-right: auto;
	}
	.news-title h1 {
		margin-right: 10%;
		margin-left: 10%;
	}
	.bagan-desc-detail {
		width: 90%;
		background: whitesmoke;
		position: relative;
		top: -50px;
	}
	.bagan-desc-detail .border-left {
		border-left: 8px solid #406372;
		padding-left: 15px;
		margin-top: 15px;
	}
	.date-news .share-social {
		flex-direction: row;
		flex-wrap: nowrap;
		justify-content: flex-start;
		align-items: center;
	}
	.date-news .border-date.share-social {
		border-top: 1px solid black;
		border-bottom: 1px solid black;
		padding: 5px;
		margin-top: 20px;
	}
	.date-news .share-social .date {
		width: 20%;
	}
	.date-news .share-social .icon-social {
		width: 80%;
		text-align: right;
	}
	.date-news .share-social .icon-social a {
		border-radius: unset;
		background: #65696c;
		color: white;
	}
</style>
<section class="banner-news-detail">
	<div class="overlay"></div>
	<div class="banner-image">
		<img src="http://localhost/ems/images/category/shoes-desktop2.webp" style="width:100%">
	</div>
	<div class="news-title text-center">
		<h1 class="fw-bold"><?php echo $post['title'] ?></h1>
	</div>
</section>
<section class="desc-news-detail justify-content-center d-flex">
	<div class="bagan-desc-detail">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					<div class="border-left kesimpulan">
						<h5>
							<strong>
								<?php echo $post['simple_description'] ?>
							</strong>
						</h5>
					</div>
					<div class="date-news ">
						<div class="border-date share-social d-flex">
							<div class="date">
								<strong><?php echo date('d F, Y',strtotime($post['created_date'])) ?></strong>
							</div>
							<div class="icon-social float-end">
								<a href="" class="btn btn-info"><i class="bi bi-instagram"></i></a>
								<a href="" class="btn btn-info"><i class="bi bi-twitter-x"></i></a>
								<a href="" class="btn btn-info"><i class="bi bi-facebook"></i></a>
								<a href="" class="btn btn-info"><i class="bi bi-whatsapp"></i></a>
							</div>
						</div>
					</div>
					<div class="description-news mt-5">
						<?php echo $post['description'] ?>
					</div>
				</div>
				<div class="col-lg-3 p-5-5  custom-border">
		            <div class="side-entry ms-2">
		                <div class="border-top">
		                  <div class="title">ALL ABOUT</div>
		                </div>
		                <div class="list-entry">
		                  <ul>
		                    <li>Shop Wiki</li>
		                    <li>Shop Trick Tips</li>
		                  </ul>
		                </div>
		            </div>
		            <div class="side-entry ms-2">
		                <div class="border-top">
		                  <div class="title">POPULAR POST</div>
		                </div>
		                <div class="list-entry">
		                  <ul>
		                    <li>Shop Wiki</li>
		                    <li>Shop Trick Tips</li>
		                  </ul>
		                </div>
		            </div>
		          </div>
			</div>
		</div>
	</div>
</section>