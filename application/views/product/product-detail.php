
<div class="main">
    <section class="breadcrum-custom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Apparel</a></li>
                    <li class="breadcrumb-item"><a href="#">Item</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Article Name</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="d-flex">
                        <div class="product-pic-zoom">
                             <a href="<?php echo ASSETS.'img/product/product1.webp' ?>" class="glightbox preview-link">
                                <img class="<?php echo ASSETS.'img/product/product1.webp' ?>" class="img-fluid" src="<?php echo ASSETS.'img/product/product1.webp' ?>" alt="">
                             </a>
                        </div>
                        <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                            <div class="product-thumbs-track">
                                <div class="pt active" data-imgbigurl="<?php echo ASSETS.'img/product/product1.webp' ?>"><img class="img-fluid" src="<?php echo ASSETS.'img/product/product1.webp' ?>" alt="">
                                </div>
                                <div class="pt" data-imgbigurl="<?php echo ASSETS.'img/product/product2.webp' ?>"><img class="img-fluid" src="<?php echo ASSETS.'img/product/product2.webp' ?>" alt="">
                                    <a href="<?php echo ASSETS.'img/product/product2.webp' ?>" class="glightbox preview-link"></a>
                                </div>
                                <div class="pt" data-imgbigurl="<?php echo ASSETS.'img/product/product3.webp' ?>"><img class="img-fluid" src="<?php echo ASSETS.'img/product/product3.webp' ?>" alt="">
                                    <a href="<?php echo ASSETS.'img/product/product3.webp' ?>" class="glightbox preview-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="product-description-card">
                        <div class="product-title">POLAR RIDER T-SHIRT (BLACK)</div>
                        <div class="product-price"><div class="currency me-2">Rp</div><div class="value">245.000</div></div>
                        <hr>
                            <div class="fw-size-choose">
                                <div class="color mb-2">COLORS</div>
                                <div class="sc-item">
                                    <input type="radio" name="sc" id="xs-size">
                                    <label for="xs-size" style="background:black;"></label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="sc" id="s-size">
                                    <label for="s-size" style="background:grey;"></label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="sc" id="m-size" checked="">
                                    <label for="m-size" style="background:red;"></label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="sc" id="l-size">
                                    <label for="l-size" style="background:orange;"></label>
                                </div>
                                <div class="sc-item disable">
                                    <input type="radio" name="sc" id="xl-size" disabled="">
                                    <label for="xl-size" style="background:white;"></label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="sc" id="xxl-size">
                                    <label for="xxl-size" style="background:navajowhite;"></label>
                                </div>
                            </div>
                        <hr>

                        <div class="fw-size">
                            <div class="size mb-2">SIZE</div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Please Choose Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>
                            <div class="size-chart-info mt-4">
                                <a href="" class="btn btn-dark">Size Chart Info</a>
                            </div>
                        </div>

                        <div class="fw-quantity mt-4 d-flex">
                            <div class="number-quantity">
                                <div class="number">
                                    <input type="hidden" value="1" id="totalJumlah">
                                    <span class="minus-bestie" data-rowid="89" data-price="105200">-</span>
                                    <input type="text" value="1" class="totalkeun" id="qty89" data-price="105200" data-rowid="89" readonly="">
                                    <span class="plus-bestie" data-rowid="89" data-price="105200">+</span>
                                </div>
                            </div>
                            <div class="add-to-cart ms-4">
                                <button class="btn btn-warning ps-5 pe-5 btn-add-cart"><i class="bi bi-cart"></i> ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- product description tabs -->
                <div class="col-12 mt-5">
                    <div class="product-description">
                        <ul class="nav nav-tabs" id="description" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">PRODUCT DESCRIPTION</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">SHIPPING</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="description-tab">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                This is some placeholder content the Home tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other .nav-powered navigation.
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                This is some placeholder content the Profile tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other .nav-powered navigation.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-products mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section d-flex gap-1 gap-lg-3">
                        <h3>MORE FROM THIS BRAND</h3>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        <div>View All</div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="width-overflow product ms-lg-5">
                <div class="d-flex">
                    <?php for ($i=0; $i < 10; $i++) { ?>
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
            </div>
    </section>

    <section class="brand mt-5">
        <div class="container">
            <div class="slick-brand" data-slick='{"slidesToShow": 7, "slidesToScroll": 1}'>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/flip.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/independent.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/toymachine.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/vans.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/obey.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/trasher.jpeg' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/flip.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/independent.png' ?>" class="img-fluid">
                    </a>
                </div>
                <div class="p-4">
                    <a href="">
                        <img src="<?php echo ASSETS.'img/logobrand/toymachine.png' ?>" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-products mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section d-flex gap-1 gap-lg-3">
                        <h3>YOU MAY ALSO LIKE</h3>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        <div>View All</div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="width-overflow product ms-lg-5">
                <div class="d-flex">
                    <?php for ($i=0; $i < 10; $i++) { ?>
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
            </div>
    </section>

    <section class="email-subscribe bg-dark mt-5">
        <div class="row pt-4 pb-4 ps-3 pe-4 justify-content-end">
            <div class="title col-12 col-lg-7 text-end">
                <h5>Subscribe to our newsletter to receive special offer and first look at new products.</h5>
            </div>
            <div class="col-12 col-lg-5">
                <div class="d-flex gap-1 gap-lg-3">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Full Name">
                    </div>
                    <button class="btn btn-warning">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
$(document).ready(function () {
   
    $('#BuyNow').click(function (e) {
        e.preventDefault();
        var prodItem = $(".product-item-val:checked").val();
        var inputVal = $('#totalJumlah').val();
        if (prodItem === undefined) {
            setTimeout(function() { 
                $('#alertShow').show('slow');
                $('#alertShow').html('Pastikan anda memilih Variant product terlebih dahulu!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
            }, 100);
            

        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo BASEURL ?>cart/buynow',
                data: { prodItem:prodItem, totalVal:inputVal},
                success: function (json) {
                  var jsonObj = JSON.parse(json);
                    setTimeout(function() { 
                        $('#alertShow').show('slow');
                        $('#alertShow').text(jsonObj.message);
                    }, 100);
                    setTimeout(function() { 
                        $('#alertShow').hide('slow');
                        location.href = "<?php echo BASEURL.'cart' ?>";
                    }, 2000);
                }
            });

        }
    });
    $('#AddToCart').on('click', function (e) {
        e.preventDefault();
        var prodItem = $(".product-item-val:checked").val();
        var inputVal = $('#totalJumlah').val();
        if (prodItem === undefined) {
            setTimeout(function() { 
                $('#alertShow').show('slow');
                $('#alertShow').html('Pastikan anda memilih Variant product terlebih dahulu!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
            }, 100);
            

        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo BASEURL ?>cart/addtocart',
                data: { prodItem:prodItem, totalVal:inputVal},
                success: function (json) {
                  var jsonObj = JSON.parse(json);
                    setTimeout(function() { 
                        $('#alertShow').show('slow');
                        $('#alertShow').text(jsonObj.message);
                    }, 100);
                    setTimeout(function() { 
                        $('#alertShow').hide('slow');
                        location.reload();
                        
                    }, 2000);
                }
            });

        }
    });

    $("#variantProductItem").on('click','.product-item-val',function () {
        var datavarian = $(this).data('varian');
        var scr = $('.image-variant.'+datavarian).attr('src');
        $('#NZoomImg').attr('src',scr);
        $('.image-variant.'+datavarian).addClass('active');
    });

    $('.autoplay').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});
</script>