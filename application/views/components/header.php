
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <meta name="title" content="-">
    <meta name="description" content="-">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="-">
    <meta property="og:title" content="-">
    <meta property="og:description" content="-">
    <meta property="og:image" content="<?php echo ASSETS ?>img/metashare.png">
    
    <link rel="shortcut icon" href="<?php echo ASSETS ?>img/logo.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo ASSETS ?>img/logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo ASSETS ?>css/base.css" rel="stylesheet">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
    <title> <?php echo (empty($this->uri->segment(1))) ? "HOME":strtoupper($this->uri->segment(1)) ?> | Diary </title>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KNXBBNW');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11209121128"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11209121128'); </script>
<!-- Event snippet for Website lead conversion page --> 
<script> gtag('event', 'conversion', {'send_to': 'AW-11209121128/batKCKqtr6oYEOi69uAp'}); </script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNXBBNW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++
)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=i+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};
    
      ttq.load('CI4IB4RC77U4TTM9CEI0');
      ttq.page();
    }(window, document, 'ttq');
</script>

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

<nav class="header pb-2 pb-sm-1 pt-4 <?php if(isset($navbar)) echo $navbar; ?>">
  <div class="background"></div>
  
  <div class="container d-flex mb-0 mb-sm-2 justify-content-center">    
    <a href="<?php echo BASEURL ?>" class="logo"><img src="<?php echo ASSETS ?>img/logo.png" class="navbar-logo" loading="lazy"/></a>
  </div>
  <div class="navbar navbar-expand-lg">
    <div class="container gap-0 gap-lg-2">    
        <button class="order-1 navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            <i class="bi bi-x-lg"></i>
        </button>  
        <div class="order-3 order-lg-2 collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 gap-1 gap-lg-3 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="<?php if(urisegment(1) == "reseller" || urisegment(1) == "produk")  echo BASEURL.'reseller'; else echo BASEURL; ?>">Home</a>
                </li>
                <li class="nav-item <?php if(urisegment(1) == "reseller" || urisegment(1) == "produk") echo 'd-none'; ?>">
                <a class="nav-link" href="<?php echo BASEURL.'beautytips' ?>">Diary News</a>
                </li>
                <li class="nav-item <?php if(urisegment(1) == "reseller" || urisegment(1) == "produk") echo 'd-none'; ?>">
                <a class="nav-link" href="<?php echo BASEURL.'reseller' ?>">Reseller</a>
                </li>
                <li class="nav-item <?php if(urisegment(1) != "reseller" && urisegment(1) != "produk") echo 'd-none'; ?>">
                    <a class="nav-link" href="
                    <?php if (cekPaketBestie() == FALSE){ ?>
                        <?php echo BASEURL.'produk' ?>
                    <?php }else if(sessionData('sessUser') == false) { ?>
                        <?php echo BASEURL.'produk' ?>
                    <?php } ?>
                ">Product</a>
                </li>

                <?php if (sessionData('sessUser')){ ?>
                <li class="nav-item dropdown onlymobile btn btn-<?php if(isset($navbar) == true) echo $navbar; else echo 'orange';?>">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hai, <?php echo sessionData('sessNamaUser') ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo BASEURL.'profile' ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASEURL.'login/logout' ?>">Logout</a></li>
                  </ul>
                </li>
                <?php } ?>
            </ul>

            <form class="d-flex flex-fill mx-0 mx-lg-4 my-4 my-lg-0" role="search">
                <div class="input-group form-search px-0 px-xl-5">
                    <input type="search" class="form-control input-search" placeholder="Cari Promo" aria-label="Cari Promo" aria-describedby="button-search">
                    <button class="btn btn-search" type="button" id="button-search"><i class="bi bi-search"></i></button>
                </div>
            </form>

            <div class="button-group">
                <div class="d-flex gap-2">
                    <button class="<?php  if(sessionData('sessUser') == true || urisegment(1) == "reseller") echo 'd-none'; ?> btn btn-<?php if(isset($navbar) == true) echo $navbar; else echo 'orange';?> flex-fill" type="button" data-bs-toggle="modal" data-bs-target="#registerDialog">Join Reseller</button>
                    <?php if (sessionData('sessUser')){ ?>
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hai, <?php echo sessionData('sessNamaUser') ?>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo BASEURL.'profile' ?>">Profile</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASEURL.'login/logout' ?>">Logout</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                    <?php } else { ?>
                        <a href="<?php echo BASEURL.'login' ?>" class="<?php if(sessionData('sessUser') == true || urisegment(1) != "reseller") echo 'd-none'; ?> btn btn-<?php if(isset($navbar) == 1) echo $navbar; else echo 'orange';?> flex-fill" type="button" >Login / Register</a>
                    <?php } ?>
                    <!-- <button class="btn btn-white flex-fill" type="button">Login Reseller</button> -->
                </div>                
            </div>
        </div>
        <div class="button-group order-2 order-lg-3 d-inline-flex">
            <?php if (sessionData('sessUser') == true): ?>
            <a href="<?php echo BASEURL.'cart' ?>" class="position-relative btn-bag">
                <i class="bi bi-bag"></i>
                <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                    <?php echo count(shoopingcart()) ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
            <?php endif ?>
            
            <?php 
            /*
            if($_SESSION["is_login"] == true) {         
                include("notifications.php");
                echo '<a href="index.php?page=profile&navbar=white#pills-profile" class="position-relative btn-bag">
                        <i class="bi bi-person-circle"></i>
                        <span class="word-small"><small>Hi,</small>Belle</span>
                    </a>';
            } 
            */
            ?>
                   
        </div>
        
    </div>
  </div>
</nav>