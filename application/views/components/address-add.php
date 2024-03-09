<div class="container-fluid dialog py-0">
    <div class="container content py-0 px-0">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-1 px-md-4">
            <div class="col-12 px-0 mt-5 mt-lg-0 text-start content">
                <h5 class="w-100">Alamat Baru</h5>                

                <form class="form-floating mb-0 mt-4 cart" action="<?php echo BASEURL.'address/addressSubmit' ?>" method="POST">
                    <?php loadview("components/cart/address/no-address"); ?>

                    <button type="submit" class="btn btn-pilih px-5 mt-4 float-end">Simpan Alamat</button>
                </form>
            </div>
        </div>
    </div>
</div>