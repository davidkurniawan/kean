<!-- CART ISI -->
<div class="row g-5 w-100 mt-0 mt-lg-5 mb-4 mx-0 text-start">
    <div class="col-12 col-lg-7">
        <div class="cart-items p-4 pb-0">
            <h1>Keranjang</h1>
            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckCartItems" checked>
                <label class="form-check-label" for="flexCheckCartItems">
                    Pilih Semua
                </label>
            </div> -->
            <div class="d-flex align-content-center flex-wrap mt-3 items mt-lg-4 pt-3 pt-lg-4">

                <?php $qty = 0; foreach ($this->cart->contents() as $key => $cart): ?>
                    <?php
                        $qty += $cart['qty'];
                        if ($cart['id'] == 89){?>
                    <div class="d-flex item mb-4" id="itemCart<?php echo $key ?>">
                        <!-- <div class="py-2 d-flex flex-shrink-1 align-items-center foto">
                            <div class="form-check">
                                <input class="form-check-input check-item" type="checkbox" value="" checked>
                            </div>
                        </div> -->                                                      
                        <div class="p-0 order-3 order-lg-2">
                            <img src="<?php echo BACKENDURL.$cart['image'] ?>" class="image-product" loading="lazy" alt=""/>
                        </div>
                        <div class="px-2 order-2 order-lg-3 d-flex align-content-between flex-wrap ps-2 ps-lg-3 h-100">
                            <div class="text">
                                <h4><?php echo $cart['name'] ?> - <?php echo productCART($cart['id'])['nama_jenis_product'] ?></h4>
                                <h2>IDR <?php echo number_format($cart['subtotal']) ?></h2>
                            </div>
                            <div class="action d-flex justify-content-start justify-content-lg-end flex-wrap w-100">
                                <button type="button" class="btn btn-transparent btn-trash order-2 order-lg-1" data-rowid="<?php echo $key ?>"><i class="bi bi-trash"></i></button>
                                <div class="number order-1 order-lg-2">
                                    <button <?php if ($cart['id'] == 82) { ?> class="minus-bestie" <?php } else { ?>class="minus"<?php } ?> data-id="<?php echo $cart['id'] ?>" data-rowid="<?php echo $key ?>">-</button>
                                    <input type="text" value="<?php echo $cart['qty'] ?>" readonly/>
                                    <button <?php if ($cart['id'] == 82) { ?> class="plus-bestie" <?php } else { ?>class="plus"<?php } ?> data-id="<?php echo $cart['id'] ?>" data-rowid="<?php echo $key ?>">+</button>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="d-flex item mb-4" id="itemCart<?php echo $key ?>">
                        <!-- <div class="py-2 d-flex flex-shrink-1 align-items-center foto">
                            <div class="form-check">
                                <input class="form-check-input check-item" type="checkbox" value="" checked>
                            </div>
                        </div> -->                                                      
                        <div class="p-0 order-3 order-lg-2">
                            <img src="<?php echo BACKENDURL.$cart['image'] ?>" class="image-product" loading="lazy" alt=""/>
                        </div>
                        <div class="px-2 order-2 order-lg-3 d-flex align-content-between flex-wrap ps-2 ps-lg-3 h-100">
                            <div class="text">
                                <h4><?php echo productCART($cart['id'])['nama_product'] ?> - <?php echo productCART($cart['id'])['nama_jenis_product'] ?></h4>
                                <h2>IDR <?php echo number_format(productCART($cart['id'])['harga_product']) ?></h2>
                            </div>
                            <div class="action d-flex justify-content-start justify-content-lg-end flex-wrap w-100">
                                <button type="button" class="btn btn-transparent btn-trash order-2 order-lg-1" data-rowid="<?php echo $key ?>"><i class="bi bi-trash"></i></button>
                                <div class="number order-1 order-lg-2">
                                    <button <?php if ($cart['id'] == 82) { ?> class="minus-bestie" <?php } else { ?>class="minus"<?php } ?> data-id="<?php echo $cart['id'] ?>" data-rowid="<?php echo $key ?>" data-price="<?php echo productCART($cart['id'])['harga_product'] ?>">-</button>
                                    <input type="text" class="totalkeun" value="<?php echo $cart['qty'] ?>" id="qty<?php echo $key ?>" data-rowid="<?php echo $key ?>" data-nilai="<?php echo productCART($cart['id'])['harga_product'] ?>" readonly/>
                                    <button <?php if ($cart['id'] == 82) { ?> class="plus-bestie" <?php } else { ?>class="plus"<?php } ?> data-id="<?php echo $cart['id'] ?>" data-rowid="<?php echo $key ?>"  data-price="<?php echo productCART($cart['id'])['harga_product'] ?>">+</button>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php endforeach ?>

                <input type="hidden" value="<?php echo $qty ?>" id="totalJumlah"/>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="cart-summary p-4">
            <h1>Ringkasan Belanja</h1>

            <h4>Total Harga (<?php echo count($this->cart->contents()); ?> produk) <small class="totalHarga">IDR <?php echo number_format(round($this->cart->total())); ?></small></h4>
            <!-- <h4>Total Diskon <small>-IDR 5.000</small></h4> -->

            <h2>Total <small class="totalHarga">IDR <?php echo number_format(round($this->cart->total())); ?></small></h4>

            <a href="<?php echo BASEURL."address" ?>" type="submit" class="btn btn-purple d-inline my-2 px-5 mt-4">Buat Pesanan</a>
        </div>
    </div>
</div>

<script>

    $( document ).ready(function() {

        $('.plus').on('click', function (e) {            
            var id = $(this).data('id');
            var rowid = $(this).data('rowid');
            var value = $("#qty"+rowid).val();
            $.post( "<?php echo BASEURL.'cart/updateshopingcart' ?>", { qty:value, id: id, rowid:rowid ,action:"plus" })
              .done(function( data ) {
                var jsonObj = JSON.parse(data);
                //$('.totalHarga').text(jsonObj.totalharga);
              });
        });
        $('.minus').on('click', function (e) {            
            var id = $(this).data('id');
            var rowid = $(this).data('rowid');
            var value = $("#qty"+rowid).val();
            $.post( "<?php echo BASEURL.'cart/updateshopingcart' ?>", { qty:value, id: id, rowid:rowid, action:"min" })
              .done(function( data ) {
                var jsonObj = JSON.parse(data);
                //$('.totalHarga').text(jsonObj.totalharga);
              });
        });
        $(".btn-trash").click(function () {
            var rowid = $(this).data('rowid');
            $.post( "<?php echo BASEURL.'cart/deleteshopingcart' ?>", { rowid:rowid, action:"hapus" })
              .done(function( data ) {
                $("#itemCart"+rowid).remove();
                hitungTotalan();
                // location.href="<?php echo BASEURL."cart" ?>";
              });
        });
    });
</script>