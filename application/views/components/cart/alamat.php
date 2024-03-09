<!-- CART ISI -->
<form class="container mb-0" action="<?php echo BASEURL."cart/checkoutPayment"; ?>" method="POST" enctype="multipart/form-data">
    <div class="row w-100 g-5 mt-0 mt-lg-5 mb-4 text-start mx-0">
        <div class="col-12 col-lg-7">
            <div class="cart-items p-4">
                <h1>Billing Details</h1>
                    <?php
                            loadview("components/cart/address/with-address.php");
                    ?>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="utamaFloatingCatatan" name="catatan" placeholder="Alamat" >
                            <label for="utamaFloatingCatatan">Catatan</label>
                        </div>
                    </div>
                    <div class="col-md mb-3 mt-5 pengiriman-cart">
                        <div class="row">
                            <div class="alamatCabang" >
                                <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                                    <div id="alamatCabang"></div>
                                    <div class="attention">* Jika pembelian di atas Rp.500.000, dapat memilih untuk diantarkan oleh Tim Diary dengan kode pos yang sama</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4 class="fw-bold">Pengiriman</h4>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group mb-2">
                                    <label>Pilih Cabang</label>
                                    <select class="form-control" name="pilihCabang" id="pilihCabang" required>
                                        <option value="">Pilih Cabang</option>
                                        <?php foreach ($addressAdmin as $key => $address): ?>
                                            <?php if ($address['id_administrator'] != 14): ?>
                                                
                                            <option value="<?php echo $address['id_administrator'] ?>" data-iddestination="<?php echo $address['id_destination'] ?>" data-idadmin="<?php echo $address['id_administrator'] ?>"><?php echo $address['provinsi'].', '.$address['kota'].', '.$address['kode_post'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group mb-2">
                                    <label>Pilih Pengiriman</label>
                                    <select class="form-control" name="pilihPengiriman" id="pilihPengiriman" required>
                                        <option value="">Pilih Pengiriman</option>
                                        <?php if ($this->cart->total() >= 500000): ?>
                                        <option value="TimDiary">Tim Diary</option>
                                        <?php endif ?>
                                        <option value="sap">SAP</option>
                                        <option value="anteraja">Anteraja</option>
                                        <!-- <option value="jne">JNE</option> -->
                                        <!-- <option value="sicepat">SiCepat</option> -->
                                        <?php // if ($event['status_event_diary'] == 2): ?>
                                            <option value="AmbilSendiri">Ambil Sendiri</option>
                                        <?php // endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('msg') ?>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php endif ?>
                                <div class="form-group">
                                    <label>Pilih Opsi Pengiriman</label>
                                    <input type="hidden" id="couriesServiceCode" name="serviceCode">
                                    <select class="form-control" name="opsiPengiriman" id="opsiPengiriman" required></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="cart-summary p-4">
                <h1>Pesanan Anda</h1>
                <?php if (cekSubmitKodeReferral() == TRUE): ?>
                    <div id="alertCodereferral"></div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Kode Referral" name="codeReferral" id="codeReferral">
                  <button class="btn btn-purple" type="button" id="button-codeReferral" style="border-radius:unset;">SUBMIT</button>
                </div>
                <?php endif ?>
                <p>* Claim Referral code minimal belanja 50.000 IDR</p>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Claim Kode Referral" name="claimCodeReferral" id="claimCodeReferral">
                  <button class="btn btn-purple" type="button" id="button-claimCodeReferral" style="border-radius:unset;">SUBMIT</button>
                </div>
                <h3>Produk</h3>
                <?php foreach ($this->cart->contents() as $key => $cart): ?>
                    <h4><?php echo productCART($cart['id'])['nama_product'] ?> -<br> <?php echo $cart['name']." (".$cart['qty']." qty)" ?>  <small>IDR <?php echo number_format($cart['price']) ?></small></h4>
                <?php endforeach ?>
                <h4 class="fw-bold">Potongan <small id="Potongan-codeReferral">0</small></h4>
                <h4 class="fw-bold">Shipping Amount <small id="shipping-amount">0</small></h4>
                <input type="hidden" name="kategoriPotongan" id="kategoriPotongan">
                <input type="hidden" name="valuePotongan" id="valuePotongan">
                <input type="hidden" name="shippingAmount" id="shippingAmount">
                <h4 class="fw-bold">Produk <small id="produkTotalAmount">IDR <?php echo number_format($this->cart->total()); ?></small></h4>
                <h4 class="fw-bold">Subtotal <small id="subtotalCart">IDR <?php echo number_format($this->cart->total()); ?></small></h4>
                <hr/>
                <h3>Poin</h3>
                <h4>Anda Memilik <?php echo $user['poin'] ?> Poin <small><i class="bi bi-chevron-right"></i></small></h4>
                <hr>

                <h2>Total <small id="totalCart">IDR <?php echo number_format(round($this->cart->total() )); ?></small></h4>
                
                <h3>Pembayaran</h3>
                <div class="form-check ">
                    <!-- <input class="form-check-input" type="radio" name="pembayaran" id="transferBCA" value="TF-BCA 2603018982" checked> -->
                    
                </div>
                <div class="alert-alamat">
                        
                </div>

                <?php if (300000 >= $this->cart->total()){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="paymentGateway" id="paymentGateway1" value="manual" checked>
                  <label class="form-check-label" for="paymentGateway1">
                    Manual Transfer <br><b class="text-uppercase" >BCA 4882020111 a/n ANEKA USAHA PT</b>
                  </label>
                </div>
                <input type="hidden" name="manualTransferRekening" id="manualTransferRekening">
                <?php } else { ?>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="paymentGateway" id="paymentGateway2" value="xendit" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Pembayaran dengan payment gateway Xendit
                  </label>
                </div>
                <div class="form-check ">
                  <input class="form-check-input" type="radio" name="paymentGateway" id="paymentGateway1" value="manual" >
                  <label class="form-check-label" for="paymentGateway1">
                    Manual Transfer <br><b class="text-uppercase" >BCA 4882020111 a/n ANEKA USAHA PT</b>
                  </label>
                </div>
                <input type="hidden" name="manualTransferRekening" id="manualTransferRekening">
                
                <?php } ?>
                <?php if (cekTurnPayment() == 1) { ?>    
                    <?php if (cekAddressUser()){ ?>
                        <button type="submit" class="btn btn-purple d-inline my-2 px-5 mt-4">Buat Pesanan</button>
                    <?php } else { ?>
                        <button type="button" class="btn btn-purple d-inline my-2 px-5 mt-4" id="buatPesanan">Buat Pesanan</button>
                    <?php } ?> 
                <?php } ?>           
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function () {
    $("#pilihCabang").change(function () {
        var idDestination = $('#pilihCabang option:selected').data('iddestination');
        var idAdminCabang = $('#pilihCabang option:selected').data('idadmin');
        $.post( "<?php echo BASEURL.'address/alamatcabang' ?>", { iddes: idDestination })
          .done(function( data ) {
            var jsonObj = JSON.parse(data);

            $("#alamatCabang").html('<b>Alamat Cabang</b> <br><b>'+jsonObj.alamat_lengkap+'</b><br>');
            $("#idCabang").val(idAdminCabang);
        });
    });

    $("#pilihPengiriman").change(function () {
        var idEkspedisi = $("#pilihPengiriman option:selected").val();
        var idCabang = $('#pilihCabang option:selected').data('iddestination');
        $.post( "<?php echo BASEURL.'cart/pilihopsipengiriman' ?>", { idEkspedisi: idEkspedisi,idCabang:idCabang }).done(function( data ) {
           $("#opsiPengiriman").html(data);
        }); 
    });
    $("#opsiPengiriman").change(function () { 
        var idEkspedisi = $("#opsiPengiriman option:selected").data("price");
        var total = $("#opsiPengiriman option:selected").data("total");
        var serviceCode = $("#opsiPengiriman option:selected").data("servicecode");
        var totalAll = <?php echo $this->cart->total(); ?>;
        var valuePotongan = $("#valuePotongan").val();
        $("#shipping-amount").text('IDR '+addCommas(idEkspedisi));
        $("#shippingAmount").val(idEkspedisi);
        $("#couriesServiceCode").val(serviceCode);
        $('#totalCart').text('IDR '+addCommas((totalAll + idEkspedisi)-valuePotongan));
        $('#subtotalCart').text('IDR '+addCommas((totalAll + idEkspedisi)-valuePotongan));
    });
    $("#buatPesanan").click(function () {
        $(".alert-alamat").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Pastikan Anda sudah mengisi alamat, setelah itu pilih alamat untuk membuat pesanan dan <strong><a href="<?php echo BASEURL ?>">refresh halaman</a></strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    });
    $("#button-codeReferral").click(function () {
        var codeReferral = $("#codeReferral").val();
        $.post( "<?php echo BASEURL.'cart/getCodeVoucher' ?>", { codeReferral: codeReferral }).done(function( data ) {
            var jsonObj = JSON.parse(data);
            if (jsonObj.code == 200) {
                $("#alertCodereferral").html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+jsonObj.result+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } else {
                $("#alertCodereferral").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonObj.result+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
        });
    });

    $("#button-claimCodeReferral").click(function() {
        var claimCodeReferral = $("#claimCodeReferral").val();
        var shipping = $("#shippingAmount").val();
        $.post( "<?php echo BASEURL.'cart/claimCodeReferral' ?>", { claimCodeReferral: claimCodeReferral }).done(function( data ) {
            var jsonObj = JSON.parse(data);
            $('#kategoriPotongan').val('potongan');
            $('#valuePotongan').val(jsonObj.value);
            $('#Potongan-codeReferral').text('IDR '+addCommas(Number(jsonObj.value)+Number(shipping)));
            $('#subtotalCart').text(jsonObj.titleVal);
            $('#totalCart').text(jsonObj.titleVal);
        });
    });
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
});
</script>