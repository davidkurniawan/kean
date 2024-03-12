
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
        
    <title>KEAN</title>

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
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">LATEST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">APPAREL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FOOTWEAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SKATEBOARDS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ACCESSORIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">BRANDS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">NEWS</a>
                </li>
            </ul>
            <form class="d-flex">
                <div class="btn-group option-header" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn "><i class="bi bi-search"></i></button>
                    <button type="button" class="btn "><i class="bi bi-person"></i></button>
                    <button type="button" class="btn "><i class="bi bi-cart"></i></button>
                </div>
            </form>
        </div>
    </div>
</nav>
