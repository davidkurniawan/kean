


    <div class="container-fluid success content " style="padding-top: 170px;padding-bottom: 170px;">
        <div class="container p-0 p-xl-5 d-flex justify-content-center h-100">
        <div class="col-lg-5 empty text-center ">
            <form class="form-floating mb-0" action="<?php echo BASEURL.'form/upload/'.$trans['transaction_id'] ?>" method="POST" enctype="multipart/form-data">
                
                <h4 class="mt-3">Lakukan pembayaran melalui <strong>Rekening BCA <?php echo $trans['payment_method'] ?> a/n ANEKA USAHA PT</strong></h4>
                <h5>Maksimal file upload 2mb</h5>
                <h4>*Untuk Berita Pembayaran Cantumkan Transaksi ID Anda yaitu <b><?php echo $trans['transaction_id'] ?></b></h5>
                <div class="form-group">
                    <label class="mb-5 mt-4">File Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="buktitf" required>
                </div>
                <h5>Maksimal upload file 2mb</h5>
                <input type="hidden" value="<?php echo $trans['transaction_id'] ?>" name="transID">
                <button type="submit" class="btn btn-danger mt-3">Upload</button>
            </form>
        </div> 
        </div>
    </div>


