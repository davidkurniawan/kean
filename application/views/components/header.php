<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="index,follow"/>
    <meta name="robots" content="max-image-preview:large">
    <meta name="language" content="en"/>
    <meta name="publisher" content=""/>
    <meta name="country" content="id"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <base href=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- Primary Meta Tags -->
    <meta name="title" content="">
    <meta name="description" content="">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?php echo ASSETS ?>img/metashare.png">
    
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo ASSETS ?>css/variables.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS ?>css/base.css" rel="stylesheet">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS.'css/slick/slick-themes.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link href="<?php echo ASSETS ?>plugins/swiper/swiper-bundle.min.css" rel="stylesheet">
    <title>SHOP</title>

</head>

<body>

<!-- Modal -->
<div class="modal fade" id="registerDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerDialogLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-join">
    <div class="modal-content">   
        <div class="modal-header">
            <button type="button" class="btn-close pull-right" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body pb-5">
            <?php loadview("components/join-reseller"); ?>
        </div>
    </div>
  </div>
</div>

<!-- MODAL SELECT ADDRESS -->
<div class="modal fade" id="addressesDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addressesDialogLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-join">
    <div class="modal-content">   
        <div class="modal-header">
            <button type="button" class="btn-close pull-right me-" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body pb-5">
            <?php loadview("components/address-list"); ?>
        </div>
    </div>
  </div>
</div>

<!-- MODAL SELECT BRANCH -->
<div class="modal fade" id="branchDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="branchDialogLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-join">
    <div class="modal-content">   
        <div class="modal-header">
            <button type="button" class="btn-close pull-right" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body pb-5">
            <?php loadview("components/branch-list"); ?>
        </div>
    </div>
  </div>
</div>

<!-- MODAL ADD ADDRESS -->
<div class="modal fade" id="addAddressesDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAddressesDialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-join">
    <div class="modal-content">   
        <div class="modal-header">
            <button type="button" class="btn-close pull-right me-" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body pb-5">
            <?php loadview("components/address-add"); ?>
        </div>
    </div>
  </div>
</div>

<?php 
/*
<nav class="stick-header <?php echo (isset($navbar)) ? $navbar : '';?>">
    <small>Subscribe now and get 10% off your purchase. Limited time only.</small>
</nav>
*/
 ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASEURL ?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL.'latest' ?>">LATEST</a>
                </li>
                <?php foreach (kategori() as $key => $kat): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link <?php if (!empty(subkategori($kat['id_product_category']))): ?> dropdown-toggle <?php endif ?>"
                    <?php if (!empty(subkategori($kat['id_product_category']))): ?>
                         role="button" data-bs-toggle="dropdown" aria-expanded="true" 
                    <?php endif ?>
                        href="<?php echo BASEURL.'product/category/'.$kat['slug'] ?>" >
                    <?php echo strtoupper($kat['name']) ?>
                    </a>
                    <?php if (!empty(subkategori($kat['id_product_category']))): ?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach (subkategori($kat['id_product_category']) as $key => $sub): ?>
                            <li><a class="dropdown-item" href="<?php echo BASEURL.'product/category/'.$kat['slug'].'/'.$sub['slug'] ?>"><?php echo strtoupper($sub['name']) ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </li>
                <?php endforeach ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL.'brands' ?>">BRANDS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL.'news' ?>">NEWS</a>
                </li>
            </ul>
            <form class="d-flex" action='<?php echo BASEURL.'search' ?>' method='GET'>
                <input type="text" class="form-control" name="keyword" id="searchYouWantText" placeholder="SEARCH KEY">
                <div class="btn-group option-header" role="group" aria-label="Basic  example">
                    <button type="button" class="btn" id="btnsearchYouWant"><i class="bi bi-search"></i></button>
                    <a href="<?php echo BASEURL.'profile' ?>" class="btn d-flex"><i class="bi bi-person pl-3" style="    padding-right: 6px;"></i>  <?php echo $this->session->userdata('sessNamaUser') ?></a>
                    <a href="<?php echo BASEURL.'cart' ?>" class="btn "><i class="bi bi-cart"></i></a>
                </div>
            </form>
        </div>
    </div>
</nav>
<div class="iso-marquee-linkwrap">    
    <div class="iso-marquee--long iso-marquee" style="--tw:228ch; --ad:20s;display: flex;">       
        <span class="me-3">RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> RUNNING TEXT PROMO <i clas me-2 ms-2s="bi bi-star-fill"></i> RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i>  RUNNING TEXT PROMO <i class="bi bi-star-fill me-2 ms-2"></i> </span>    
    </div> 
</div>