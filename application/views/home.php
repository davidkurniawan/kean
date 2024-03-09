<style type="text/css">
    .text-left {
        text-align: left;
    }
</style>
<?php //pre(cekPaketBestie()); ?>
<div id="carouselHome" class="carousel slide sectionFirst" data-bs-ride="false">
  <div class="carousel-indicators">
    <?php foreach ($banner as $key => $value): ?>
    <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="<?php echo $key ?>" class="active" aria-current="true" aria-label="Slide <?php echo $key ?>"></button>
    <?php endforeach ?>
  </div>
  <div class="carousel-inner">
    <?php foreach ($banner as $key => $value): ?>
    <div class="carousel-item active" style="background-image: url('<?php echo BACKENDURL.$value['image'] ?>')">
      <div class="carousel-caption inline">
        <div class="d-flex justify-content-between align-items-center flex-wrap h-100">
          <div class="text-center text-lg-start col-12 col-lg-4 order-2 order-lg-1 mt-2 mt-lg-0">
            <?php if ($value['page'] == "home"): ?>
            <img src="<?php echo ASSETS ?>img/logo.png" class="img-small"  loading="lazy"/>
            <br>
            <?php endif ?>
            <h5><?php echo $value['title'] ?></h5>
            <p><?php echo $value['description'] ?></p>
            <?php if ($value['page'] != "home"): ?>
            <div class="d-flex gap-2 mt-4">
              <a href="<?php echo BASEURL."profile#pills-point" ?>" class="btn btn-white flex-fill" type="button">Tukar Poin</a>
              <?php if (cekPaketBestie() == FALSE && sessionData('sessUser')==TRUE){ ?>
              <a href="<?php echo BASEURL.'produk/detail/paket-diary-bestie' ?>" class="btn btn-blue flex-fill">Shop Now</a>
               <?php } else { ?>
              <a href="<?php echo BASEURL.'produk' ?>" class="btn btn-blue flex-fill">Shop Now</a>
               <?php } ?>
            </div>
            <?php endif ?>
          </div>
          <div class="col-12 col-lg-8 order-1 order-lg-2 text-center mt-3 mt-lg-0">
          </div>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
<?php if (cekPaketBestie() == FALSE && sessionData('sessUser')==TRUE): ?>
<!-- PAKET PROMO -->
<div class="container-fluid content paket px-0 <?php // echo (sessionData('sessUser') == false || urisegment(1) == false) ? 'd-none' : 'section'; ?>">
  <div class="px-0 py-5">
    <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-0 pt-0 pt-lg-5 px-md-4">
        
        <div class="col-12">    
            <img src="<?php echo ASSETS ?>img/title/paket-promo.svg" class="img-title "/>
        </div>

        <div class="col-12 col-lg-5 img">
            <div style="background-image:url('<?php echo ASSETS.'img/paket-bestie.png' ?>')" class="asset"></div>
        </div>

        <div class="col-12 col-lg-6 px-0 px-md-5 mt-0 py-0 py-md-5 text-center text-lg-start">
            <h5><?php echo $paketBestie['nama_product'] ?></h5>
            <p>Only IDR <?php echo number_format($paketBestie['harga_product']) ?></p>
            <?php if (urisegment(1) == "reseller"){ ?>
                <a href='<?php echo BASEURL."produk/detail/paket-diary-bestie" ?>' class="btn btn-orange d-inline mx-2">Shop Now</a>
            <?php }else{ ?>
                <?php if (sessionData('sessUser')==TRUE) { ?>                                
                    <a href='#' data-bs-toggle="modal" data-bs-target="#registerDialog" class="btn btn-orange d-inline mx-2">Join Reseller</a>
                <?php } else { ?>
                    <a href='<?php echo BASEURL."produk/detail/paket-diary-bestie" ?>' class="btn btn-orange d-inline mx-2">Join Reseller</a>
                <?php } ?>
            <?php } ?>                                   
        </div>
    </div> 
  </div>
</div>
<?php endif ?>

<!-- OUR PRODUCT -->
<?php if (cekPaketBestie() == TRUE || sessionData('sessUser') == false): ?>
<div class="container-fluid content product px-0 <?php //echo ($_SESSION["is_login"] == true && $_SESSION["is_reseller"] == true) ? '' : 'section'; ?>">
  <div class="px-0 py-5 d-flex">
    <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-0 w-100">
        <img src="<?php echo ASSETS ?>img/title/our-product.svg" class="img-title"/>
        
        <div class="" style="width:100%;">
            <div class="row mx-auto my-auto justify-content-center products px-0" id="carouselStack" style="width:90%">
                <div id="recipeCarousel" class="carousel slide mx-0 col-12 col-lg-8" data-bs-ride="carousel" style="width:90%">
                    <div class="carousel-inner" role="listbox">
                        <?php foreach ($showallproduct as $key => $prod): ?>
                            <?php if ($key == 0){ ?>
                                <?php if ($prod['id_product'] != 89): ?>
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <a href="<?php echo BASEURL.'produk/detail/'.$prod['url_product']; ?>/<?php echo ($this->uri->segment(1) == "")?"home":"reseller" ?>">
                                    <div class="card">
                                        <a href="<?php echo BASEURL.'produk/detail/'.$prod['url_product'];  ?>/<?php echo ($this->uri->segment(1) == "")?"home":"reseller" ?>">
                                        <img src="<?php echo BACKENDURL.$prod['product_image_front'] ?>" class="card-img-top" alt="Product Alt" loading="lazy">
                                        </a>
                                        <span class="card-title mb-5"><?php echo $prod['nama_product'] ?></span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                                <?php endif ?>
                            <?php } else { ?>
                                <?php if ($prod['id_product'] != 89): ?>
                             <div class="carousel-item ">
                                <div class="col-md-4">
                                    <a href="<?php echo BASEURL.'produk/detail/'.$prod['url_product']; ?>/<?php echo ($this->uri->segment(1) == "")?"home":"reseller" ?>">
                                    <div class="card">
                                        <a href="<?php echo BASEURL.'produk/detail/'.$prod['url_product'] ?>/<?php echo ($this->uri->segment(1) == "")?"home":"reseller" ?>">
                                            <img src="<?php echo BACKENDURL.$prod['product_image_front'] ?>" class="card-img-top" alt="Product Alt" loading="lazy">
                                        </a>
                                        <span class="card-title mb-5"><?php echo $prod['nama_product'] ?></span>
                                    </div>
                                    </a>
                                </div>
                            </div>   
                                <?php endif ?>
                            <?php } ?>
                        <?php endforeach ?>
                    </div>
                    
                    <a class="carousel-control-prev carousel-control" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <a class="carousel-control-next carousel-control" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <a href="<?php echo (cekPaketBestie()) ? BASEURL.'produk' : ""; ?>" class="btn btn-pink-dark d-relative mt-2 mt-lg-5" type="button">Lihat Selengkapnya</a>
    </div>    
  </div>
</div>
<?php endif ?>
<!-- BEAUTY TIPS -->
<div class="container-fluid beauty px-0">
    <div class="content p-4 p-lg-5">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-0 px-md-4">
            <div class="col-12">
                <img src="<?php echo ASSETS ?>img/title/diary-news.png" class="img-title align-self-center mt-3"/>
            </div>

            <div class="col-12 col-lg-10 my-5 tips">
                    
                <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 g-4 g-lg-5">
                <?php foreach ($beautytips as $key => $beu): ?>
                    <div class="col">
                        <div class="card py-4 px-3">
                            <img src="<?php echo BACKENDURL.$beu['image'] ?>" class="card-img-top" alt="..." loading="lazy">
                            <div class="card-body text-left px-1 py-3">
                                <h5 class="card-title"><?php echo $beu['title'] ?></h5>
                                <p class="card-text text-left"><?php echo word_limiter($beu['description'],25); ?></p>
                            </div>
                            <div class="card-footer d-flex justify-content-between px-1">
                                <a href="<?php echo BASEURL.'diarynews/readmore/'.$beu['url_title'] ?>">Lihat Selengkapnya</a>
                                <a href=""><i class="bi bi-share"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                    <!-- <div class="col">
                        <div class="card h-100 py-4 px-3">
                            <img src="<?php // echo ASSETS ?>img/tips/tips-2.png" class="card-img-top" alt="..." loading="lazy">
                            <div class="card-body px-1 py-3">
                                <h5 class="card-title">Tips menggunakan parfume</h5>
                                <p class="card-text">Keep your skin clean and healthy. Hypoallergenic & vegan.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between px-1">
                                <a href="<?php // echo BASEURL.'beautytips/readmore' ?>">Lihat Selengkapnya</a>
                                <a href=""><i class="bi bi-share"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 py-4 px-3">
                            <img src="<?php // echo ASSETS ?>img/tips/tips-3.png" class="card-img-top" alt="..." loading="lazy">
                            <div class="card-body px-1 py-3">
                                <h5 class="card-title">Cara Exfoliating yang benar</h5>
                                <p class="card-text">Let our line of scented soy candles improve your mood.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between px-1">
                                <a href="<?php // echo BASEURL.'beautytips/readmore' ?>">Lihat Selengkapnya</a>
                                <a href=""><i class="bi bi-share"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-12">
                <a href="<?php echo BASEURL.'beautytips' ?>" class="btn btn-blue d-relative mt-0 mt-lg-3 mb-4 mb-lg-0" type="button">Lihat Semua Beauty Tips</a>
            </div>

        </div>
    </div>
</div>

<!-- DIARY BESTIE -->
<div class="container-fluid diary px-0">
    <div class="content p-4 p-lg-5">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-0 px-md-4">
            <div class="col-12">
                <img src="<?php echo ASSETS ?>img/title/diary-bestie.svg" class="img-title align-self-center mt-3" loading="lazy"/>
            </div>

            <div class="col-12 col-lg-10 my-5 tips">
                <div class="row row-cols-1 row-cols-xl-3 g-4 g-lg-5">
                    <div class="col">
                        <div class="card h-100 py-4 px-3 px-md-5 ig">
                            <img src="<?php echo ASSETS ?>img/products/items-2.png" class="img-item" alt="..." loading="lazy">
                            <div class="d-flex flex-wrap">
                                <div class="d-flex justify-content-between w-100">
                                    <i class="bi bi-instagram" alt="..."></i>
                                    <img src="<?php echo ASSETS ?>img/logo.png" class="img-brand" alt="..." loading="lazy">
                                </div>                        
                                <div class="d-flex justify-content-center w-100">
                                <div id="carouselInstagram" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($instagram as $key => $ig){ ?>
                                            <?php if ($key == 0){ ?>
                                        <div class="carousel-item active">
                                            <a href="<?php echo $ig['url'] ?>" target="_blank">
                                                <div style="background-image: url('<?php echo BACKENDURL.$ig['thumbnail'] ?>')" class="d-block" alt="..."></div>
                                            </a>
                                        </div>
                                        <?php }else { ?>
                                        <div class="carousel-item">
                                            <a href="<?php echo $ig['url'] ?>" target="_blank">
                                                <div style="background-image: url('<?php echo BACKENDURL.$ig['thumbnail'] ?>')" class="d-block" alt="..."></div>
                                            </a>
                                        </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <button class="carousel-control-prev carousel-control" type="button" data-bs-target="#carouselInstagram" data-bs-slide="prev">
                                        <i class="bi bi-chevron-left"></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next carousel-control" type="button" data-bs-target="#carouselInstagram" data-bs-slide="next">
                                    <i class="bi bi-chevron-right"></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>        
                                </div>        
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 py-4 px-3 px-md-5 tt">
                            <img src="<?php echo ASSETS ?>img/products/items-3.png" class="img-item" alt="..." loading="lazy">
                            <div class="d-flex flex-wrap">
                                <div class="d-flex justify-content-between w-100">
                                    <i class="bi bi-tiktok" alt="..."></i>
                                    <img src="<?php echo ASSETS ?>img/logo.png" class="img-brand" alt="..." loading="lazy">
                                </div>                        
                                <div class="d-flex justify-content-center w-100">
                                <div id="carouselTikTok" class="carousel slide w-100" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($tiktok as $key => $ig){ ?>
                                            <?php if ($key == 0){ ?>
                                        <div class="carousel-item active">
                                            <a href="<?php echo $ig['url'] ?>" target="_blank">
                                                <div style="background-image: url('<?php echo BACKENDURL.$ig['thumbnail'] ?>')" class="d-block" alt="..."></div>
                                            </a>
                                        </div>
                                        <?php }else { ?>
                                        <div class="carousel-item">
                                            <a href="<?php echo $ig['url'] ?>" target="_blank">
                                                <div style="background-image: url('<?php echo BACKENDURL.$ig['thumbnail'] ?>')" class="d-block" alt="..."></div>
                                            </a>
                                        </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <button class="carousel-control-prev carousel-control" type="button" data-bs-target="#carouselTikTok" data-bs-slide="prev">
                                        <i class="bi bi-chevron-left"></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next carousel-control" type="button" data-bs-target="#carouselTikTok" data-bs-slide="next">
                                    <i class="bi bi-chevron-right"></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>        
                                </div>        
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 py-4 px-3 px-md-5 yt">
                            <img src="<?php echo ASSETS ?>img/products/items-5.png" class="img-item" alt="..." loading="lazy">
                            <div class="d-flex flex-wrap">
                                <div class="d-flex justify-content-between w-100">
                                    <i class="bi bi-youtube" alt="..."></i>
                                    <img src="<?php echo ASSETS ?>img/logo.png" class="img-brand" alt="..." loading="lazy">
                                </div>            
                                <div class="d-flex justify-content-center flex-wrap w-100">
                                <div id="carouselYoutube" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a href="">
                                            <div style="background-image: url('<?php echo ASSETS ?>img/diary/yt.png')" class="d-block" alt="..."></div>
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="">
                                            <div style="background-image: url('<?php echo ASSETS ?>img/banner/2.png')" class="d-block" alt="..."></div>
                                            </a>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev carousel-control" type="button" data-bs-target="#carouselYoutube" data-bs-slide="prev">
                                        <i class="bi bi-chevron-left"></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next carousel-control" type="button" data-bs-target="#carouselYoutube" data-bs-slide="next">
                                    <i class="bi bi-chevron-right"></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>        
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php 
     if($this->uri->segment(1) == "reseller") {
        include("components/point.php");
    }else{
        if (sessionData('sessUser') == false) {
            echo '<div class="py-5 my-5">';
            include("components/join-reseller-home.php");
            echo '</div>';
        }
    } 
?>