<div class="toast-container bg-orange no-border position-fixed top-0 start-50 translate-middle-x p-3">
  <div id="changeRedeem" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">      
      <strong class="me-auto" id="changeRedeemAlert"></strong>
      <button type="button" data-bs-dismiss="toast"><i class="bi bi-x"></i></button>
    </div>
  </div>
</div>

<div class="modal fade prompt" id="redeemPointModal" tabindex="-1" aria-labelledby="redeemPointModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="modal-header">
        <h1 class="modal-title" id="redeemPointModal">Tukar Poin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-2">
        Apakah Anda ingin menukarkan poin dengan reward ini?
        <br>
        <p class="text-alert" style="color:red;">* <b>Ongkos Kirim ditanggung User</b></p>
        <p class="text-alert" style="color:red;">* <b>Produk akan dikirim ke alamat saat registrasi</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-orange-light" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-pilih" id="redemPoint">Tukar Poin</button>
        <!-- <button type="button" class="btn btn-pilih" >Tukar Poin</button> -->
      </div>
    </div>
  </div>
</div>


<div class="container d-flex p-4 flex-wrap flex-column">
    <div class="title-profile mt-4 col-12">
        <h1 class="hi">Point</h1>
        <h2 class="name satisfy">Reward</h2>

        <p class="info-point mt-4">
            <!-- Poin anda akan segera muncul kembali, mohon maaf atas kendala. -->
            <?php 
            $a = getDataUser()['poin'];
            $f = sprintf ("%.2f", $a);
            $poinUser = $f;
             ?>
            Kamu memiliki <b><?php echo $poinUser ?></b> Poin<br/>
            <small>Tukarkan poin kamu dan dapatkan reward yang bisa kamu gunakan di transaksi selanjutnya✨</small>
        </p>
        <p>Batas akhir penukaran poin sampai dengan 31 Maret 2023!</p>
    </div>
    <div class="d-flex row text-center flex-wrap mt-5 pb-0 point-row">
        <?php foreach (getDataProdukPoin() as $key => $prodPoin): ?>
        <?php if($prodPoin['status_poin'] == "discount"){ ?>
            <div class="col-6 col-lg-2 item d-flex align-content-strech flex-wrap justify-content-center mb-5">
                <h6><?php echo $prodPoin['poin'] ?> Poin</h6>
                <div class="circle-point d-flex justify-content-center align-items-center flex-wrap"><?php echo $prodPoin['poin'] ?> %</div>
                <h6><?php echo $prodPoin['produk_poin_title'] ?></h6>
                <p><?php echo $prodPoin['description'] ?></p>
                <a  class="btn btn-pilih open-DialogPoints px-4" data-bs-toggle="modal" data-bs-target="#redeemPointModal" data-id="<?php echo $prodPoin['id_produk_poin'] ?>">Tukar Poin</a>
            </div>
        <?php } else { ?>
            <div class="col-6 col-lg-2 item d-flex align-content-strech flex-wrap justify-content-center mb-5">
                <h6><?php echo $prodPoin['poin'] ?> Poin</h6>
                <div class="circle-point" style="background-image: url('<?php echo BASEBACK.$prodPoin['image'] ?>');"></div>
                <h6><?php echo $prodPoin['produk_poin_title'] ?></h6>
                <p><?php echo $prodPoin['description'] ?></p>
                <a  class="btn btn-pilih open-DialogPoints px-4" data-bs-toggle="modal" data-bs-target="#redeemPointModal" data-id="<?php echo $prodPoin['id_produk_poin'] ?>">Tukar Poin</a>
            </div>
        <?php } ?>
        <?php endforeach ?>
    </div>


    <div class="row text-center text-md-start pt-0 px-4 pt-lg-4 pb-5 mb-5">
        * Setiap pembelian sebesar IDR 100.000, kamu akan mendapatkan 1 Poin
    </div>
    <div class="row">
        <div class="col-12">
            <p>* Generate Referral Code agar bisa manjadi 1 Voucher Referral Code</p>
            <?php if ($this->session->flashdata('msgGenerateReferral')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('msgGenerateReferral'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif ?>
        </div>
        <div class="col-md-12 col-lg-4">
            <form action="<?php echo BASEURL.'profile/generateReferralCode' ?>" method="post">
                <div class="form-group">
                    <label><b>Jumlah Voucher</b></label>
                    <input type="number" class="form-control" name="jumlahVoucher" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="width:200px;">submit</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="fw-bold">List Referral Code</h4>
            <p>* Setiap pembelian sebesar IDR 50.000, kamu bisa mengclaim voucher</p>
            <?php if ($this->session->flashdata('msgClaimDuit')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('msgClaimDuit'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif ?>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Kode Referrral</th>
                    <th>Value Referral</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($referral as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['kode_voucher'] ?></td>
                        <td>IDR <?php echo number_format($value['value_voucher']) ?></td>
                        <?php if ($value['status_voucher'] == 1){ ?>
                            <?php if (getDataUser()['status_user_karyawan'] == 1){ ?>
                                <td><a href="<?php echo BASEURL.'profile/claimreferral/'.$value['id_referral_code_voucher'] ?>" class="btn btn-success">Claim</a></td>
                            <?php } else { ?>
                                <td><a href="<?php echo BASEURL.'produk' ?>" class="btn btn-success">Belanjakan</a></td>
                            <?php } ?>
                        <?php }else if ($value['status_voucher'] == 3){ ?>
                            <td><button type="button" disabled class="btn btn-success">Pengajuan Claim Uang</button></td>
                        <?php } else if ($value['status_voucher'] == 4 ){ ?>
                            <td><button type="button" disabled class="btn btn-success">Terkonfirmasi Claim Uang</button></td>
                        <?php } else { ?>
                            <td><button type="button" disabled class="btn btn-success">Claim Pemotongan</button></td>
                        <?php } ?>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="fw-bold">List Kupon Diskon</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Kode Kupon Diskon</th>
                    <th>Diskon</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($kupon as $key => $kup): ?>
                <tr>
                    <td><?php echo $kup['code_promo'] ?></td>
                    <td><?php echo $kup['promo_product_discount'] ?> %</td>
                    <?php if ($kup['promo_status'] == 1){ ?>
                        <td>Belum di klaim</td>
                    <?php } else { ?>
                        <td>Sudah di klaim</td>
                    <?php } ?>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", ".open-DialogPoints", function () {
         var idProdPoin = $(this).data('id');
         $(".modal-body #bookId").val( idProdPoin );

         const toastPoint = document.getElementById('redemPoint');

        $.post( "<?php echo BASEURL.'profile/profileRedeemProdPoin' ?>", { idProdPoin: idProdPoin })
        .done(function( data ) {
            var myObj = JSON.parse(data);
            if (toastPoint != null) {
                const toastRedeem = document.getElementById('changeRedeem')
                toastPoint.addEventListener('click', () => {
                    const toast = new bootstrap.Toast(toastRedeem);
                    $('#changeRedeemAlert').text(myObj.alert);
                    toast.show();
                });
                setInterval(function () {
                     if (myObj.kategori == 'produk') {
                        window.location.href = "<?php echo BASEURL.'profile' ?>";
                    } else if (myObj.kategori == 'item') {

                    }
                  },2000);
               
            }

                $('redeemPointModal').hide();

        });

       
    });
</script>