<div class="container-fluid dialog py-0 mt-5">
    <div class="container content py-0 px-0 px-lg-0">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-1 px-md-4">
            <div class="col-12 mt-0 text-start content">
                <a href="<?php echo BASEURL.'billing' ?>"><i class="bi bi-arrow-left"></i> Back To Billing</a>
                <h5 class="w-100">Daftar Alamat <button type="button" class="text-orange float-right d-lg-inline btn btn-warning" data-bs-toggle="modal" data-bs-target="#addAddressesDialog">Tambah Alamat Baru</button></h5>                

                <form class="form-floating mb-0" id="ubahStatusAlamat">
                    <div class="col-md mb-2 address no-border box py-2 py-lg-4 mt-5">
                        <?php foreach (addressList() as $key => $value): ?>
                        <div class="item active p-4 mb-3">
                            <h1><?php echo $value['nama'] ?></h1>   
                            <?php if ($value['status_address'] == 1){ ?>
                            <div class="pilih-address checked" data-idAddress="<?php echo $value['id_address_user'] ?>">
                                <i class="bi bi-check"></i>
                            </div>
                            <?php } else { ?>
                            <div class="pilih-address" data-idAddress="<?php echo $value['id_address_user'] ?>">
                                <button type="button" class="btn btn-pilih px-5" data-idAddress="<?php echo $value['id_address_user'] ?>">Pilih</button>
                            </div>
                            <?php } ?>    
                            <h2>Alamat Rumah <small class="badge"><?php echo $value['simpan_alamat'] ?></small></h2>
                            <p><?php echo $value['telepon'] ?></p><p><?php echo $value['alamat_lengkap'] ?></p> 
                            <ul class="list-inline buttons">
                                <li class="list-inline-item mt-3"><a href="<?php echo BASEURL.'address/update/'.$value['id_address_user'] ?>" >Ubah Alamat</a></li>
                            </ul>      
                        </div>
                        <?php endforeach ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

