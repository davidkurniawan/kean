
<div class="main">
    <section class="breadcrum-custom mt-4 mb-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="<?php echo BASEURL ?>">Home</a></li>
                    <li class="breadcrumb-item text-capitalize"><a href="<?php echo BASEURL.$product['kategori'] ?>"><?php echo $product['kategori'] ?></a></li>
                    <li class="breadcrumb-item text-capitalize"><a href="<?php echo BASEURL.$product['kategori'].'/'.$product['sub_kategori'] ?>"><?php echo $product['sub_kategori'] ?></a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?php echo $product['nama_product'] ?></li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="d-flex">
                        <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                            <div class="product-thumbs-track" style="height: 500px;">
                                <?php foreach ($imageProduct as $key => $img): ?>
                                    <?php if ($key == 0){ ?>
                                        <div class="pt active" data-imgbigurl="<?php echo BASEBACK.$img['source_image_product'] ?>"><img class="img-fluid" src="<?php echo BASEBACK.$img['source_image_product'] ?>" alt="">
                                        </div>
                                    <?php } else { ?>
                                        <div class="pt" data-imgbigurl="<?php echo BASEBACK.$img['source_image_product'] ?>"><img class="img-fluid" src="<?php echo BASEBACK.$img['source_image_product'] ?>" alt="">
                                        </div>
                                    <?php } ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="product-pic-zoom">
                             <a href="<?php echo BASEBACK.$productfirst['product_image_front'] ?>" class="glightbox preview-link">
                                <img class="img-fluid" src="<?php echo BASEBACK.$productfirst['product_image_front'] ?>" alt="">
                             </a>
                             <div class="d-none">
                                <?php foreach ($imageProduct as $key => $img): ?>
                                    <?php if ($key > 0){ ?>
                                         <a href="<?php echo BASEBACK.$img['source_image_product'] ?>" class="glightbox preview-link"></a>
                                     <?php } ?>
                                <?php endforeach ?>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="product-description-card">
                        <div class="product-title">POLAR RIDER T-SHIRT (BLACK)</div>
                        <div class="product-price"><div class="currency me-2">Rp</div><div class="value harga-product"><?php echo number_format($productfirst['harga']) ?></div></div>
                        <hr>
                            <div class="fw-size-choose">
                                <div class="color mb-2">COLORS</div>
                                <?php foreach ($productItem as $key => $prodItem): ?>
                                <div class="sc-item">
                                    <input type="radio" name="sc" class="color-product" id="<?php echo $prodItem['slug_color'] ?>-color" data-slugcolor="<?php echo $prodItem['slug_color'] ?>" data-idprod="<?php echo $prodItem['id_product'] ?>" data-idproditem="<?php echo $prodItem['product_item_id'] ?>">
                                    <label for="<?php echo $prodItem['slug_color'] ?>-color" style="background:<?php echo $prodItem['color'] ?>;"></label>
                                </div>
                                <?php endforeach ?>
                            </div>
                        <hr>

                        <div class="fw-size">
                            <div class="size mb-2">SIZE</div>
                            <div class="form-group">
                                <select class="form-control" id="size-product">
                                    <option>Please Choose Color First</option>
                                   
                                </select>
                                <input type="hidden" name="idProductItem" id="idProductItem">
                            </div>
                            <div class="size-chart-info mt-4">
                                <a href="#" class="btn btn-dark">Size Chart Info</a>
                            </div>
                        </div>

                        <div class="fw-quantity mt-4 row">
                            <div class="show-qty-product" id="show-qty-product"></div>
                            <div class="number-quantity col-12 col-lg-6">
                                <div class="number">
                                    <input type="hidden" value="1" id="totalJumlah">
                                    <span class="minus" >-</span>
                                    <input type="text" value="0" class="totalkeun" id="qty" data-max="" readonly="">
                                    <span class="plus" >+</span>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="add-to-cart col-12 col-lg-6">
                                        <button class="btn btn-warning ps-3 pe-3 btn-add-cart w-100" id="addToCart"><i class="bi bi-cart"></i> ADD TO CART</button>
                                    </div>
                                    <div class="add-to-cart col-12 col-lg-6">
                                        <button class="btn btn-warning ps-3 pe-3 btn-buy-now w-100" id="buyNow"><i class="bi bi-bag"></i> BUY NOW</button>
                                    </div>
                                </div>
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