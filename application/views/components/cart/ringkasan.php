
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
            <div class="d-flex align-content-center flex-wrap mt-3 items items-cart mt-lg-4 pt-3 pt-lg-4">

                <?php $qty = 0; foreach ($this->cart->contents() as $key => $cart): ?>
                    <?php $qty += $cart['qty']; ?>
                    <div class="d-flex item mb-4" id="itemCart<?php echo $key ?>">
                        <div class="p-0 order-3 order-lg-2">
                            <img src="<?php echo BASEBACK.$cart['image'] ?>" class="image-product" loading="lazy" alt=""/>
                        </div>
                        <div class="px-2 order-2 order-lg-3 d-flex align-content-between flex-wrap ps-2 ps-lg-3 h-100">
                            <div class="text">
                                <h4><?php echo $cart['name'] ?> - <?php echo productCART($cart['id'])['name_color'] ?> - <?php echo $cart['size'] ?></h4>
                                <h2>IDR <?php echo number_format($cart['price']) ?></h2>
                            </div>
                            <div class="action d-flex justify-content-start justify-content-lg-end flex-wrap w-100">
                                <button type="button" class="btn btn-transparent btn-trash order-2 order-lg-1" data-rowid="<?php echo $key ?>"><i class="bi bi-trash"></i></button>
                                <div class="number order-1 order-lg-2">
                                    <button class="minus-cart" data-proditem="<?php echo $cart['id'] ?>" data-rowid="<?php echo $key ?>">-</button>
                                    <input type="text" value="<?php echo $cart['qty'] ?>" class="qty-cart" readonly/>
                                    <button class="plus-cart" data-proditem="<?php echo $cart['id'] ?>" data-rowid="<?php echo $key ?>" data-max="<?php echo productCART($cart['id'])['qty_item'] ?>">+</button>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <input type="hidden" value="<?php echo $qty ?>" id="totalJumlah"/>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="cart-summary p-4">
            <h1>Ringkasan Belanja</h1>

            <h4>Total Harga (<?php echo count($this->cart->contents()); ?> produk) <small class="totalHarga">IDR <?php echo number_format(round($this->cart->total())); ?></small></h4>

            <h2>Total <small class="totalHarga">IDR <?php echo number_format(round($this->cart->total())); ?></small></h4>

            <a href="<?php echo BASEURL."billing" ?>" type="submit" class="btn btn-purple d-inline my-2 px-5 mt-4">Buat Pesanan</a>
        </div>
    </div>
</div>

<script>

    $( document ).ready(function() {

        $('.plus').on('click', function (e) {            
            var id = $(this).data('proditem');
            var rowid = $(this).data('rowid');
            alert(rowid);
            var qty = $(".qty-cart").val();

            var countQty = parseInt(qty) + 1;
            var getMaxQty = $(this).data('max');

                if(countQty <= getMaxQty) {
                    $.post( "<?php echo BASEURL.'cart/updateshopingcart' ?>", { qty:qty, id: id, rowid:rowid ,action:"plus" })
                      .done(function( data ) {
                        var jsonObj = JSON.parse(data);
                        $('.totalHarga').text(jsonObj.totalharga);
                    });
                }
        });
        $('.minus').on('click', function (e) {            
            var id = $(this).data('proditem');
            var rowid = $(this).data('rowid');
            var qty = $(".qty-cart").val();
            $.post( "<?php echo BASEURL.'cart/updateshopingcart' ?>", { qty:qty, id: id, rowid:rowid, action:"min" })
              .done(function( data ) {
                var jsonObj = JSON.parse(data);
                $('.totalHarga').text(jsonObj.totalharga);
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