<!-- CART EMPTY STATE -->
<div class="col-12 empty mx-0 text-center <?php echo($this->cart->contents()) ? 'd-none' : ''; ?>">
    <img src="<?php echo ASSETS ?>img/assets/image-cart-empty.png" class="banner"/>
    <p class="fw-bold my-4 my-lg-5">
        Keranjangmu kosong.<br/>
        Yuk, isi dengan produk Diary✨ favoritmu! 
    </p>
    <a href='<?php echo BASEURL.'produk' ?>' type="submit" class="btn btn-purple d-inline">Mulai Belanja</a>
</div> 