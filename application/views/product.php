<style type="text/css">
    .hidden {
        display: none;
    }
</style>
<div class="container-fluid content product-detail px-0">
  <div class="py-5 px-4 container">
    <div class="d-flex justify-content-center align-content-between flex-wrap text-start px-0 gap-3 pb-3">
        <div class="col-12 col-lg-5 pb-5">
            <div class="zoomArea">
                <img src="<?php echo BACKENDURL.$productfirst['product_image_front'] ?>" id="NZoomImg" data-NZoomscale="2"/>
            </div>

            <div id="slide-wrapper">
                <div class="row row-cols-3 g-3 mt-1">
                    <?php foreach ($imageProduct as $key => $value): ?>
                    <div class="col">
                        <img class="thumbnail active" src="<?php echo BACKENDURL.$value['source_image_product'] ?>">
                    </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>

        <div class="col-12 col-lg bg-white detail px-0 px-md-3">
            <h1><?php echo $productfirst['nama_product'] ?></h1>
            <ul class="list-inline <?php echo (sessionData("sessUser") == false) ? 'd-none' : ''; ?>">
                <!-- Remove text-decoration-line-through class for non discount total -->
                <li class="list-inline-item">
                    <span class="d-block total py-2 <?php if (!empty($productfirst['diskon'])): ?>text-decoration-line-through<?php endif ?>">
                        IDR <?php echo number_format($productfirst['harga_product']) ?>
                    </span>
                </li>
                
                <?php if (!empty($productfirst['diskon'])): ?>
                <!-- Remove this two item for non discount total -->
                <li class="list-inline-item"> 
                    <span class="d-block total py-2 text-danger">
                        IDR <?php echo number_format($productfirst['harga_product'] / $productfirst['diskon']) ?>
                    </span>
                </li>
                <li class="list-inline-item">
                    <span class="badge rounded-pill text-bg-danger"><?php echo $productfirst['diskon'] ?>% Off</span>
                </li>
                <?php endif ?>
            </ul>

            <input type="hidden" id="totalDidapat" value="<?php echo $productfirst['harga_product'] ?>"/>
            
            <small>Deskripsi Produk</small>

            <div>
                <?php echo $productfirst['deskripsi_product'] ?>
            </div>
            <?php if ($productfirst['id_product'] != 89): ?>
            <h4>Kategori Produk:</h4>
            <div class="pills row row-cols-auto g-2 mt-1 px-2">
                <?php foreach ($showallproduct as $key => $allprod): ?>
                    <?php if ($allprod['id_product'] != 89): ?>
                        <div class="col">
                            <input type="radio" class="btn-check" name="kategori" id="kategori<?= $allprod['id_product'] ?>" autocomplete="off" value="<?= $allprod['id_product'] ?>">
                            <label class="btn btn-outline-category" for="kategori<?= $allprod['id_product']?>"><a href="<?= BASEURL.'produk/detail/'.$allprod['url_product'] ?>"><img src="<?php echo BACKENDURL.$allprod['product_image_front'] ?>"/> <?= $allprod['nama_product'] ?></a></label> 
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <?php endif ?>
            
            <h4>Variant:</h4>
            <div class="pills row row-cols-auto g-2 mt-1 px-2">
                <?php foreach ($productVarian as $key => $pvarian): ?>
                    <?php if ($pvarian['qty_item'] != 0): ?>
                <div class="col">
                    <input type="radio" class="btn-check product-item-val" name="color" id="color<?= $pvarian['product_item_id']?>" autocomplete="off" value="<?= $pvarian['product_item_id']?>">
                    <label class="btn btn-outline-category" for="color<?= $pvarian['product_item_id']?>"><i class="bi bi-circle-fill variant-<?= $pvarian['kode_warna'] ?>" style="color:<?php echo $pvarian['kode_warna'] ?>"></i> <?php echo $pvarian['nama_jenis_product'] ?></label>    
                </div>
                    <?php endif ?>
                <?php endforeach ?>
                
            </div>

            <?php if(sessionData('sessUser') == true) { ?>
            <div class="add-to-cart mt-5 py-4 d-block d-lg-flex ">                
                <div class="col mb-4 mb-lg-0">
                    <div class="number">
                        <input type="hidden" value="1" id="totalJumlah"/>
                        <span class="minus" data-rowid="<?php echo $productfirst["id_product"] ?>" data-price="<?php echo $productfirst["harga_product"] ?>">-</span>
                        <input type="text" value="1" class="totalkeun" id="qty<?php echo $productfirst["id_product"] ?>" data-price="<?php echo $productfirst["harga_product"] ?>" data-rowid="<?php echo $productfirst["id_product"] ?>"/>
                        <span class="plus"data-rowid="<?php echo $productfirst["id_product"] ?>" data-price="<?php echo $productfirst["harga_product"] ?>">+</span>
                    </div>
                    <div class="d-none totalHarga"></div>
                </div>
                <div class="col text-start text-lg-end">
                    <span class="text">Total</span> <span class="total" id="totalKalikan">IDR <?php echo number_format($productfirst['harga_product']) ?></span>
                </div>
            </div>
            <div class="col mb-4 mt-4">
                <div class="alert alert-warning alert-dismissible fade show hidden" role="alert" id="alertShow">
                  
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <button id="BuyNow" class="btn btn-blue d-relative mt-4 px-4" >Buy Now</button>
            <button id="AddToCart" class="btn btn-blue-light d-relative mt-4 px-4" >Add to Cart</button>
            <?php 
            /*
                if($_GET["state"] == "join") {
                    echo '<a href="?page=cart&cart=exist&navbar=white" class="btn btn-blue d-relative mt-4 px-4" type="submit">Beli Paket Join Promo Reseller</a>';
                }else if($_GET["state"] == "checkout") {
                    echo '<a data-bs-toggle="modal" data-bs-target="#branchDialog" class="btn btn-blue d-relative mt-4 px-4" type="submit">Check Out</a>';
                }else if($_GET["state"] == "reseller") {
                    echo '<a href="?page=cart&cart=exist&navbar=white" class="btn btn-blue d-relative mt-4 px-4" type="submit">Buy Now</a>
                    <a href="" class="btn btn-blue-light d-relative mt-4 px-4" type="submit">Add to Cart</a>';
                }
                */
            ?>
            <?php } 

            
            if(sessionData('sessUser') == false) { ?>
                <h4>Shop On:</h4>
                <div class="pills row row-cols-auto g-2 mt-1 px-2 eco">                
                    <div class="col">
                        <input type="radio" class="btn-check" name="ecommurz" id="ecommurz1" autocomplete="off" value="1">
                        <label class="btn btn-outline-category shopee" for="ecommurz1">
                        <a href="https://shopee.co.id/diaryofficialstore">
                            <img src="<?php echo IMAGES ?>ecommurz/shopee.png"/></label>
                        </a>
                    </div>            
                    <div class="col">
                        <input type="radio" class="btn-check" name="ecommurz" id="ecommurz2" autocomplete="off" value="2">
                        <label class="btn btn-outline-category tokopedia" for="ecommurz2">
                        <a href="https://www.tokopedia.com/diaryofficials">
                            <img src="<?php echo IMAGES ?>ecommurz/tokopedia.png"/></label>
                        </a>
                    </div>            
                    <div class="col">
                        <input type="radio" class="btn-check" name="ecommurz" id="ecommurz3" autocomplete="off" value="3">
                        <label class="btn btn-outline-category lazada" for="ecommurz3"><img src="<?php echo IMAGES ?>ecommurz/lazada.png"/></label>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <h4 class="mt-5 title">Rekomendasi untuk Produk Kamu:</h4>
    <div class="row row-cols-1 row-cols-md-4 g-3 g-lg-4 mt-2 mb-5 similiar">
        <?php foreach ($showallproduct as $key => $prod): ?>
            <?php if ($key <= 3): ?>
        <div class="col">
            <a href="<?= BASEURL.'produk/detail/'.$prod['url_product'] ?>">
            <div class="card h-100 p-3">
                <img src="<?php echo BACKENDURL.$prod['product_image_front'] ?>" class="card-img-top" alt="..." loading="lazy">
                <div class="card-body p-0 pt-3">
                    <h5 class="card-title"><?php echo $prod['nama_product'] ?></h5>
                </div>
            </div>
            </a>
        </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

  </div>
</div>


<script type="text/javascript">
$(document).ready(function () {
    // $('#AddToCart').click(function () {
    //     var input = $('#totalJumlah').val();
    //     var prodItem = $(".product-item-val:checked").val();
    //     alert(prodItem);
    // });
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
});
</script>