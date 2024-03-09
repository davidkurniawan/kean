<div class="container-fluid dialog py-0">
    <div class="container content py-0 px-0 px-lg-0">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-1 px-md-4">
            <div class="col-12 mt-0 text-start content">
                <h5 class="w-100">History Transaksi</h5>

                <form class="form-floating mb-0">
                    <div class="col-md mb-2 history no-border box py-2 py-lg-4">
                        
                        <?php foreach ($transUserSettle as $keyParent => $transParent): ?>
                        <?php (showChildTransUser($transParent['transaction_id'])); ?>
                        <div class="item p-4 mb-3 d-flex flex-wrap">
                            <div class="col-12 col-lg-8 d-flex align-content-center flex-column">
                                <div class="d-flex align-content-center flex-row">
                                    <div class="h-100">
                                        <img src="<?php echo BACKENDURL.showChildTransUserRow($transParent['transaction_id'])['product_image_front'] ?>" class="img-product" alt="..." loading="lazy">
                                    </div>
                                    <div class="d-flex align-content-center flex-column">
                                        <h4 class="order-1"><?php echo $transParent['date_created'] ?> <small class="badge info"><?php echo $transParent['nama_status_transaksi'] ?></small></h4>
                                        <h2 class="order-4 order-lg-2"><?php echo @showChildTransUser($transParent['transaction_id'])[0]['nama_product'] ?></h2>
                                        <h6 class="order-2 order-lg-3"><?php echo count(showChildTransUser($transParent['transaction_id'])) ?> Produk x IDR <?php echo number_format($transParent['total_harga']) ?></h6>
                                        <h6 class="order-3 order-lg-4">+<?php echo @count(showChildTransUser($transParent['transaction_id'])) ?> Produk Lainnya</h6>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseItems<?php echo $keyParent ?>">
                                    <?php foreach (showChildTransUser($transParent['transaction_id']) as $key => $transChild): ?>
                                    <div class="d-flex align-content-center flex-row mt-4">
                                        <div class="h-100">
                                            <img src="<?php echo BACKENDURL.$transChild['image_product'] ?>" class="img-product" alt="..." loading="lazy">
                                        </div>
                                        <div class="d-flex align-content-center flex-column">
                                            <h4 class="order-1"><?php echo $transParent['date_created'] ?> <small class="badge info"><?php echo $transParent['nama_status_transaksi'] ?></small></h4>
                                            <h2 class="order-4 order-lg-2"><?php echo $transChild['nama_product'] ?> - <?php echo $transChild['nama_jenis_product'] ?></h2>
                                            <h6 class="order-2 order-lg-3">IDR <?php echo number_format($transChild['harga_product']) ?></h6>
                                            <h6 class="order-3 order-lg-4">+<?php echo $transChild['qty'] ?> Pcs</h6>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 price ps-0 ps-lg-4 d-flex align-items-center mt-4 mt-lg-0">
                                <div class="me-0 me-lg-5 d-flex align-content-center flex-column">
                                    <h2>Total Harga</h2>
                                    <h1>IDR <?php echo number_format($transParent['total_harga']) ?></h1>
                                </div>
                                <div class="flex-fill text-end">
                                    <h1 class="btn btn-transparent px-4 btn-collapsede collapsed" data-bs-toggle="collapse" data-bs-target="#collapseItems<?php echo $keyParent ?>" aria-expanded="false" aria-controls="collapseItems<?php echo $keyParent?>"><i class="bi bi-chevron-up fs-5"></i></h1>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <?php foreach ($historyClaim as $key => $cpoin): ?>
                        <div class="item p-4 mb-3 d-flex flex-wrap">
                            <div class="col-12 col-lg-8 d-flex align-content-center flex-column">
                                <div class="d-flex align-content-center flex-row">
                                    <div class="h-100">
                                        <img src="<?php echo BASEBACK.$cpoin['image'] ?>" class="img-product" alt="..." loading="lazy">
                                    </div>
                                    <div class="d-flex align-content-center flex-column">
                                        <h4 class="order-1"><?php echo $cpoin['created_date'] ?> <small class="badge info"><?php echo $cpoin['title_ekspedisi_status'] ?></small></h4>
                                        <h2 class="order-4 order-lg-2"><?php echo $cpoin['produk_poin_title'] ?> - 1 QTY</h2>
                                        <h6 class="order-2 order-lg-3"><?php echo $cpoin['poin'] ?> poin</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 price ps-0 ps-lg-4 d-flex align-items-center mt-4 mt-lg-0">
                                <div class="me-0 me-lg-5 d-flex align-content-center flex-column">
                                    <h2>Redeem Poin</h2>
                                    <h1><?php echo $cpoin['poin'] ?></h1>
                                </div>
                                <div class="flex-fill text-end">
                                    <h1 class="btn btn-transparent px-4 btn-collapsede collapsed" data-bs-toggle="collapse" data-bs-target="#collapseItems1" aria-expanded="false" aria-controls="collapseItems1"><i class="bi bi-chevron-up fs-5"></i></h1>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>